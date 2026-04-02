from __future__ import annotations

import argparse
import json
import os
from pathlib import Path
from typing import Any

from mymi_pyops.docs_indexer import build_docs_index
from mymi_pyops.patcher import propose_patch
from mymi_pyops.php_static import php_lint


def _env_path(key: str, default: str) -> Path:
    return Path(os.environ.get(key, default)).resolve()


def main() -> int:
    parser = argparse.ArgumentParser(description="MyMI PyOps CLI")
    parser.add_argument("--request", required=True, help="Path to request.json")
    args = parser.parse_args()

    request_path = Path(args.request).resolve()
    if not request_path.is_file():
        print(json.dumps({"ok": False, "error": f"request file not found: {request_path}"}))
        return 2

    try:
        req = json.loads(request_path.read_text(encoding="utf-8"))
    except Exception as exc:  # noqa: BLE001
        print(json.dumps({"ok": False, "error": f"invalid JSON request: {exc}"}))
        return 2

    action = str(req.get("action", "")).strip()
    project_root = _env_path("PYOPS_PROJECT_ROOT", str(Path.cwd()))
    write_path = _env_path("PYOPS_WRITE_PATH", str(project_root / "writable"))

    if not action:
        print(json.dumps({"ok": False, "error": "missing action"}))
        return 2

    try:
        if action == "docs.index":
            output = build_docs_index(project_root=project_root, write_path=write_path, req=req)
        elif action == "php.lint":
            output = php_lint(project_root=project_root, write_path=write_path, req=req)
        elif action == "patch.propose":
            output = propose_patch(project_root=project_root, write_path=write_path, req=req)
        else:
            output = {"ok": False, "action": action, "error": f"unknown action: {action}"}

        output.setdefault("action", action)
        print(json.dumps(output, ensure_ascii=False))
        return 0 if output.get("ok") else 2
    except Exception as exc:  # noqa: BLE001
        print(
            json.dumps(
                {
                    "ok": False,
                    "action": action,
                    "error": f"unhandled exception: {exc.__class__.__name__}: {exc}",
                }
            )
        )
        return 2


if __name__ == "__main__":
    raise SystemExit(main())
