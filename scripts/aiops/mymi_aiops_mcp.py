#!/usr/bin/env python3
"""MyMI-AIOps-MCP Server
Stdio JSON-RPC 2.0 MCP server for MyMI Wallet engineering and operations.
Provides deterministic, progressive inspection, test execution, GTM task querying,
form certification, Spark command auditing, and bridge to centralized TBI AIOps.
"""

import csv
import json
import os
import re
import subprocess
import sys
import urllib.error
import urllib.request

REPO_ROOT = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
TBI_AIOPS_ENDPOINT = os.environ.get("TBI_AIOPS_ENDPOINT", "http://127.0.0.1:8765/mcp")


def run_cmd(args, cwd=REPO_ROOT, timeout=120):
    try:
        proc = subprocess.run(
            args,
            cwd=cwd,
            stdout=subprocess.PIPE,
            stderr=subprocess.STDOUT,
            text=True,
            timeout=timeout,
        )
        return proc.returncode, proc.stdout
    except subprocess.TimeoutExpired:
        return -1, "Command timed out after %ds" % timeout
    except Exception as e:
        return -1, str(e)


def tool_status(_args):
    rc, head = run_cmd(["git", "rev-parse", "HEAD"])
    rc_branch, branch = run_cmd(["git", "rev-parse", "--abbrev-ref", "HEAD"])
    rc_status, dirty = run_cmd(["git", "status", "--porcelain"])

    # GTM stats
    gtm_file = os.path.join(REPO_ROOT, "docs/_aiops/gtm/tasks.csv")
    gtm_stats = {"total": 0, "done": 0, "in_review": 0, "in_progress": 0, "proposed": 0}
    if os.path.isfile(gtm_file):
        with open(gtm_file, mode="r", encoding="utf-8") as f:
            reader = csv.DictReader(f)
            for row in reader:
                gtm_stats["total"] += 1
                status = (row.get("Status") or row.get("status") or "").strip().lower()
                if status in gtm_stats:
                    gtm_stats[status] += 1

    # Form test baseline
    ratchet_file = os.path.join(REPO_ROOT, "tests/baseline/form-action-gaps.txt")
    gap_count = 0
    if os.path.isfile(ratchet_file):
        with open(ratchet_file, "r") as f:
            gap_count = sum(1 for line in f if line.strip() and not line.startswith("#"))

    result = {
        "service": "mymi-aiops-mcp",
        "repository": "MyMIWallet-Next",
        "root": REPO_ROOT,
        "git": {
            "head": head.strip(),
            "branch": branch.strip(),
            "dirty_count": len([l for l in dirty.splitlines() if l.strip()]),
        },
        "gtm": gtm_stats,
        "form_action_gaps": gap_count,
        "tbi_aiops_bridge_endpoint": TBI_AIOPS_ENDPOINT,
    }
    return json.dumps(result, indent=2)


def tool_gtm_tasks(args):
    gtm_file = os.path.join(REPO_ROOT, "docs/_aiops/gtm/tasks.csv")
    if not os.path.isfile(gtm_file):
        return json.dumps({"error": "tasks.csv not found"})

    wave_filter = (args.get("wave") or "").upper()
    status_filter = (args.get("status") or "").lower()
    task_id_filter = (args.get("task_id") or "").upper()

    tasks = []
    with open(gtm_file, mode="r", encoding="utf-8") as f:
        reader = csv.DictReader(f)
        for row in reader:
            t_id = (row.get("TaskID") or row.get("id") or "").strip().upper()
            wave = (row.get("SubprojectID") or row.get("wave") or "").strip().upper()
            status = (row.get("Status") or row.get("status") or "").strip().lower()

            if task_id_filter and task_id_filter != t_id:
                continue
            if wave_filter and wave_filter != wave:
                continue
            if status_filter and status_filter != status:
                continue

            tasks.append({
                "id": row.get("TaskID") or row.get("id"),
                "wave": row.get("SubprojectID") or row.get("wave"),
                "title": row.get("Title") or row.get("title"),
                "status": row.get("Status") or row.get("status"),
                "priority": row.get("Priority") or row.get("priority"),
                "domain": row.get("Area") or row.get("domain"),
                "target_paths": row.get("Routes") or row.get("target_paths"),
                "evidence_path": row.get("Evidence_Link") or row.get("evidence_path"),
            })

    return json.dumps({"count": len(tasks), "tasks": tasks}, indent=2)


def tool_run_tests(args):
    cmd = ["vendor/bin/phpunit"]
    testsuite = args.get("testsuite")
    test_filter = args.get("filter")
    test_file = args.get("file")

    if testsuite:
        cmd.extend(["--testsuite", testsuite])
    if test_filter:
        cmd.extend(["--filter", test_filter])
    if test_file:
        cmd.append(test_file)

    rc, output = run_cmd(cmd, timeout=300)

    # Parse tests / assertions / failures
    m_ok = re.search(r"OK \((\d+) tests?, (\d+) assertions?\)", output)
    m_fail = re.search(r"(?:FAILURES!|ERRORS!)\nTests: (\d+), Assertions: (\d+)(?:, Failures: (\d+))?(?:, Errors: (\d+))?", output)

    summary = {
        "returncode": rc,
        "success": rc == 0,
        "tests": 0,
        "assertions": 0,
        "failures": 0,
        "errors": 0,
        "output_tail": "\n".join(output.splitlines()[-15:]),
    }

    if m_ok:
        summary["tests"] = int(m_ok.group(1))
        summary["assertions"] = int(m_ok.group(2))
    elif m_fail:
        summary["tests"] = int(m_fail.group(1))
        summary["assertions"] = int(m_fail.group(2))
        summary["failures"] = int(m_fail.group(3) or 0)
        summary["errors"] = int(m_fail.group(4) or 0)

    return json.dumps(summary, indent=2)


def tool_form_smoke(_args):
    rc, output = run_cmd(["bash", "tests/smoke/form-certification-smoke.sh"], timeout=180)
    m_pass = re.search(r"PASS Count:\s+(\d+)", output)
    m_fail = re.search(r"FAIL Count:\s+(\d+)", output)

    return json.dumps({
        "returncode": rc,
        "success": rc == 0,
        "pass_count": int(m_pass.group(1)) if m_pass else None,
        "fail_count": int(m_fail.group(1)) if m_fail else None,
        "output_tail": "\n".join(output.splitlines()[-12:]),
    }, indent=2)


def tool_command_audit(_args):
    rc, output = run_cmd(["php", "spark", "ops:commands:audit", "--json"])
    try:
        # find json in output
        idx = output.find("{")
        if idx != -1:
            data = json.loads(output[idx:])
            return json.dumps(data, indent=2)
    except Exception:
        pass
    return json.dumps({"returncode": rc, "raw_output": output}, indent=2)


def tool_model_limit_audit(_args):
    rc, output = run_cmd(["php", "spark", "ops:model-limit:audit"])
    m_patterns = re.search(r"Unsafe query patterns detected:\s+(\d+)", output)
    return json.dumps({
        "returncode": rc,
        "unsafe_patterns": int(m_patterns.group(1)) if m_patterns else 0,
        "output": output.strip(),
    }, indent=2)


def tool_privacy_purge(args):
    cmd = ["php", "spark", "privacy:purge"]
    if args.get("apply"):
        cmd.append("--apply")
    rc, output = run_cmd(cmd)
    return json.dumps({"returncode": rc, "output": output.strip()}, indent=2)


def tool_aiops_bridge(args):
    """Query the centralized TBI AIOps MCP endpoint or report health."""
    payload = args.get("payload") or {"jsonrpc": "2.0", "id": 1, "method": "tools/list"}
    try:
        data = json.dumps(payload).encode("utf-8")
        req = urllib.request.Request(
            TBI_AIOPS_ENDPOINT,
            data=data,
            headers={"Content-Type": "application/json"},
            method="POST",
        )
        with urllib.request.urlopen(req, timeout=15) as resp:
            body = resp.read().decode("utf-8")
            return body
    except Exception as e:
        return json.dumps({
            "status": "bridge_unavailable",
            "endpoint": TBI_AIOPS_ENDPOINT,
            "error": str(e),
        }, indent=2)


TOOLS = [
    {
        "name": "mymi_status",
        "description": "Get current MyMI Wallet repository, branch, GTM completion stats, and form test baseline.",
        "inputSchema": {"type": "object", "properties": {}},
    },
    {
        "name": "mymi_gtm_tasks",
        "description": "Query GTM roadmap tasks by wave (e.g. W3, W4), status (done, proposed, in_review), or task ID.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "wave": {"type": "string", "description": "GTM wave e.g. W3, W4, W5"},
                "status": {"type": "string", "description": "Task status e.g. done, proposed, in_review"},
                "task_id": {"type": "string", "description": "Specific task ID e.g. MYMI-GTM-044"},
            },
        },
    },
    {
        "name": "mymi_run_tests",
        "description": "Run PHPUnit tests for MyMI Wallet (testsuite: unit, auth-smoke, feature; or specific file).",
        "inputSchema": {
            "type": "object",
            "properties": {
                "testsuite": {"type": "string", "description": "Test suite name (unit, auth-smoke, feature)"},
                "filter": {"type": "string", "description": "PHPUnit filter pattern"},
                "file": {"type": "string", "description": "Specific test file path"},
            },
        },
    },
    {
        "name": "mymi_form_smoke",
        "description": "Execute the full platform form inventory certification smoke suite and ratchet check.",
        "inputSchema": {"type": "object", "properties": {}},
    },
    {
        "name": "mymi_command_audit",
        "description": "Execute the Spark command rules audit to verify no constructors or typed properties.",
        "inputSchema": {"type": "object", "properties": {}},
    },
    {
        "name": "mymi_model_limit_audit",
        "description": "Run the model limit audit to detect unbounded findAll() or get()->getResultArray() queries.",
        "inputSchema": {"type": "object", "properties": {}},
    },
    {
        "name": "mymi_privacy_purge",
        "description": "Run the privacy export purge command (dry run by default; apply=true to delete expired files).",
        "inputSchema": {
            "type": "object",
            "properties": {
                "apply": {"type": "boolean", "description": "Whether to delete expired export files (default false)"},
            },
        },
    },
    {
        "name": "mymi_aiops_bridge",
        "description": "Bridge request to the centralized TBI AIOps MCP server.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "payload": {"type": "object", "description": "JSON-RPC request payload to send to centralized TBI AIOps"},
            },
        },
    },
]


def call_tool(name, args):
    handlers = {
        "mymi_status": tool_status,
        "mymi_gtm_tasks": tool_gtm_tasks,
        "mymi_run_tests": tool_run_tests,
        "mymi_form_smoke": tool_form_smoke,
        "mymi_command_audit": tool_command_audit,
        "mymi_model_limit_audit": tool_model_limit_audit,
        "mymi_privacy_purge": tool_privacy_purge,
        "mymi_aiops_bridge": tool_aiops_bridge,
    }
    handler = handlers.get(name)
    if not handler:
        raise ValueError(f"Unknown tool: {name}")
    return handler(args)


def send(msg):
    sys.stdout.write(json.dumps(msg) + "\n")
    sys.stdout.flush()


def handle(req):
    method, rid = req.get("method"), req.get("id")
    if method == "initialize":
        send({
            "jsonrpc": "2.0",
            "id": rid,
            "result": {
                "protocolVersion": req.get("params", {}).get("protocolVersion", "2024-11-05"),
                "capabilities": {"tools": {}},
                "serverInfo": {"name": "mymi-aiops", "version": "1.0.0"},
            },
        })
    elif method == "tools/list":
        send({"jsonrpc": "2.0", "id": rid, "result": {"tools": TOOLS}})
    elif method == "tools/call":
        p = req.get("params", {})
        try:
            text = call_tool(p.get("name"), p.get("arguments") or {})
            err = False
        except Exception as exc:
            text = f"Tool execution failed: {type(exc).__name__}: {exc}"
            err = True
        send({
            "jsonrpc": "2.0",
            "id": rid,
            "result": {"content": [{"type": "text", "text": text}], "isError": err},
        })
    elif method == "ping":
        send({"jsonrpc": "2.0", "id": rid, "result": {}})
    elif rid is not None:
        send({"jsonrpc": "2.0", "id": rid, "error": {"code": -32601, "message": "Method not found"}})


def main():
    for line in sys.stdin:
        line = line.strip()
        if line:
            try:
                handle(json.loads(line))
            except Exception as e:
                send({"jsonrpc": "2.0", "error": {"code": -32700, "message": str(e)}})


if __name__ == "__main__":
    main()
