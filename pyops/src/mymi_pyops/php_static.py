from __future__ import annotations

import json
import subprocess
from pathlib import Path
from typing import Any


def _run(command: list[str], cwd: Path, timeout_seconds: int = 60) -> dict[str, Any]:
    completed = subprocess.run(
        command,
        cwd=str(cwd),
        capture_output=True,
        text=True,
        timeout=timeout_seconds,
        shell=False,
        check=False,
    )

    return {
        "cmd": command,
        "exit_code": completed.returncode,
        "stdout": completed.stdout,
        "stderr": completed.stderr,
    }


def php_lint(*, project_root: Path, write_path: Path, req: dict[str, Any]) -> dict[str, Any]:
    targets = req.get("targets") or ["app/Commands/AIOps/PyOps.php"]

    if not isinstance(targets, list) or not all(isinstance(item, str) for item in targets):
        return {"ok": False, "error": "targets must be list[str]"}

    timeout_seconds = int(req.get("timeout_s") or 60)
    results: list[dict[str, Any]] = []
    all_ok = True

    for rel_path in targets:
        path = (project_root / rel_path).resolve()

        if not path.is_file():
            results.append({"path": rel_path, "ok": False, "error": "missing"})
            all_ok = False
            continue

        run = _run(["php", "-l", str(path)], cwd=project_root, timeout_seconds=timeout_seconds)
        lint_ok = run["exit_code"] == 0
        results.append({"path": rel_path, "ok": lint_ok, "stderr": run["stderr"][-4000:]})
        if not lint_ok:
            all_ok = False

    out_dir = write_path / "pyops" / "runs"
    out_dir.mkdir(parents=True, exist_ok=True)
    out_file = out_dir / "php_lint_last.json"
    out_file.write_text(json.dumps(results, ensure_ascii=False, indent=2), encoding="utf-8")

    return {
        "ok": all_ok,
        "artifacts": {"php_lint_report": str(out_file)},
        "results": results,
    }
