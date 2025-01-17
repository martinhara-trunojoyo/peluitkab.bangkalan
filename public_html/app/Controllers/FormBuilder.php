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
}
