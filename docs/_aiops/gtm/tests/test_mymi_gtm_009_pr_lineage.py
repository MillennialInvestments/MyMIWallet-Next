#!/usr/bin/env python3
"""GTM-009 offline positive, negative, authorization and failure checks."""
import importlib.util
import sys
import unittest
from unittest import mock
from pathlib import Path

MODULE=Path(__file__).resolve().parents[1]/'scripts/mymi_gtm_009_pr_lineage.py'
spec=importlib.util.spec_from_file_location('lineage',MODULE)
lineage=importlib.util.module_from_spec(spec)
spec.loader.exec_module(lineage)


class GTM009Tests(unittest.TestCase):
    def test_positive_merged_is_not_task_certification(self):
        self.assertEqual(lineage.disposition(634,'MERGED',False,True),
                         'MERGED_HISTORY_NOT_TASK_CERTIFICATION')

    def test_positive_superseded_candidate_requires_owner(self):
        self.assertEqual(lineage.disposition(631,'OPEN',True,True),
                         'SUPERSEDED_CANDIDATE_OWNER_REVIEW_REQUIRED')

    def test_negative_no_missing_patch_proof(self):
        self.assertEqual(lineage.disposition(631,'OPEN',False,True),
                         'OPEN_REVIEW_REQUIRED')
        self.assertFalse(lineage.present_in_main([],''))

    def test_negative_additions_not_in_main(self):
        self.assertFalse(lineage.present_in_main(['unique added value'],'other'))

    def test_authorization_open_never_auto_merged(self):
        self.assertEqual(lineage.disposition(623,'OPEN',False,True),
                         'OPEN_REVIEW_REQUIRED')
        self.assertEqual(lineage.disposition(623,'CLOSED',False,True),
                         'CLOSED_NOT_MERGED_REVIEW')

    def test_failure_unavailable_gh_fails_closed(self):
        with self.assertRaises((FileNotFoundError,RuntimeError)):
            lineage.cmd(['__definitely_missing_gh__'])

    def test_stacked_parent_recognized(self):
        parent={'number':7,'headRefName':'feature/base',
                'headRepository':{'name':'MyMIWallet-Next'},
                'headRepositoryOwner':{'login':'MillennialInvestments'}}
        child={'number':8,'baseRefName':'feature/base'}
        self.assertEqual(lineage.stacked_parent(child,[parent,child]),'OPEN_PR_PARENT_#7')

    def test_nonmain_parent_needs_review(self):
        self.assertEqual(lineage.stacked_parent({'baseRefName':'other'},[]),
                         'NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW')

    def test_fork_same_name_does_not_claim_parent(self):
        fork={'number':7,'headRefName':'feature/base',
              'headRepository':{'name':'MyMIWallet-Next'},
              'headRepositoryOwner':{'login':'UnrelatedForkOwner'}}
        child={'number':8,'baseRefName':'feature/base'}
        self.assertEqual(lineage.stacked_parent(child,[fork,child]),
                         'NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW')

    def test_missing_head_repository_fails_closed(self):
        parent={'number':7,'headRefName':'feature/base'}
        child={'number':8,'baseRefName':'feature/base'}
        self.assertEqual(lineage.stacked_parent(child,[parent,child]),
                         'NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW')

    def test_verified_parent_not_confused_by_fork_same_name(self):
        correct={'number':7,'headRefName':'feature/base',
                 'headRepository':{'nameWithOwner':'MillennialInvestments/MyMIWallet-Next'}}
        fork={'number':6,'headRefName':'feature/base',
              'headRepository':{'nameWithOwner':'Other/Repo'}}
        child={'number':8,'baseRefName':'feature/base'}
        self.assertEqual(lineage.stacked_parent(child,[correct,fork,child]),
                         'OPEN_PR_PARENT_#7')

    def test_623_never_claims_unproven_overlap(self):
        self.assertEqual(lineage.disposition(623,'OPEN',False,True),
                         'OPEN_REVIEW_REQUIRED')

    def test_pr_head_changed_during_patch_fetch_fails_closed(self):
        recorded={'number':629,'headRefOid':'a'*40,
                  'state':'OPEN','baseRefName':'main'}
        changed=dict(recorded,headRefOid='b'*40)
        with mock.patch.object(lineage,'pr_info',return_value=changed):
            with self.assertRaisesRegex(RuntimeError,
                                        'PR_IDENTITY_CHANGED_DURING_PATCH_FETCH:629'):
                lineage.verify_pr_identity_unchanged(629,recorded)

    def test_pr_base_branch_changed_during_patch_fetch_fails_closed(self):
        recorded={'number':631,'headRefOid':'a'*40,
                  'state':'OPEN','baseRefName':'main'}
        changed=dict(recorded,baseRefName='feature/other')
        with mock.patch.object(lineage,'pr_info',return_value=changed):
            with self.assertRaisesRegex(RuntimeError,
                                        'PR_IDENTITY_CHANGED_DURING_PATCH_FETCH:631'):
                lineage.verify_pr_identity_unchanged(631,recorded)

    def test_pr_identity_stable_passes(self):
        recorded={'number':633,'headRefOid':'a'*40,
                  'state':'OPEN','baseRefName':'main'}
        with mock.patch.object(lineage,'pr_info',return_value=dict(recorded)) as query:
            lineage.verify_pr_identity_unchanged(633,recorded)
            query.assert_called_once_with(633)

    def test_patch_excludes_header(self):
        self.assertEqual(lineage.added_lines('+++ b/file\n+one\n-old\n+two'),['one','two'])


if __name__=='__main__':
    unittest.main()
