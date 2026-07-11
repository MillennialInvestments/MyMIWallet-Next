<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

final class CreateMarketingIngressTables extends Migration
{
    public function up()
    {
        if (
            ! $this->db->tableExists(
                'bf_marketing_zapier_ingress'
            )
        ) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'source' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'idempotency_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 191,
                ],
                'request_hash' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'raw_payload_hash' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'payload_json' => [
                    'type' => 'LONGTEXT',
                ],
                'received_at' => [
                    'type' => 'DATETIME',
                ],
                'processed_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'accepted',
                ],
                'notes' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
            ]);

            $this->forge->addKey('id', true);

            $this->forge->addKey(
                ['source', 'idempotency_key'],
                false,
                true,
                'uq_mkt_zapier_ingress_source_idem'
            );

            $this->forge->addKey(
                'request_hash',
                false,
                false,
                'idx_mkt_zapier_ingress_request_hash'
            );

            $this->forge->addKey(
                'raw_payload_hash',
                false,
                false,
                'idx_mkt_zapier_ingress_raw_hash'
            );

            $this->forge->addKey(
                'status',
                false,
                false,
                'idx_mkt_zapier_ingress_status'
            );

            $this->forge->addKey(
                'received_at',
                false,
                false,
                'idx_mkt_zapier_ingress_received'
            );

            $this->forge->createTable(
                'bf_marketing_zapier_ingress',
                true
            );
        }

        if (
            ! $this->db->tableExists(
                'bf_marketing_zapier_ingress_idempotency'
            )
        ) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'key_hash' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'request_hash' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'status_code' => [
                    'type'       => 'SMALLINT',
                    'constraint' => 5,
                    'unsigned'   => true,
                    'null'       => true,
                ],
                'response_json' => [
                    'type' => 'LONGTEXT',
                    'null' => true,
                ],
                'state' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                    'default'    => 'processing',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                ],
                'expires_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);

            $this->forge->addKey('id', true);

            $this->forge->addKey(
                'key_hash',
                false,
                true,
                'uq_mkt_zapier_ingress_key_hash'
            );

            $this->forge->addKey(
                'state',
                false,
                false,
                'idx_mkt_zapier_ingress_idem_state'
            );

            $this->forge->addKey(
                'expires_at',
                false,
                false,
                'idx_mkt_zapier_ingress_idem_expires'
            );

            $this->forge->createTable(
                'bf_marketing_zapier_ingress_idempotency',
                true
            );
        }
    }

    public function down()
    {
        // Forward-only safety policy.
        // Disable the feature flag to contain the endpoint.
        // Preserve ingress audit and idempotency records.
    }
}
