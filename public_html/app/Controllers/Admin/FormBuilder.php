<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FormField;
use CodeIgniter\Database\Migration;
use Config\Services;

class FormBuilder extends BaseController
{
    public function generateMigration()
    {
        $tableName = $this->request->getPost('tableName');
        $id_pelayanan = $this->request->getPost('id_pelayanan');

        if (!$tableName || !$id_pelayanan) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Table name and id_pelayanan are required']);
        }

        $formFieldModel = new FormField();
        $fields = $formFieldModel->where('id_pelayanan', $id_pelayanan)->findAll();

        if (empty($fields)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No fields found for this pelayanan']);
        }

        $migrationTemplate = "<?php\n\nnamespace App\Database\Migrations;\n\nuse CodeIgniter\Database\Migration;\n\n";
        $migrationTemplate .= "class Create" . ucfirst($tableName) . "Table extends Migration\n{\n";
        $migrationTemplate .= "    public function up()\n    {\n";
        $migrationTemplate .= "        \$this->forge->addField([\n";
        $migrationTemplate .= "            'id' => [\n";
        $migrationTemplate .= "                'type'           => 'INT',\n";
        $migrationTemplate .= "                'constraint'     => 11,\n";
        $migrationTemplate .= "                'unsigned'       => true,\n";
        $migrationTemplate .= "                'auto_increment' => true,\n";
        $migrationTemplate .= "            ],\n";
        $migrationTemplate .= "            'tiket_id' => [\n";
        $migrationTemplate .= "                'type'       => 'INT',\n";
        $migrationTemplate .= "                'constraint' => 11,\n";
        $migrationTemplate .= "                'unsigned'   => true,\n";
        $migrationTemplate .= "                'null'       => false,\n";
        $migrationTemplate .= "            ],\n";

        foreach ($fields as $field) {
            $fieldName = strtolower(str_replace(' ', '_', $field['label']));
            $fieldType = strtoupper($field['type']);
            if ($fieldType === 'TEXTAREA') $fieldType = 'TEXT';
            if ($fieldType === 'NUMBER') $fieldType = 'INT';

            $migrationTemplate .= "            '$fieldName' => [\n";
            $migrationTemplate .= "                'type'       => '$fieldType',\n";
            if ($fieldType !== 'TEXT') {
                $migrationTemplate .= "                'constraint' => 255,\n";
            }
            $migrationTemplate .= "                'null'       => " . ($field['required'] ? 'false' : 'true') . ",\n";
            $migrationTemplate .= "            ],\n";
        }

        $migrationTemplate .= "        ]);\n";
        $migrationTemplate .= "        \$this->forge->addKey('id', true);\n";
        $migrationTemplate .= "        \$this->forge->addForeignKey('tiket_id', 'tb_tiket', 'id', 'CASCADE', 'CASCADE');\n";
        $migrationTemplate .= "        \$this->forge->createTable('$tableName');\n";
        $migrationTemplate .= "    }\n\n";
        $migrationTemplate .= "    public function down()\n    {\n";
        $migrationTemplate .= "        \$this->forge->dropTable('$tableName');\n";
        $migrationTemplate .= "    }\n";
        $migrationTemplate .= "}\n";

        // Simpan file migrasi
        $fileName = date('YmdHis') . '_create_' . $tableName . '_table.php';
        $filePath = APPPATH . 'Database/Migrations/' . $fileName;

        if (file_put_contents($filePath, $migrationTemplate)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Migration file created successfully', 'file' => $fileName]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to create migration file']);
        }
    }

    public function runMigration()
    {
        $migrate = Services::migrations();
        
        try {
            $migrate->latest();
            return $this->response->setJSON(['status' => 'success', 'message' => 'Migration executed successfully']);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
