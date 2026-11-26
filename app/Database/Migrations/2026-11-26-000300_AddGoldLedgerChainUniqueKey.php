<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * MYMI-XCHAIN-001 review fix: each MyMI Gold ledger entry builds on the
 * user's latest entry (balance_after and prev_hash). Two concurrent spends
 * could both read the same latest entry and both be written, spending the
 * same balance twice. A unique (user_id, prev_hash) key lets only one entry
 * follow any given entry; the other insert fails and nothing is written.
 *
 * - does nothing if the table is missing or the index exists;
 * - refuses (logs, changes nothing) if a fork already exists, so it can be
 *   reviewed first with the query in the log line.
 */
class AddGoldLedgerChainUniqueKey extends Migration
{
    private const TABLE = 'bf_gold_ledger';
    private const INDEX = 'uq_gold_ledger_user_prev_hash';

    public function up()
    {
        if (! $this->db->tableExists(self::TABLE) || ! $this->db->fieldExists('prev_hash', self::TABLE)) {
            log_message('notice', 'AddGoldLedgerChainUniqueKey: table or column missing, nothing to do.');

            return;
        }

        if ($this->indexExists()) {
            return;
        }

        $table = $this->db->escapeIdentifiers($this->db->prefixTable(self::TABLE));
        $forks = $this->db->query(
            'SELECT COUNT(*) AS n FROM (SELECT user_id, prev_hash FROM ' . $table
            . ' GROUP BY user_id, prev_hash HAVING COUNT(*) > 1) d'
        )->getRowArray();

        if ((int) ($forks['n'] ?? 0) > 0) {
            log_message('error', 'AddGoldLedgerChainUniqueKey: {n} forked ledger chains exist; index NOT added. Review with: SELECT user_id, prev_hash, COUNT(*) FROM ' . self::TABLE . ' GROUP BY user_id, prev_hash HAVING COUNT(*) > 1', [
                'n' => (int) $forks['n'],
            ]);

            return;
        }

        $this->db->query(
            'CREATE UNIQUE INDEX ' . $this->db->escapeIdentifiers(self::INDEX) . ' ON ' . $table
            . ' (' . $this->db->escapeIdentifiers('user_id') . ', ' . $this->db->escapeIdentifiers('prev_hash') . ')'
        );
    }

    public function down()
    {
        if ($this->db->tableExists(self::TABLE) && $this->indexExists()) {
            $this->db->query('DROP INDEX ' . $this->db->escapeIdentifiers(self::INDEX) . ' ON ' . $this->db->escapeIdentifiers($this->db->prefixTable(self::TABLE)));
        }
    }

    private function indexExists(): bool
    {
        foreach ($this->db->getIndexData(self::TABLE) as $index) {
            if (($index->name ?? '') === self::INDEX) {
                return true;
            }
        }

        return false;
    }
}
