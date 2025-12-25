# Go-Live Readiness Artifacts

This folder contains operational assets that turn the go-live checklist into a living launch command center.

## Files
- `go_live_checklist.md`: Source-of-truth definitions for every go-live verification step.
- `go_live_checklist_tracker.csv`: Excel-ready tracker that mirrors the markdown checklist.
- `go_live_checklist_tracker.xlsx.b64`: Base64 text package of the Excel tracker. Decode to `go_live_checklist_tracker.xlsx` (see below).
- `MyMI_Wallet_Go_Live_and_User_Journey.pptx.b64`: Base64 text package of the PowerPoint deck. Decode to `MyMI_Wallet_Go_Live_and_User_Journey.pptx`.
- `operational_usage.md`: Rules for how to run the tracker day-to-day, including gating logic and incident linking.

## Terminology Alignment
The CSV, Excel, PPTX, and admin module should all use the step IDs and module names from `go_live_checklist.md` to keep reporting consistent.

## How to materialize the Excel/PPTX artifacts (avoids binary-in-repo blockers)
From the repo root:

```bash
python - <<'PY'
import base64, pathlib
root = pathlib.Path("docs/go-live")
for name in ["go_live_checklist_tracker.xlsx", "MyMI_Wallet_Go_Live_and_User_Journey.pptx"]:
    b64_path = root / f\"{name}.b64\"
    out_path = root / name
    data = base64.b64decode(b64_path.read_text())
    out_path.write_bytes(data)
    print(\"wrote\", out_path)
PY
```
