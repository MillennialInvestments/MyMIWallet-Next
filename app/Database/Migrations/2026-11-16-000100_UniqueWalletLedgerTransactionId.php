<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * GTM-032: WalletBalanceService derives transaction_id from the request id so
 * a repeated submission is applied once. Its "already recorded?" check and
 * the insert run in one DB transaction, but two concurrent requests could
 * both pass the check. A unique index makes the second insert fail, which
 * rolls back its balance change.
 *
 * Safe to run on prod with scripts/ops/db/run-migrations.php:
 * - does nothing if the ledger table or column is missing, or the index exists;
 * - refuses (logs, changes nothing) if duplicate transaction_ids already exist,
 *   so they can be reviewed first with the query in the log line.
 */
class UniqueWalletLedgerTransactionId extends Migration
{
    private const TABLE = 'bf_users_wallet_transactions';
    private const INDEX = 'uq_wallet_tx_transaction_id';

    public function up()
    {
        if (! $this->db->tableExists(self::TABLE) || ! $this->db->fieldExists('transaction_id', self::TABLE)) {
            log_message('notice', 'UniqueWalletLedgerTransactionId: ledger table or column missing, nothing to do.');

            return;
        }

        if ($this->indexExists()) {
            return;
        }

        $dupes = $this->db->query(
            'SELECT COUNT(*) AS n FROM (SELECT transaction_id FROM ' . $this->db->escapeIdentifiers(self::TABLE)
            . " WHERE transaction_id IS NOT NULL AND transaction_id <> '' GROUP BY transaction_id HAVING COUNT(*) > 1) d"
        )->getRowArray();

        if ((int) ($dupes['n'] ?? 0) > 0) {
            log_message('error', 'UniqueWalletLedgerTransactionId: {n} duplicate transaction_id values exist; index NOT added. Review with: SELECT transaction_id, COUNT(*) FROM ' . self::TABLE . ' GROUP BY transaction_id HAVING COUNT(*) > 1', [
                'n' => (int) $dupes['n'],
            ]);

            return;
        }

        $length = $this->isTextColumn() ? '(191)' : '';
        $this->db->query(
            'ALTER TABLE ' . $this->db->escapeIdentifiers(self::TABLE)
            . ' ADD UNIQUE INDEX ' . $this->db->escapeIdentifiers(self::INDEX)
            . ' (' . $this->db->escapeIdentifiers('transaction_id') . $length . ')'
        );
    }

    public function down()
    {
        if ($this->db->tableExists(self::TABLE) && $this->indexExists()) {
            $this->db->query('ALTER TABLE ' . $this->db->escapeIdentifiers(self::TABLE) . ' DROP INDEX ' . $this->db->escapeIdentifiers(self::INDEX));
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

    private function isTextColumn(): bool
    {
        foreach ($this->db->getFieldData(self::TABLE) as $field) {
            if ($field->name === 'transaction_id') {
                return str_contains(strtolower((string) $field->type), 'text') || str_contains(strtolower((string) $field->type), 'blob');
            }
        }

        return false;
    }
}
