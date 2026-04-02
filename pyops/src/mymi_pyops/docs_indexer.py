from __future__ import annotations

import hashlib
import json
import re
from pathlib import Path
from typing import Any

_MD_EXTENSIONS = {".md", ".markdown"}


def _sha256_text(content: str) -> str:
    return hashlib.sha256(content.encode("utf-8", errors="replace")).hexdigest()


def _extract_headings(content: str) -> list[str]:
    headings: list[str] = []
    for line in content.splitlines():
        match = re.match(r"^(#{1,6})\s+(.*)$", line.strip())
        if match:
            headings.append(match.group(2).strip())
    return headings


def _collect_markdown(project_root: Path, globs: list[str]) -> list[Path]:
    files: list[Path] = []
    for pattern in globs:
        files.extend(project_root.glob(pattern))

    return sorted(
        {path.resolve() for path in files if path.is_file() and path.suffix.lower() in _MD_EXTENSIONS}
    )


def build_docs_index(*, project_root: Path, write_path: Path, req: dict[str, Any]) -> dict[str, Any]:
    globs = req.get("doc_globs") or [
        "README.md",
        "AGENTS.md",
        "docs/**/*.md",
        "docs/_aiops/**/*.md",
    ]

    if not isinstance(globs, list) or not all(isinstance(item, str) for item in globs):
        return {"ok": False, "error": "doc_globs must be a list[str]"}

    markdown_files = _collect_markdown(project_root, globs)

    index: dict[str, Any] = {
        "counts": {"files": len(markdown_files)},
        "files": [],
    }

    for path in markdown_files:
        rel_path = str(path.relative_to(project_root))
        content = path.read_text(encoding="utf-8", errors="replace")
        index["files"].append(
            {
                "path": rel_path,
                "sha256": _sha256_text(content),
                "bytes": len(content.encode("utf-8", errors="replace")),
                "headings": _extract_headings(content)[:50],
            }
        )

    cache_dir = write_path / "pyops" / "cache"
    cache_dir.mkdir(parents=True, exist_ok=True)
    output_file = cache_dir / "docs_index.json"
    output_file.write_text(json.dumps(index, ensure_ascii=False, indent=2), encoding="utf-8")

    return {
        "ok": True,
        "artifacts": {
            "docs_index_path": str(output_file),
            "docs_index_files": len(markdown_files),
        },
        "metrics": {"doc_files_indexed": len(markdown_files)},
    }
