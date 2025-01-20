<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSortOrderToFormFields extends Migration
{
    public function up()
    {
        // Add sort_order column to form_fields table
        $this->forge->addColumn('form_fields', [
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 0,
                'after' => 'required'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('form_fields', 'sort_order');
    }
}
