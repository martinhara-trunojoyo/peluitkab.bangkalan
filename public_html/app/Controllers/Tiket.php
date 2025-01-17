<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Tiket extends BaseController
{
    protected $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function save()
    {
        try {
            // Log untuk debugging
            log_message('debug', 'Tiket save method called');
            log_message('debug', 'POST data: ' . json_encode($this->request->getPost()));
            log_message('debug', 'Files: ' . json_encode($this->request->getFiles()));

            // Validasi input
            $pelayanan = $this->request->getPost('pelayanan');
            if (!$pelayanan) {
                throw new \Exception('Pelayanan harus dipilih');
            }

            // Generate kode tiket
            $kode_tiket = $this->generate_ticket_code($pelayanan);

            // Siapkan data untuk disimpan
            $data = [
                'kode_tiket' => $kode_tiket,
                'route' => $pelayanan,
                'id_user' => session()->get('id_user'),
                'tgl_input' => date('Y-m-d H:i:s'),
                'status' => 0 // status proses
            ];

            // Simpan tiket
            $this->db->table('tiket')->insert($data);
            $id_tiket = $this->db->insertID();

            // Simpan detail tiket
            $components = $this->getFormComponents($pelayanan);
            foreach ($components as $component) {
                $field_name = $component['name'];
                $field_value = '';

                // Handle file upload
                if ($component['type'] === 'file') {
                    $file = $this->request->getFile($field_name);
                    if ($file && $file->isValid()) {
                        $newName = $file->getRandomName();
                        $file->move(WRITEPATH . 'uploads', $newName);
                        $field_value = $newName;
                    }
                } else {
                    $field_value = $this->request->getPost($field_name);
                }

                // Simpan nilai field
                $this->db->table('tiket_detail')->insert([
                    'id_tiket' => $id_tiket,
                    'field_name' => $field_name,
                    'field_value' => $field_value
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'kode_tiket' => $kode_tiket,
                'message' => 'Tiket berhasil disimpan'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error saving ticket: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function generate_ticket_code($route)
    {
        // Get current year and month
        $year = date('Y');
        $month = date('m');
        
        // Get counter
        $result = $this->db->query("
            SELECT COUNT(*) as counter 
            FROM tiket 
            WHERE YEAR(tgl_input) = ? 
            AND MONTH(tgl_input) = ?
            AND route = ?
        ", [$year, $month, $route])->getRow();
        
        $counter = str_pad($result->counter + 1, 4, '0', STR_PAD_LEFT);
        
        // Format: ROUTE-YYYYMM-XXXX
        return strtoupper($route) . '-' . $year . $month . '-' . $counter;
    }

    private function getFormComponents($route)
    {
        $builder = $this->db->table('form_components');
        $builder->where('route', $route);
        $builder->orderBy('sort_order', 'ASC');
        
        return $builder->get()->getResultArray();
    }
}
