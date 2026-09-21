#!/usr/bin/env python3
from __future__ import annotations

import argparse
import csv
import json
from collections import Counter
from pathlib import Path

FIELDS = [
    "TaskID", "ProjectID", "SubprojectID", "Area", "Feature_Surface",
    "Title", "Acceptance", "Status", "Severity", "Priority", "Owner",
    "Due_Date", "Routes", "Handler", "Dependencies", "Evidence_Link",
    "Updated_UTC",
]
DONE = {"done", "complete", "completed", "closed", "merged"}
PRIORITY_ORDER = {"P0": 0, "P1": 1, "P2": 2, "P3": 3}
SEVERITY_ORDER = {"critical": 0, "high": 1, "medium": 2, "low": 3}
REQUIRED_DOCS = [
    "TBI_AIOPS_INSTALL_HANDOFF.md",
    "MYMI_PLATFORM_COMPLETION_ROADMAP.md",
    "MYMI_PLATFORM_COMPLETION_AUDIT_2026-09-20.md",
    "NORMAL_CHATGPT_OPERATOR_INSTRUCTIONS.md",
]

def gtm_root(repo: str) -> Path:
    return Path(repo).resolve() / "docs/_aiops/gtm"

def load_tasks(repo: str) -> list[dict[str, str]]:
    path = gtm_root(repo) / "tasks.csv"
    if not path.is_file():
        raise RuntimeError(f"missing task catalog: {path}")
    with path.open(newline="", encoding="utf-8") as handle:
        reader = csv.DictReader(handle)
        if reader.fieldnames != FIELDS:
            raise RuntimeError("task catalog header mismatch: " + repr(reader.fieldnames))
        rows = [{key: (value or "").strip() for key, value in row.items()} for row in reader]
    if not rows:
        raise RuntimeError("task catalog is empty")
    return rows

def dependencies(row: dict[str, str]) -> list[str]:
    return [part.strip() for part in row.get("Dependencies", "").split(";") if part.strip()]

def validate(repo: str) -> list[dict[str, str]]:
    root = gtm_root(repo)
    rows = load_tasks(repo)
    ids = [row["TaskID"] for row in rows]
    if any(not task_id for task_id in ids):
        raise RuntimeError("blank TaskID in task catalog")
    if len(ids) != len(set(ids)):
        duplicates = sorted(task_id for task_id, count in Counter(ids).items() if count > 1)
        raise RuntimeError("duplicate TaskID values: " + ", ".join(duplicates))
    known = set(ids)
    missing_dependencies = sorted({
        dep for row in rows for dep in dependencies(row) if dep not in known
    })
    if missing_dependencies:
        raise RuntimeError("unknown task dependencies: " + ", ".join(missing_dependencies))
    missing_docs = [name for name in REQUIRED_DOCS if not (root / name).is_file()]
    if missing_docs:
        raise RuntimeError("missing GTM docs: " + ", ".join(missing_docs))
    print("STATUS=PASS")
    print(f"TASK_COUNT={len(rows)}")
    print(f"FIRST_TASK={ids[0]}")
    print(f"LAST_TASK={ids[-1]}")
    return rows

def completed_ids(rows: list[dict[str, str]], explicit: list[str]) -> set[str]:
    completed = set(explicit)
    for row in rows:
        if row.get("Status", "").lower() in DONE:
            completed.add(row["TaskID"])
    return completed

def ready_rows(rows: list[dict[str, str]], completed: set[str]) -> list[dict[str, str]]:
    candidates = []
    for row in rows:
        if row["TaskID"] in completed:
            continue
        if row.get("Status", "").lower() in DONE:
            continue
        if all(dep in completed for dep in dependencies(row)):
            candidates.append(row)
    return sorted(
        candidates,
        key=lambda row: (
            PRIORITY_ORDER.get(row.get("Priority", ""), 99),
            SEVERITY_ORDER.get(row.get("Severity", "").lower(), 99),
            row["TaskID"],
        ),
    )

def audit(repo: str) -> None:
    rows = validate(repo)
    completed = completed_ids(rows, [])
    ready = ready_rows(rows, completed)
    payload = {
        "task_count": len(rows),
        "status_counts": dict(sorted(Counter(row["Status"] for row in rows).items())),
        "priority_counts": dict(sorted(Counter(row["Priority"] for row in rows).items())),
        "severity_counts": dict(sorted(Counter(row["Severity"] for row in rows).items())),
        "ready_task_ids": [row["TaskID"] for row in ready[:20]],
    }
    print(json.dumps(payload, indent=2, sort_keys=True))

def next_task(repo: str, explicit: list[str]) -> None:
    rows = validate(repo)
    ready = ready_rows(rows, completed_ids(rows, explicit))
    if not ready:
        print("STATUS=NO_READY_TASK")
        return
    row = ready[0]
    print("STATUS=READY")
    for key in ["TaskID", "Title", "Priority", "Severity", "Owner", "Dependencies", "Acceptance", "Evidence_Link"]:
        print(f"{key.upper()}={row.get(key, '')}")

def packet(repo: str, task_id: str, output: str) -> None:
    rows = validate(repo)
    row = next((item for item in rows if item["TaskID"] == task_id), None)
    if row is None:
        raise RuntimeError(f"unknown task: {task_id}")
    paths = [part.strip() for part in row.get("Routes", "").split(";") if part.strip()]
    handler = row.get("Handler", "").strip()
    if handler:
        paths.append(handler)
    body = [
        f"# {row['TaskID']} — {row['Title']}",
        "",
        "## Scope",
        f"- Project: {row['ProjectID']}",
        f"- Wave: {row['SubprojectID']}",
        f"- Area: {row['Area']}",
        f"- Priority: {row['Priority']}",
        f"- Severity: {row['Severity']}",
        f"- Owner/gate: {row['Owner']}",
        f"- Dependencies: {row['Dependencies'] or 'none'}",
        "",
        "## Acceptance",
        row["Acceptance"],
        "",
        "## Initial paths",
    ]
    body.extend(f"- \`{path}\`" for path in paths)
    body.extend([
        "",
        "## Evidence",
        f"- {row['Evidence_Link']}",
        "",
        "## Execution contract",
        "Work only inside the current authorized TBI AIOps worktree. Start with read-only discovery. Do not print secrets, change production, commit, push, merge, deploy, edit AIOps state manually, or expand scope. Use \`ai finish\` for governed closeout.",
        "",
    ])
    target = Path(output)
    target.parent.mkdir(parents=True, exist_ok=True)
    target.write_text("\n".join(body), encoding="utf-8")
    print(f"STATUS=PASS\nPACKET={target}")

def main() -> None:
    parser = argparse.ArgumentParser()
    sub = parser.add_subparsers(dest="command", required=True)
    for name in ["validate", "audit"]:
        child = sub.add_parser(name)
        child.add_argument("--repo", default=".")
    nxt = sub.add_parser("next")
    nxt.add_argument("--repo", default=".")
    nxt.add_argument("--completed", nargs="*", default=[])
    pkt = sub.add_parser("packet")
    pkt.add_argument("--repo", default=".")
    pkt.add_argument("--task", required=True)
    pkt.add_argument("--output", required=True)
    args = parser.parse_args()
    if args.command == "validate":
        validate(args.repo)
    elif args.command == "audit":
        audit(args.repo)
    elif args.command == "next":
        next_task(args.repo, args.completed)
    elif args.command == "packet":
        packet(args.repo, args.task, args.output)

if __name__ == "__main__":
    main()
