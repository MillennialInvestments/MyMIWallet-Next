#!/usr/bin/env python3
"""Read-only evidence inventory for MYMI-GTM-009.

Never closes/merges PRs or treats overlap as proof of acceptance.
"""
import argparse
import base64
import csv
import json
import re
import subprocess
from datetime import datetime, timezone
from pathlib import Path

REPO = 'MillennialInvestments/MyMIWallet-Next'
PR_NUMBERS = (623, 629, 630, 631, 632, 633, 634, 637)
DUPLICATE_CANDIDATES = (629, 631, 633)


def cmd(argv, timeout=40):
    result = subprocess.run(argv, text=True, capture_output=True, timeout=timeout)
    if result.returncode:
        raise RuntimeError('READ_ONLY_SOURCE_UNAVAILABLE: ' + ' '.join(argv[:4])
                           + ' (rc=' + str(result.returncode) + ')')
    return result.stdout


def api(endpoint):
    return json.loads(cmd(['gh', 'api', endpoint]))


def all_open_prs():
    fields = 'number,title,state,isDraft,headRefName,headRefOid,headRepository,headRepositoryOwner,baseRefName,url'
    result = json.loads(cmd(['gh','pr','list','--repo',REPO,'--state','open',
                             '--limit','500','--json',fields],timeout=150))
    if len(result)>=500:
        raise RuntimeError('OPEN_PR_INVENTORY_PAGINATION_LIMIT_REACHED')
    numbers=[int(r['number']) for r in result]
    if len(numbers)!=len(set(numbers)):
        raise RuntimeError('OPEN_PR_DUPLICATE_IDENTITIES')
    return sorted(result,key=lambda r:int(r['number']))


def same_repository_head(pr):
    """Never mistake a same-named head branch in a fork for a stack parent."""
    head = pr.get('headRepository')
    if not isinstance(head, dict):
        return False
    full_name = head.get('nameWithOwner')
    if not isinstance(full_name, str) or not full_name:
        owner = pr.get('headRepositoryOwner')
        if not isinstance(owner, dict):
            owner = head.get('owner')
        if not isinstance(owner, dict):
            return False
        full_name = str(owner.get('login', '')) + '/' + str(head.get('name', ''))
    return full_name.casefold() == REPO.casefold()


def stacked_parent(pr, open_records):
    base=pr.get('baseRefName','')
    if base in ('main','master'):
        return 'MAIN_BASE'
    matching=[q for q in open_records if q.get('headRefName')==base
              and same_repository_head(q)]
    if len(matching)==1:
        return 'OPEN_PR_PARENT_#'+str(matching[0]['number'])
    if len(matching)>1:
        return 'AMBIGUOUS_BRANCH_PARENT_REVIEW'
    return 'NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW'


def pr_info(number):
    fields = 'number,title,state,isDraft,headRefName,headRefOid,baseRefName,mergedAt,url,files'
    return json.loads(cmd(['gh','pr','view',str(number),'--repo',REPO,'--json',fields]))



def verify_pr_identity_unchanged(number, recorded):
    """Fail closed if a PR is force-pushed or retargeted during patch collection."""
    current=pr_info(number)
    fields=('number','headRefOid','state','baseRefName')
    if not recorded.get('headRefOid') or any(
            current.get(field)!=recorded.get(field) for field in fields):
        raise RuntimeError('PR_IDENTITY_CHANGED_DURING_PATCH_FETCH:'+str(number))

def present_in_main(added, main):
    """Conservative: confirm every nonblank added line appears in main.

    This is NOT patch equivalence; matching additions alone must never
    authorize a PR close, merge, or Golden Task completion.
    """
    terms = [line for line in added if line.strip()]
    return bool(terms) and all(line in main.splitlines() for line in terms)


def added_lines(patch):
    return [line[1:] for line in patch.splitlines()
            if line.startswith('+') and not line.startswith('+++')]


def disposition(number, state, additions_present, merged_634):
    state = state.upper()
    if state == 'MERGED':
        return 'MERGED_HISTORY_NOT_TASK_CERTIFICATION'
    if state != 'OPEN':
        return 'CLOSED_NOT_MERGED_REVIEW'
    if number in DUPLICATE_CANDIDATES and merged_634 and additions_present:
        return 'SUPERSEDED_CANDIDATE_OWNER_REVIEW_REQUIRED'
    return 'OPEN_REVIEW_REQUIRED'


def main_health():
    response = api('repos/'+REPO+'/contents/.github/workflows/ci-health.yml?ref=main')
    if response.get('encoding') != 'base64':
        raise RuntimeError('MAIN_CONTENT_ENCODING_UNSUPPORTED')
    return base64.b64decode(response['content']).decode('utf-8')


def verify_task(repo_root):
    catalog = repo_root/'docs/_aiops/gtm/tasks.csv'
    with catalog.open(newline='',encoding='utf-8') as handle:
        rows = {r['TaskID']:r for r in csv.DictReader(handle)}
    task = rows.get('MYMI-GTM-009')
    if not task or task.get('Owner') != 'source-review':
        raise RuntimeError('CATALOG_TASK_SCOPE_UNAVAILABLE')
    return task


def make_report(repo_root):
    task = verify_task(repo_root)
    health = main_health()
    records = {number:pr_info(number) for number in PR_NUMBERS}
    open_records = all_open_prs()
    if any(int(records[n]['number'])!=n for n in PR_NUMBERS):
        raise RuntimeError('PULL_REQUEST_ID_MISMATCH')
    merged_634 = records[634]['state']=='MERGED'
    lines = [
        '# MYMI-GTM-009 — Pull-request and stacked-branch lineage',
        '',
        'Generated UTC: '+datetime.now(timezone.utc).isoformat(),
        'Repository: '+REPO,
        'Task acceptance: '+task['Acceptance'],
        '',
        '**Status: EVIDENCE GENERATED — OWNER REVIEW REQUIRED.**',
        'This report cannot certify the GTM task, close a PR, or authorize a merge.',
        '',
        '| PR | State | Head | Scope | Disposition |',
        '|---|---|---|---|---|',
    ]
    for n in PR_NUMBERS:
        record=records[n]
        patches=[]
        if n in DUPLICATE_CANDIDATES:
            verify_pr_identity_unchanged(n, record)
            files=api('repos/'+REPO+'/pulls/'+str(n)+'/files?per_page=100')
            verify_pr_identity_unchanged(n, record)
            if not isinstance(files,list) or len(files)!=1 or files[0].get('filename')!='.github/workflows/ci-health.yml':
                raise RuntimeError('REQUIRED_PATCH_SCOPE_CHANGED:'+str(n))
            patch=files[0].get('patch')
            if not isinstance(patch,str):
                raise RuntimeError('PATCH_UNAVAILABLE:'+str(n))
            patches=added_lines(patch)
        covered=present_in_main(patches, health) if patches else False
        state=record['state']
        mode=disposition(n,state,covered,merged_634)
        sha=record.get('headRefOid','')[:12]
        titles=[f['path'] for f in record.get('files',[]) if 'path' in f]
        scope=', '.join(titles[:2])+(f' (+{len(titles)-2})' if len(titles)>2 else '')
        lines.append(f'| [#{n}](https://github.com/{REPO}/pull/{n}) | {state} | `{sha}` | `{scope}` | {mode} |')
    lines += [
        '',
        '## Complete current open-PR inventory and stacked parents',
        '',
        'Open PR count from live GitHub: '+str(len(open_records)),
        '',
        '| PR | Base branch | Head branch | Stack assessment |',
        '|---|---|---|---|',
    ]
    for record in open_records:
        n=int(record['number'])
        lines.append(f'| [#{n}](https://github.com/{REPO}/pull/{n}) | '
                     f'`{record.get("baseRefName", "")}` | '
                     f'`{record.get("headRefName", "")}` | '
                     f'{stacked_parent(record, open_records)} |')
    lines += [
        '',
        '## Evidence interpretation',
        '',
        '- PRs #630, #632, #634, #637 are assessed from live GitHub state, not inferred from worktree names.',
        '- For #629, #631, #633, matching added lines in current main is **only a supersession candidate**; it is not proof of complete patch equivalence.',
        '- PR #623 remains OPEN_REVIEW_REQUIRED until the current diff is compared with #637; filename overlap alone is not patch equivalence.',
        '- Nonmain PR bases are flagged, including stacked parents that are not themselves open PRs; confirm ancestry manually before rebases.',
        '- Do not merge or close open PRs without named owner review. Do not equate merged changes with whole-task acceptance.',
        '',
        '## Targeted acceptance cases',
        '',
        '- Positive: merged-PR records retain exact number/state/head; no merged record is silently marked task-complete.',
        '- Negative: missing file patches and unexpected changed-file scope fail closed.',
        '- Authorization: tool operates read-only; closes, approvals, and deployments are outside the command surface.',
        '- Failure: GitHub request failures or missing task catalog stop the report instead of emitting success.',
        '',
        '## Owner-gated follow-up',
        '',
        '1. Confirm merged PR code against GTM-004 and GTM-005 acceptance requirements and CI results.',
        '2. Examine #623 independently; preserve nonduplicated changes as atomic successors if needed.',
        '3. Review #629/#631/#633 for closure as superseded; owner decides, tool does not close.',
        '4. Assess every other open PR and stacked-branch ancestry shown in the full inventory above before certifying GTM-009.',
        '',
        '## Rollback and risks',
        '',
        '- No production changes. No GitHub mutations. Feature-branch reports can be reverted through an owner-reviewed PR.',
        '- Live data can change after report generation; recheck GitHub before owner actions.',
        '- Matching added lines may occur outside intended stanza; inspect actual diffs before classifying closure.',
        '',
    ]
    return '\n'.join(lines)


def main():
    parser=argparse.ArgumentParser()
    parser.add_argument('--repo-root',required=True)
    parser.add_argument('--out',required=True)
    args=parser.parse_args()
    root=Path(args.repo_root).resolve()
    out=Path(args.out)
    allowed=root/'docs/_aiops/gtm/evidence/MYMI-GTM-009_PR_LINEAGE_RECONCILIATION.md'
    if out.resolve()!=allowed:
        raise SystemExit('STOP=OUTSIDE_APPROVED_EVIDENCE_PATH')
    if out.is_symlink():
        raise SystemExit('STOP=REPORT_SYMLINK')
    report=make_report(root)
    out.write_text(report,encoding='utf-8')
    print('STATUS=EVIDENCE_READY_OWNER_REVIEW_REQUIRED')
    print('REPORT='+str(out))


if __name__=='__main__':
    main()
