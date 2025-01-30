<?php

namespace App\Controllers;

class Pelayanan extends BaseController
{
    protected $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // ...existing code...

    public function getPelayananWithForm()
    {
        try {
            $pelayanan = $this->db->table('pelayanan')
                ->select('pelayanan.*')
                ->join('form_fields', 'form_fields.id_pelayanan = pelayanan.id_pelayanan', 'inner')
                ->groupBy('pelayanan.id_pelayanan')
                ->get()
                ->getResultArray();

            return $this->response->setJSON($pelayanan);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    // ...existing code...
}
