<?php

use CodeIgniter\Database\Migration;

class CreateFormBuilderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'label' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'field_type' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'required' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0,
            ],
            'sort_order' => [
                'type' => 'INT',
                'unsigned' => true,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('form_builder');
    }

    public function down()
    {
        $this->forge->dropTable('form_builder');
    }
}