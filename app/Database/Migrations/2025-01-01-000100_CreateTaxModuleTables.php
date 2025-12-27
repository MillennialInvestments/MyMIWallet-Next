<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration for tax configuration, user filings, and auditing.
 */
class CreateTaxModuleTables extends Migration
{
    public function up(): void
    {
        // Jurisdictions
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'state'       => ['type' => 'VARCHAR', 'constraint' => 2, 'default' => 'LA'],
            'parish'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'code'        => ['type' => 'VARCHAR', 'constraint' => 10],
            'active'      => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_tax_jurisdictions', true);

        // Rates
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'jurisdiction_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'rate_total'       => ['type' => 'DECIMAL', 'constraint' => '7,4'],
            'rate_components'  => ['type' => 'JSON', 'null' => true],
            'effective_start'  => ['type' => 'DATE'],
            'effective_end'    => ['type' => 'DATE', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('jurisdiction_id', 'bf_tax_jurisdictions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_tax_rates', true);

        // Return templates
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'authority'  => ['type' => 'VARCHAR', 'constraint' => 150],
            'frequency'  => ['type' => 'ENUM', 'constraint' => ['monthly', 'quarterly', 'annual']],
            'notes'      => ['type' => 'TEXT', 'null' => true],
            'active'     => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_tax_return_templates', true);

        // Return lines
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'template_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'line_number'     => ['type' => 'INT', 'constraint' => 11],
            'label'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'type'            => ['type' => 'ENUM', 'constraint' => ['input', 'calc', 'info']],
            'calc_rule'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'requires_explain'=> ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order'      => ['type' => 'INT', 'constraint' => 11],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('template_id', 'bf_tax_return_templates', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_tax_return_lines', true);

        // User returns
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'template_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'filing_period_start'=> ['type' => 'DATE'],
            'filing_period_end'  => ['type' => 'DATE'],
            'due_date'           => ['type' => 'DATE'],
            'file_date'          => ['type' => 'DATE', 'null' => true],
            'status'             => ['type' => 'ENUM', 'constraint' => ['draft', 'ready', 'filed', 'paid', 'delinquent', 'void'], 'default' => 'draft'],
            'total_remitted'     => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => '0.00'],
            'notes'              => ['type' => 'TEXT', 'null' => true],
            'created_at'         => ['type' => 'DATETIME', 'null' => true],
            'updated_at'         => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('template_id', 'bf_tax_return_templates', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_user_tax_returns', true);

        // User return values
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'return_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'line_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'amount'      => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => '0.00'],
            'explain_text'=> ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('return_id', 'bf_user_tax_returns', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('line_id', 'bf_tax_return_lines', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_user_tax_return_values', true);

        // User return jurisdiction allocations
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'return_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'jurisdiction_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'taxable_amount'   => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => '0.00'],
            'tax_due'          => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => '0.00'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('return_id', 'bf_user_tax_returns', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jurisdiction_id', 'bf_tax_jurisdictions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_user_tax_return_jurisdictions', true);

        // Audit log
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'action'      => ['type' => 'VARCHAR', 'constraint' => 50],
            'entity_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'entity_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'before_json' => ['type' => 'LONGTEXT', 'null' => true],
            'after_json'  => ['type' => 'LONGTEXT', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_tax_audit_log', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_tax_audit_log', true);
        $this->forge->dropTable('bf_user_tax_return_jurisdictions', true);
        $this->forge->dropTable('bf_user_tax_return_values', true);
        $this->forge->dropTable('bf_user_tax_returns', true);
        $this->forge->dropTable('bf_tax_return_lines', true);
        $this->forge->dropTable('bf_tax_return_templates', true);
        $this->forge->dropTable('bf_tax_rates', true);
        $this->forge->dropTable('bf_tax_jurisdictions', true);
    }
}
