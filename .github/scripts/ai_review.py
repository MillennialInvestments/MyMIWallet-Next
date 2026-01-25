#!/usr/bin/env python3
import json
import os
import re
import subprocess
import sys
import textwrap
import urllib.error
import urllib.request
from datetime import datetime, timezone
from pathlib import Path

API_URL = "https://api.openai.com/v1/chat/completions"
DEFAULT_MODEL = "gpt-4o-mini"
MAX_CHUNK_BYTES = 100_000
MAX_TOTAL_BYTES = 400_000
MAX_TOKENS = 1200
REQUEST_TIMEOUT = 30

CORE_PROMPT = """You are a senior CodeIgniter 4 architect reviewing a production fintech platform (MyMI Wallet).

Review the following Pull Request diff.

Focus on:

1. CodeIgniter 4 correctness
   - controllers, services, models, routes
   - constructors, filters, namespaces
2. Architectural integrity
   - controller vs service separation
   - model usage
   - no business logic in views
3. Performance
   - query efficiency
   - batching
   - denormalized fields for dashboards
   - no N+1 patterns
4. Safety
   - null guards
   - edge cases
   - rate limit handling
5. Automation
   - CRON safety
   - idempotency
6. Dashboard integrity
   - no blocking external calls
   - Fetch API usage
   - DataTables compatibility
7. Documentation consistency
   - docs match behavior

Return:
- Summary
- High-risk issues (if any)
- Medium-risk issues
- Low-risk suggestions
- Explicit recommendations

PR DIFF:
"""


def log(message: str) -> None:
    print(message, flush=True)


def run_command(command: list[str]) -> str:
    result = subprocess.run(command, check=True, capture_output=True, text=True)
    return result.stdout


def chunk_text(content: str, max_bytes: int) -> list[str]:
    encoded = content.encode("utf-8")
    chunks = []
    start = 0
    while start < len(encoded):
        end = min(start + max_bytes, len(encoded))
        chunk = encoded[start:end].decode("utf-8", errors="ignore")
        chunks.append(chunk)
        start = end
    return chunks


def trim_total_bytes(content: str, max_bytes: int) -> tuple[str, bool]:
    encoded = content.encode("utf-8")
    if len(encoded) <= max_bytes:
        return content, False
    trimmed = encoded[:max_bytes].decode("utf-8", errors="ignore")
    return trimmed, True


def openai_chat(messages: list[dict[str, str]]) -> str:
    api_key = os.getenv("OPENAI_API_KEY")
    if not api_key:
        raise RuntimeError("OPENAI_API_KEY not set")
    payload = {
        "model": os.getenv("OPENAI_MODEL", DEFAULT_MODEL),
        "messages": messages,
        "max_tokens": MAX_TOKENS,
        "temperature": 0.2,
    }
    data = json.dumps(payload).encode("utf-8")
    request = urllib.request.Request(
        API_URL,
        data=data,
        headers={
            "Authorization": f"Bearer {api_key}",
            "Content-Type": "application/json",
        },
        method="POST",
    )
    with urllib.request.urlopen(request, timeout=REQUEST_TIMEOUT) as response:
        response_data = json.loads(response.read().decode("utf-8"))
    return response_data["choices"][0]["message"]["content"].strip()


def load_event_payload() -> dict:
    path = os.getenv("GITHUB_EVENT_PATH")
    if not path:
        return {}
    return json.loads(Path(path).read_text(encoding="utf-8"))


def get_labels(payload: dict) -> list[str]:
    labels = payload.get("pull_request", {}).get("labels", [])
    return [label.get("name", "") for label in labels if label.get("name")]


def detect_modes(labels: list[str]) -> list[str]:
    modes = []
    for label in labels:
        if label == "ai-review:adversarial":
            modes.append("adversarial")
        if label == "ai-review:performance":
            modes.append("performance")
        if label == "ai-review:docs":
            modes.append("docs")
    return modes


def build_pr_diff() -> str:
    diff_path = Path("pr.diff")
    if diff_path.exists():
        return diff_path.read_text(encoding="utf-8")
    return ""


def build_nightly_diff() -> str:
    paths = [
        "app/Controllers",
        "app/Models",
        "app/Config/Routes.php",
        "app/Commands",
        "app/Config/Tasks.php",
        "app/Config/Cronjob.php",
    ]
    command = [
        "git",
        "log",
        "--since=24 hours ago",
        "-p",
        "--",
    ] + paths
    try:
        return run_command(command)
    except subprocess.CalledProcessError:
        return ""


def format_review_comment(body: str) -> str:
    return textwrap.dedent(
        f"""
        ## 🤖 AI Code Review (CI4)

        {body.strip()}
        """
    ).strip()


def post_pr_comment(payload: dict, body: str) -> None:
    repository = os.getenv("GITHUB_REPOSITORY", "")
    if not repository or "pull_request" not in payload:
        raise RuntimeError("Missing repository or pull_request info")
    owner, repo = repository.split("/")
    pr_number = payload["pull_request"]["number"]
    url = f"https://api.github.com/repos/{owner}/{repo}/issues/{pr_number}/comments"
    post_github_comment(url, body)


def post_commit_comment(body: str) -> None:
    repository = os.getenv("GITHUB_REPOSITORY", "")
    if not repository:
        raise RuntimeError("Missing repository info")
    owner, repo = repository.split("/")
    sha = run_command(["git", "rev-parse", "HEAD"]).strip()
    url = f"https://api.github.com/repos/{owner}/{repo}/commits/{sha}/comments"
    payload = {"body": body}
    post_github_comment(url, payload)


def post_github_comment(url: str, body: str | dict) -> None:
    token = os.getenv("GITHUB_TOKEN")
    if not token:
        raise RuntimeError("GITHUB_TOKEN not set")
    payload = body if isinstance(body, dict) else {"body": body}
    data = json.dumps(payload).encode("utf-8")
    request = urllib.request.Request(
        url,
        data=data,
        headers={
            "Authorization": f"Bearer {token}",
            "Accept": "application/vnd.github+json",
            "Content-Type": "application/json",
        },
        method="POST",
    )
    with urllib.request.urlopen(request, timeout=REQUEST_TIMEOUT) as response:
        response.read()


def build_review(diff_text: str, modes: list[str], extra_prompt: str | None = None) -> str:
    trimmed_diff, truncated = trim_total_bytes(diff_text, MAX_TOTAL_BYTES)
    chunks = chunk_text(trimmed_diff, MAX_CHUNK_BYTES)
    chunk_reviews = []
    for index, chunk in enumerate(chunks, start=1):
        header = f"Chunk {index} of {len(chunks)}\n"
        prompt = CORE_PROMPT + header + chunk
        if extra_prompt:
            prompt = extra_prompt.strip() + "\n\n" + prompt
        if modes:
            prompt = f"Mode requests detected (stub only): {', '.join(modes)}\n\n" + prompt
        messages = [
            {"role": "system", "content": "You are a careful code reviewer."},
            {"role": "user", "content": prompt},
        ]
        chunk_reviews.append(openai_chat(messages))
    if len(chunk_reviews) == 1:
        review = chunk_reviews[0]
    else:
        summary_prompt = textwrap.dedent(
            """
            Combine the following chunk reviews into one review with these sections:
            - Summary
            - High-risk issues (if any)
            - Medium-risk issues
            - Low-risk suggestions
            - Explicit recommendations
            """
        ).strip()
        combined = "\n\n".join(f"Chunk {i}:\n{review}" for i, review in enumerate(chunk_reviews, start=1))
        messages = [
            {"role": "system", "content": "You are a careful code reviewer."},
            {"role": "user", "content": summary_prompt + "\n\n" + combined},
        ]
        review = openai_chat(messages)
    if truncated:
        review += "\n\n_Notice: Diff was truncated for cost control._"
    return review


def build_no_diff_message(context: str) -> str:
    return f"No diff available to review for {context}."


def detect_guardrail_findings(diff_text: str) -> list[str]:
    findings = []
    current_file = ""
    for raw_line in diff_text.splitlines():
        if raw_line.startswith("diff --git"):
            parts = raw_line.split(" ")
            if len(parts) >= 4:
                current_file = parts[3].replace("b/", "")
            continue
        if raw_line.startswith("+++ b/"):
            current_file = raw_line.replace("+++ b/", "")
            continue
        if not raw_line.startswith("+") or raw_line.startswith("+++"):
            continue
        line = raw_line[1:]

        if re.search(r"(?:Services|CoreServices|parent)::\\w+\\(\\s*(true|false)\\b", line):
            findings.append(
                "CI4 ≥4.5 expects config-first service signatures; boolean-first calls are invalid and can fatal at bootstrap. "
                "Fix: pass the config object as arg #1 and move the boolean to arg #2, e.g. "
                "`Services::cache($config, true)` or update the override signature."
            )

        if re.search(r"public\\s+static\\s+function\\s+\\w+\\(\\s*bool\\s+\\$getShared", line):
            findings.append(
                "CI4 ≥4.5 service overrides must accept the config object as the first parameter. "
                "Why invalid: boolean-first overrides mismatch the core signature and can break container resolution. "
                "Fix: `public static function serviceName(?ConfigClass $config = null, bool $getShared = true)`."
            )

        if "responsecache" in line.lower() and current_file and not current_file.endswith(
            ("app/Config/Filters.php", "app/Config/Routes.php")
        ):
            findings.append(
                "CI4 ≥4.5 response caching must be applied via Filters/Routes only. "
                "Why invalid: response cache usage outside Filters/Routes risks bootstrap-time fatals on CLI/HEAD. "
                "Fix: attach `responsecache` via route options or controller filters."
            )

        if current_file.startswith("app/Config/Boot/") and "Services::" in line:
            findings.append(
                "CI4 ≥4.5 bootstrap must remain minimal; service execution in boot files can trigger early session/cache mutations. "
                "Fix: defer service usage to controllers/filters and keep boot files limited to autoloader and environment setup."
            )

    unique = []
    for finding in findings:
        if finding not in unique:
            unique.append(finding)
    return unique


def append_guardrail_block(body: str, findings: list[str]) -> str:
    if not findings:
        return body
    bullets = "\n".join(f"- {finding}" for finding in findings)
    guardrail_block = textwrap.dedent(
        f"""
        \n\n## 🔒 Config Guardrails (Auto-detected)\n{bullets}
        """
    ).strip()
    return body + "\n\n" + guardrail_block


def main() -> int:
    payload = load_event_payload()
    event_name = os.getenv("GITHUB_EVENT_NAME", "")
    labels = get_labels(payload)
    modes = detect_modes(labels)

    api_key = os.getenv("OPENAI_API_KEY")
    if not api_key:
        log("OPENAI_API_KEY missing; skipping AI review.")
        return 0

    try:
        if event_name == "pull_request":
            diff_text = build_pr_diff()
            if not diff_text.strip():
                body = build_no_diff_message("this pull request")
            else:
                body = build_review(diff_text, modes)
                guardrails = detect_guardrail_findings(diff_text)
                body = append_guardrail_block(body, guardrails)
            comment = format_review_comment(body)
            post_pr_comment(payload, comment)
        else:
            diff_text = build_nightly_diff()
            if not diff_text.strip():
                body = build_no_diff_message("the last 24 hours")
            else:
                nightly_prompt = "What CI4 risks were introduced in the last 24 hours?"
                review = build_review(diff_text, modes, extra_prompt=nightly_prompt)
                timestamp = datetime.now(timezone.utc).strftime("%Y-%m-%d %H:%M UTC")
                body = f"## 🤖 AI Code Review (CI4) Nightly Audit\n\nTimestamp: {timestamp}\n\n{review}"
            post_commit_comment(body)
        log("AI review completed.")
    except (
        RuntimeError,
        subprocess.CalledProcessError,
        urllib.error.URLError,
        json.JSONDecodeError,
        KeyError,
    ) as exc:
        log(f"AI review skipped due to error: {exc}")
    return 0


if __name__ == "__main__":
    sys.exit(main())
