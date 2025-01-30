<?php

namespace App\Controllers;

class FormBuilder extends BaseController
{
    protected $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getComponents($id_pelayanan)
    {
        try {
            $builder = $this->db->table('form_components');
            $builder->where('route', $id_pelayanan); // Menggunakan route sebagai identifier
            $builder->orderBy('sort_order', 'ASC');
            
            $components = $builder->get()->getResultArray();
            
            return $this->response->setJSON([
                'success' => true,
                'components' => $components
            ]);
            
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function createTable()
    {
        $tableName = $this->request->getPost('table_name');
        $idPelayanan = $this->request->getPost('id_pelayanan');

        if (empty($tableName) || empty($idPelayanan)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Table name and ID Pelayanan are required'
            ])->setStatusCode(400);
        }

        try {
            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'id_pelayanan' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ]
            ];

            // Fetch form fields for the given pelayanan
            $formFields = $this->db->table('form_fields')
                ->where('id_pelayanan', $idPelayanan)
                ->get()
                ->getResultArray();

            foreach ($formFields as $field) {
                $fields[$field['label']] = $this->getFieldType($field['field_type']);
            }

            $forge = \Config\Database::forge();
            $forge->addField($fields);
            $forge->addKey('id', true);
            $forge->createTable($tableName, true);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Table created successfully'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function getFormFields($id_pelayanan)
    {
        try {
            $formFields = $this->db->table('form_fields')
                ->where('id_pelayanan', $id_pelayanan)
                ->get()
                ->getResultArray();

            return $this->response->setJSON([
                'status' => 'success',
                'formFields' => $formFields
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    private function getFieldType($type)
    {
        switch ($type) {
            case 'text':
            case 'email':
            case 'textarea':
                return ['type' => 'VARCHAR', 'constraint' => '255'];
            case 'number':
                return ['type' => 'INT', 'constraint' => '11'];
            case 'date':
                return ['type' => 'DATE'];
            case 'file':
                return ['type' => 'VARCHAR', 'constraint' => '255'];
            case 'select':
                return ['type' => 'VARCHAR', 'constraint' => '255'];
            default:
                return ['type' => 'VARCHAR', 'constraint' => '255'];
        }
    }
}
