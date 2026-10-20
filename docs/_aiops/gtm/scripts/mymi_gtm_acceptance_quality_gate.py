#!/usr/bin/env python3
"""MyMI GTM acceptance-test admission gate. Read-only; never completes tasks.

Validate model-generated acceptance-test design separately from external-owner
attestation. No secrets or raw evidence contents are printed.
"""
from __future__ import annotations

import argparse
import csv
import hashlib
import json
import re
import sys
from pathlib import Path

FIELDS = ('task_id', 'positive', 'negative', 'authorization', 'integration',
          'failure', 'external_gate')
TEST_FIELDS = ('positive', 'negative', 'authorization', 'integration', 'failure')
CREDENTIALS = ('openai_api', 'database', 'basic_auth', 'webhook', 'health_service')
CRED_LABELS = {
    'openai_api': ('openai', 'api'),
    'database': ('database',),
    'basic_auth': ('basic', 'auth'),
    'webhook': ('webhook',),
    'health_service': ('health', 'service'),
}
STOPWORDS = {'with', 'from', 'this', 'that', 'the', 'and', 'for', 'every', 'into',
             'using', 'complete', 'certify', 'targeted', 'evidence', 'record', 'safe',
             'source', 'test', 'tests', 'task', 'positive', 'negative', 'failure',
             'authorization', 'integration', 'owner', 'security', 'required',
             'replace', 'tracked', 'runtime', 'contain'}


class GateError(ValueError):
    pass


def require(ok: bool, code: str) -> None:
    if not ok:
        raise GateError(code)


def read_json(path: Path) -> dict:
    require(path.is_file() and not path.is_symlink(), 'INPUT_FILE_INVALID')
    try:
        result = json.loads(path.read_text(encoding='utf-8'))
    except (UnicodeError, ValueError) as exc:
        raise GateError('INPUT_JSON_INVALID') from exc
    require(isinstance(result, dict), 'INPUT_OBJECT_REQUIRED')
    return result


def catalog(path: Path) -> dict[str, dict[str, str]]:
    require(path.is_file() and not path.is_symlink(), 'CATALOG_MISSING')
    with path.open(encoding='utf-8-sig', newline='') as handle:
        reader = csv.DictReader(handle)
        require(reader.fieldnames is not None and
                {'TaskID', 'Title', 'Acceptance', 'Dependencies', 'Owner'}
                <= set(reader.fieldnames), 'CATALOG_HEADER_INVALID')
        rows = list(reader)
    result: dict[str, dict[str, str]] = {}
    for row in rows:
        task = (row.get('TaskID') or '').strip()
        require(bool(re.fullmatch(r'MYMI-GTM-\d{3}', task)) and task not in result,
                'CATALOG_TASK_ID_INVALID')
        result[task] = {k: (v or '').strip() for k, v in row.items() if k}
    require(bool(result), 'CATALOG_EMPTY')
    return result


def keywords(value: str) -> set[str]:
    return {word for word in re.findall(r'[a-z0-9]{4,}', value.lower())
            if word not in STOPWORDS}


def meaningful_test(text: str, row: dict[str, str], field: str) -> None:
    words = re.findall(r'\b[\w./:-]+\b', text)
    require(len(words) >= 14, 'TEST_TOO_GENERIC:' + field)
    require(bool(re.search(r'\b(assert|verify|expect|reject|deny|denied|fail|'
                           r'fails|return|returns|block|blocked|check|confirm|'
                           r'observe|compare)\b', text, re.I)),
            'TEST_ASSERTION_MISSING:' + field)
    topical = keywords(row['Title'] + ' ' + row['Acceptance'])
    require(bool(keywords(text) & topical), 'TEST_NOT_TASK_SPECIFIC:' + field)
    require(not re.search(r'\b(TODO|TBD|INCOMPLETE|PLACEHOLDER|N/A)\b',
                          text, re.I), 'TEST_PLACEHOLDER:' + field)


def validate_design(rows: dict[str, dict[str, str]], tests: dict,
                    expected: set[str]) -> None:
    items = tests.get('task_tests')
    require(isinstance(items, list), 'TASK_TESTS_ARRAY_REQUIRED')
    require(all(isinstance(item, dict) for item in items), 'TASK_TEST_ROW_INVALID')
    got = [item.get('task_id') for item in items]
    require(all(isinstance(task_id, str) for task_id in got), 'TASK_ID_TYPE_INVALID')
    require(len(got) == len(expected) and len(set(got)) == len(got) and
            set(got) == expected, 'EXACT_TASK_ID_COVERAGE_FAILURE')
    require(expected <= set(rows), 'UNKNOWN_CATALOG_TASK')
    for item in items:
        task = item['task_id']
        require(set(FIELDS) <= set(item), 'TEST_FIELDS_MISSING:' + task)
        require(all(isinstance(item[k], str) and item[k].strip()
                    for k in FIELDS), 'TEST_FIELD_EMPTY:' + task)
        require(len({item[k].lower().strip() for k in TEST_FIELDS}) == 5,
                'REUSED_TEST_CASES:' + task)
        for field in TEST_FIELDS:
            meaningful_test(item[field], rows[task], field)
        patterns = {
            'negative': r'\b(reject|denied|invalid|unauthorized|missing|absent|error|blocked|fail|fails|tamper)\b',
            'authorization': r'\b(owner|role|permission|auth|access|security|token|denied)\b',
            'integration': r'\b(integration|pipeline|configuration|runtime|system|provider|webhook|workflow|service|api)\b',
            'failure': r'\b(fail|fails|error|missing|timeout|denied|invalid|blocked|reject|recovery)\b',
        }
        for field, pattern in patterns.items():
            require(bool(re.search(pattern, item[field], re.I)),
                    'TEST_CASE_SEMANTIC_MISMATCH:' + field + ':' + task)
        gate = item['external_gate'].lower()
        require(len(gate.split()) >= 8, 'EXTERNAL_GATE_TOO_GENERIC:' + task)
        text = ' '.join(item[k] for k in FIELDS if k != 'task_id').lower()
        deps = [d.strip() for d in rows[task]['Dependencies'].split(';') if d.strip()]
        for dep in deps:
            require(dep.lower() in text, 'DEPENDENCY_NOT_DECLARED:' + task)
        if task == 'MYMI-GTM-001':
            for key, labels in CRED_LABELS.items():
                require(all(x in text for x in labels), 'ROTATION_CATEGORY_MISSING:' + key)
            require('rotat' in text or 'revok' in text,
                    'ROTATION_OR_REVOCATION_TEST_MISSING')
            require('redact' in text and 'owner' in gate,
                    'EXTERNAL_OWNER_ROTATION_GATE_MISSING')
        if task == 'MYMI-GTM-002':
            require('chat/.env' in text and '.gitignore' in text,
                    'CONFIG_FILE_ASSERTIONS_MISSING')
            require('missing' in text and 'security' in gate,
                    'CONFIG_FAIL_CLOSED_SECURITY_GATE_MISSING')
        if rows[task]['Owner'] in ('human-external-mutation', 'security-owner'):
            require('owner' in gate and
                    any(x in gate for x in ('approval', 'verified', 'verify', 'pending', 'evidence')),
                    'OWNER_GATE_NOT_SPECIFIED:' + task)


def verify_attested_file(evidence_root: Path, record: dict, name: str) -> None:
    require(isinstance(record, dict), 'OWNER_EVIDENCE_MISSING:' + name)
    require(record.get('status') == 'verified' and record.get('redacted') is True,
            'OWNER_EVIDENCE_UNVERIFIED:' + name)
    require(bool(str(record.get('owner', '')).strip()) and
            bool(re.fullmatch(r'\d{4}-\d{2}-\d{2}T[^\s]+',
                              str(record.get('verified_at', '')))),
            'OWNER_ATTESTATION_MISSING:' + name)
    relative = record.get('path')
    require(isinstance(relative, str) and relative and
            not Path(relative).is_absolute() and '..' not in Path(relative).parts,
            'EVIDENCE_PATH_UNSAFE:' + name)
    base = evidence_root.resolve(strict=True)
    target = evidence_root / relative
    require(not target.is_symlink() and target.is_file() and
            target.resolve().is_relative_to(base), 'EVIDENCE_FILE_MISSING:' + name)
    expected = str(record.get('sha256', '')).lower()
    require(bool(re.fullmatch(r'[0-9a-f]{64}', expected)) and
            hashlib.sha256(target.read_bytes()).hexdigest() == expected,
            'EVIDENCE_HASH_MISMATCH:' + name)


def validate_evidence(rows: dict[str, dict[str, str]], expected: set[str],
                      evidence: dict, root: Path) -> None:
    records = evidence.get('tasks')
    require(isinstance(records, dict), 'OWNER_EVIDENCE_TASKS_MISSING')
    # Dependencies must be attested separately; a test case is not proof.
    for task in expected:
        row = records.get(task)
        require(isinstance(row, dict), 'TASK_ATTESTATION_MISSING:' + task)
        verify_attested_file(root, row.get('owner_approval'), task + ':owner_approval')
        for dep in (s.strip() for s in rows[task]['Dependencies'].split(';')):
            if dep:
                require(isinstance(records.get(dep), dict) and
                        records[dep].get('dependency_verified') is True,
                        'DEPENDENCY_NOT_VERIFIED:' + task + ':' + dep)
        if task == 'MYMI-GTM-001':
            rotations = row.get('credential_rotations')
            require(isinstance(rotations, dict), 'CREDENTIAL_ROTATIONS_MISSING')
            for category in CREDENTIALS:
                verify_attested_file(root, rotations.get(category),
                                     task + ':' + category)


def main(argv: list[str] | None = None) -> int:
    ap = argparse.ArgumentParser(description=__doc__)
    ap.add_argument('--catalog', required=True, type=Path)
    ap.add_argument('--candidate', required=True, type=Path)
    ap.add_argument('--task-id', action='append', required=True)
    ap.add_argument('--mode', choices=('design', 'evidence-review'), default='design')
    ap.add_argument('--evidence', type=Path)
    ap.add_argument('--evidence-root', type=Path)
    ap.add_argument('--candidate-sha256')
    args = ap.parse_args(argv)
    try:
        task_ids = set(args.task_id)
        require(len(task_ids) == len(args.task_id) and
                all(re.fullmatch(r'MYMI-GTM-\d{3}', t) for t in task_ids),
                'EXPECTED_TASK_IDS_INVALID')
        if args.candidate_sha256:
            require(bool(re.fullmatch(r'[a-fA-F0-9]{64}', args.candidate_sha256)) and
                    hashlib.sha256(args.candidate.read_bytes()).hexdigest() ==
                    args.candidate_sha256.lower(), 'CANDIDATE_ARTIFACT_HASH_MISMATCH')
        rows = catalog(args.catalog)
        validate_design(rows, read_json(args.candidate), task_ids)
        if args.mode == 'evidence-review':
            require(args.evidence is not None and args.evidence_root is not None,
                    'ATTESTATION_INPUTS_REQUIRED')
            validate_evidence(rows, task_ids, read_json(args.evidence),
                              args.evidence_root)
        print('STATUS=DESIGN_PASS_NOT_TASK_COMPLETION' if args.mode == 'design'
              else 'STATUS=EVIDENCE_PACKET_VALIDATED_OWNER_CONFIRMATION_REQUIRED')
        print('TASK_IDS=' + ','.join(sorted(task_ids)))
        print('SOURCE_MUTATION=0')
        return 0
    except (GateError, OSError) as exc:
        code = str(exc) if isinstance(exc, GateError) else 'INPUT_IO_ERROR'
        print('STATUS=QUALITY_HOLD')
        print('REASON=' + code)
        print('SOURCE_MUTATION=0')
        return 2


if __name__ == '__main__':
    sys.exit(main())
