#!/usr/bin/env python3
"""GTM-009 offline positive, negative, authorization and failure checks."""
import importlib.util
import sys
import unittest
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
        self.assertIn('OWNER_REVIEW_REQUIRED',lineage.disposition(623,'OPEN',False,True))
        self.assertEqual(lineage.disposition(623,'CLOSED',False,True),
                         'CLOSED_NOT_MERGED_REVIEW')

    def test_failure_unavailable_gh_fails_closed(self):
        with self.assertRaises((FileNotFoundError,RuntimeError)):
            lineage.cmd(['__definitely_missing_gh__'])

    def test_stacked_parent_recognized(self):
        parent={'number':7,'headRefName':'feature/base'}
        child={'number':8,'baseRefName':'feature/base'}
        self.assertEqual(lineage.stacked_parent(child,[parent,child]),'OPEN_PR_PARENT_#7')

    def test_nonmain_parent_needs_review(self):
        self.assertEqual(lineage.stacked_parent({'baseRefName':'other'},[]),
                         'NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW')

    def test_patch_excludes_header(self):
        self.assertEqual(lineage.added_lines('+++ b/file\n+one\n-old\n+two'),['one','two'])


if __name__=='__main__':
    unittest.main()
