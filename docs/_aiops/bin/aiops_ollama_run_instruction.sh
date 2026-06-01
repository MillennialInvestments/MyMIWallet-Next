#!/usr/bin/env bash

set -u

REPO="${AIOPS_REPO:-$(pwd)}"
SOURCE_INSTRUCTION="${1:-}"
SEVERITY="${2:-HIGH}"
MODEL="${AIOPS_OLLAMA_MODEL:-qwen2.5-coder:1.5b}"
RUN_ID="$(date +%Y%m%d-%H%M%S)"

cd "$REPO" || {
  echo "FAIL: Could not access repo: $REPO"
  exit 1
}

if [ -z "$SOURCE_INSTRUCTION" ]; then
  echo "Usage: docs/_aiops/bin/aiops_ollama_run_instruction.sh docs/_aiops/instructions/file.md [HIGH|MEDIUM|LOW]"
  exit 1
fi

if [ ! -f "$SOURCE_INSTRUCTION" ]; then
  echo "FAIL: Instruction file not found: $SOURCE_INSTRUCTION"
  exit 1
fi

mkdir -p docs/_aiops/instructions/runs docs/_aiops/reports/aiops-runner

FRESH_INSTRUCTION="docs/_aiops/instructions/runs/$(basename "$SOURCE_INSTRUCTION" .md)-run-${RUN_ID}.md"
REPORT="docs/_aiops/reports/aiops-runner/aiops-ollama-run-${RUN_ID}.txt"

cp "$SOURCE_INSTRUCTION" "$FRESH_INSTRUCTION"

{
  echo
  echo "## Forced AIOps/Ollama Run Context"
  echo
  echo "- Run ID: ${RUN_ID}"
  echo "- Source instruction: ${SOURCE_INSTRUCTION}"
  echo "- Fresh instruction: ${FRESH_INSTRUCTION}"
  echo "- Severity: ${SEVERITY}"
  echo "- Model: ${MODEL}"
  echo "- Required behavior: treat this as a new runnable instruction, even if prior similar instructions exist."
  echo "- Required output: produce actual code changes or a specific failure reason."
  echo "- Do not create broad docs-only churn."
} >> "$FRESH_INSTRUCTION"

export OLLAMA_MODE=local
export OLLAMA_BASE_URL=http://127.0.0.1:11434
export OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
export OLLAMA_ENDPOINT=http://127.0.0.1:11434/api/generate
export OLLAMA_MODEL="$MODEL"
export OLLAMA_DEFAULT_CHAT_MODEL="$MODEL"
export OLLAMA_TIMEOUT="${OLLAMA_TIMEOUT:-180}"
export OLLAMA_TIMEOUT_SECONDS="${OLLAMA_TIMEOUT_SECONDS:-180}"
export OLLAMA_TOKEN_LIMIT="${OLLAMA_TOKEN_LIMIT:-4096}"
export OLLAMA_MEMORY_LIMIT_MB="${OLLAMA_MEMORY_LIMIT_MB:-512}"

ABS_INSTRUCTION="$REPO/$FRESH_INSTRUCTION"

{
  echo "===== GLOBAL AIOPS / OLLAMA INSTRUCTION RUN ====="
  date -u

  echo
  echo "===== REPO / BRANCH ====="
  pwd
  git branch --show-current
  git status --short

  echo
  echo "===== LOCAL OLLAMA ENV ====="
  echo "OLLAMA_MODE=$OLLAMA_MODE"
  echo "OLLAMA_BASE_URL=$OLLAMA_BASE_URL"
  echo "OLLAMA_INTERNAL_BASE_URL=$OLLAMA_INTERNAL_BASE_URL"
  echo "OLLAMA_ENDPOINT=$OLLAMA_ENDPOINT"
  echo "OLLAMA_MODEL=$OLLAMA_MODEL"
  echo "OLLAMA_DEFAULT_CHAT_MODEL=$OLLAMA_DEFAULT_CHAT_MODEL"

  echo
  echo "===== LOCAL OLLAMA HEALTH ====="
  curl -sS --max-time 10 http://127.0.0.1:11434/api/tags || true
  echo
  php spark ollama:health 2>&1 || true
  php spark ollama:models:list 2>&1 || true

  echo
  echo "===== FRESH INSTRUCTION ====="
  ls -lah "$ABS_INSTRUCTION"
  sed -n '1,260p' "$ABS_INSTRUCTION"

  echo
  echo "===== COMMIT FRESH RUN INSTRUCTION ====="
  git add "$FRESH_INSTRUCTION"
  git commit -m "Add forced AIOps/Ollama run instruction ${RUN_ID}" || true

  echo
  echo "===== INGEST ====="
  php spark aiops:ingest --file="$ABS_INSTRUCTION" --severity="$SEVERITY" 2>&1 || true

  echo
  echo "===== WORKER ONCE ====="
  php spark aiops:worker --once 2>&1 || php spark aiops:worker 2>&1 || true

  echo
  echo "===== AIOPS RUN FALLBACK ====="
  php spark aiops:run 2>&1 || true

  echo
  echo "===== PATCH VALIDATE ====="
  php spark aiops:patch:validate 2>&1 || true

  echo
  echo "===== LATEST PATCH JOB ====="
  LATEST_JOB="$(ls -td docs/_aiops/patch_jobs/* 2>/dev/null | head -n 1)"
  echo "$LATEST_JOB"
  if [ -n "$LATEST_JOB" ]; then
    find "$LATEST_JOB" -maxdepth 2 -type f -print 2>/dev/null || true
    sed -n '1,220p' "$LATEST_JOB/instruction.md" 2>/dev/null || true
    sed -n '1,260p' "$LATEST_JOB/ollama_prompt.md" 2>/dev/null || true
  fi

  echo
  echo "===== PR READY OUTPUTS ====="
  find docs/_aiops/pr_ready -maxdepth 3 -type f 2>/dev/null | sort | tail -n 100

  echo
  echo "===== FINAL STATUS ====="
  git status --short

  echo
  echo "===== FINAL DIFF STAT ====="
  git diff --stat
} > "$REPORT" 2>&1

echo "AIOps/Ollama run report saved to:"
echo "$REPORT"

echo
echo "===== SUMMARY ====="
grep -Ei "status|ok|degraded|down|503|duplicate|near-duplicate|queued|runnable|No runnable|worker|patch|failed|invalid|error|exception|created|modified|updated|FINAL STATUS|FINAL DIFF STAT|No syntax errors" "$REPORT" | head -n 360 || true

echo
echo "===== STATUS ====="
git status --short

echo
echo "===== DIFF STAT ====="
git diff --stat
