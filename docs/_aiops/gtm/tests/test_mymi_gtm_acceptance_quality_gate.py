"""Synthetic regression tests for MyMI acceptance design gate; no real secrets."""
import csv
import hashlib
import json
import sys
import tempfile
import unittest
from pathlib import Path

HERE = Path(__file__).resolve().parent
sys.path.insert(0, str(HERE.parent / 'scripts'))
import mymi_gtm_acceptance_quality_gate as gate

FIELDS = ['TaskID', 'Title', 'Acceptance', 'Dependencies', 'Owner']


def entry(task):
    if task == 'MYMI-GTM-001':
        base = ('Verify exposed credentials are revoked and rotated with redacted owner evidence '
                'before any login, token, or service integration succeeds, and assert invalid reuse is blocked.')
        return {
            'task_id': task,
            'positive': base,
            'negative': base.replace('Verify', 'Reject'),
            'authorization': base.replace('Verify', 'Assert'),
            'integration': base.replace('Verify', 'Check'),
            'failure': base.replace('Verify', 'Confirm'),
            'external_gate': ('Security owner approval pending; externally verified redacted evidence '
                              'for OpenAI API, database, basic auth, webhook, health service credentials; '
                              'revoke or rotate all tokens before certifying.'),
        }
    base = ('Verify configuration files chat/.env and .gitignore block tracked secrets '
            'and fail closed when required runtime configuration is missing; assert security approval.')
    return {
        'task_id': task,
        'positive': base,
        'negative': base.replace('Verify', 'Reject'),
        'authorization': base.replace('Verify', 'Assert'),
        'integration': base.replace('Verify', 'Check'),
        'failure': base.replace('Verify', 'Confirm'),
        'external_gate': ('Security owner approval pending, with verified evidence of MYMI-GTM-001 '
                          'completion and configuration redaction before further acceptance.'),
    }


class QualityGateTest(unittest.TestCase):
    def setUp(self):
        self.temp = tempfile.TemporaryDirectory()
        self.addCleanup(self.temp.cleanup)
        self.root = Path(self.temp.name)
        self.catalog = self.root / 'tasks.csv'
        self.candidate = self.root / 'tests.json'
        self.evidence_dir = self.root / 'evidence'
        self.evidence_dir.mkdir()
        rows = [
            ['MYMI-GTM-001', 'Contain exposed tracked credentials',
             'Owners rotate and revoke exposed credentials with redacted evidence', '',
             'human-external-mutation'],
            ['MYMI-GTM-002', 'Replace tracked runtime configuration with a safe contract',
             'Handle missing configuration and ownership authorization', 'MYMI-GTM-001',
             'security-owner'],
        ]
        with self.catalog.open('w', newline='') as f:
            w = csv.writer(f)
            w.writerow(FIELDS)
            w.writerows(rows)
        self.entries = [entry('MYMI-GTM-001'), entry('MYMI-GTM-002')]
        self.save()

    def save(self):
        self.candidate.write_text(json.dumps({'task_tests': self.entries}))

    def run_gate(self, *extra):
        return gate.main(['--catalog', str(self.catalog), '--candidate', str(self.candidate),
                          '--task-id', 'MYMI-GTM-001', '--task-id', 'MYMI-GTM-002', *extra])

    def test_valid_design_is_not_completion(self):
        self.assertEqual(self.run_gate(), 0)

    def test_duplicate_task_id_rejected(self):
        self.entries[1]['task_id'] = 'MYMI-GTM-001'
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_nonstring_task_id_rejected(self):
        self.entries[0]['task_id'] = ['MYMI-GTM-001']
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_missing_task_id_rejected(self):
        self.entries.pop()
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_generic_unassertive_test_rejected(self):
        self.entries[0]['positive'] = 'Looks good.'
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_missing_owner_rotation_category_rejected(self):
        self.entries[0]['external_gate'] = self.entries[0]['external_gate'].replace('webhook', 'unrelated')
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_missing_dependency_reference_rejected(self):
        self.entries[1]['external_gate'] = self.entries[1]['external_gate'].replace('MYMI-GTM-001', 'previous work')
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_missing_gitignore_requirement_rejected(self):
        self.entries[1]['positive'] = self.entries[1]['positive'].replace('.gitignore', 'some files')
        self.entries[1]['negative'] = self.entries[1]['negative'].replace('.gitignore', 'some files')
        self.entries[1]['authorization'] = self.entries[1]['authorization'].replace('.gitignore', 'some files')
        self.entries[1]['integration'] = self.entries[1]['integration'].replace('.gitignore', 'some files')
        self.entries[1]['failure'] = self.entries[1]['failure'].replace('.gitignore', 'some files')
        self.save()
        self.assertEqual(self.run_gate(), 2)

    def test_mutated_artifact_hash_rejected(self):
        self.assertEqual(self.run_gate('--candidate-sha256', '0' * 64), 2)

    def test_external_evidence_required_for_review(self):
        self.assertEqual(self.run_gate('--mode', 'evidence-review'), 2)

    def test_external_evidence_forged_status_rejected(self):
        record = self.attestation('owner-approval.txt', 'verified')
        record['status'] = 'pending'
        evidence = {'tasks': {
            'MYMI-GTM-001': {
                'owner_approval': record,
                'credential_rotations': {key: self.attestation(key + '.txt', 'verified')
                                         for key in gate.CREDENTIALS},
                'dependency_verified': True,
            },
            'MYMI-GTM-002': {'owner_approval': self.attestation('two.txt', 'verified')},
        }}
        path = self.root / 'owner-evidence.json'
        path.write_text(json.dumps(evidence))
        self.assertEqual(self.run_gate('--mode', 'evidence-review', '--evidence', str(path),
                                      '--evidence-root', str(self.evidence_dir)), 2)

    def test_hash_tamper_rejected(self):
        e = self.valid_owner_evidence()
        e['tasks']['MYMI-GTM-001']['credential_rotations']['webhook']['sha256'] = '0' * 64
        path = self.root / 'owner-evidence.json'
        path.write_text(json.dumps(e))
        self.assertEqual(self.run_gate('--mode', 'evidence-review', '--evidence', str(path),
                                      '--evidence-root', str(self.evidence_dir)), 2)

    def attestation(self, name, status):
        content = 'synthetic redacted approval data\n'.encode()
        (self.evidence_dir / name).write_bytes(content)
        return {'status': status, 'redacted': True, 'owner': 'fixture-reviewer',
                'verified_at': '2026-10-19T15:00:00+00:00', 'path': name,
                'sha256': hashlib.sha256(content).hexdigest()}

    def valid_owner_evidence(self):
        return {'tasks': {
            'MYMI-GTM-001': {
                'owner_approval': self.attestation('owner-one.txt', 'verified'),
                'credential_rotations': {key: self.attestation(key + '.txt', 'verified')
                                         for key in gate.CREDENTIALS},
                'dependency_verified': True,
            },
            'MYMI-GTM-002': {
                'owner_approval': self.attestation('owner-two.txt', 'verified'),
            },
        }}

    def test_synthetic_attestation_packet_is_admissible_not_completed(self):
        path = self.root / 'owner-evidence.json'
        path.write_text(json.dumps(self.valid_owner_evidence()))
        self.assertEqual(self.run_gate('--mode', 'evidence-review', '--evidence', str(path),
                                      '--evidence-root', str(self.evidence_dir)), 0)

    def test_symlink_attestation_rejected(self):
        e = self.valid_owner_evidence()
        (self.evidence_dir / 'webhook.txt').unlink()
        (self.evidence_dir / 'webhook.txt').symlink_to(self.evidence_dir / 'database.txt')
        path = self.root / 'owner-evidence.json'
        path.write_text(json.dumps(e))
        self.assertEqual(self.run_gate('--mode', 'evidence-review', '--evidence', str(path),
                                      '--evidence-root', str(self.evidence_dir)), 2)


if __name__ == '__main__':
    unittest.main()
