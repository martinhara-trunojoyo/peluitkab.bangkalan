<?php

namespace App\Models;

use CodeIgniter\Model;

class FormField extends Model
{
    protected $table = 'form_fields';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pelayanan', 'label', 'field_type', 'required', 'sort_order'];
    protected $useAutoIncrement = true;
    
    protected $beforeInsert = ['setDefaultSortOrder'];
    
    protected function setDefaultSortOrder(array $data)
    {
        if (!isset($data['data']['sort_order'])) {
            // Get max sort_order for this pelayanan and add 1
            $maxOrder = $this->where('id_pelayanan', $data['data']['id_pelayanan'])
                            ->selectMax('sort_order')
                            ->first();
            $data['data']['sort_order'] = ($maxOrder ? (int)$maxOrder['sort_order'] + 1 : 1);
        }
        return $data;
    }

    public function getFieldsByPelayanan($id_pelayanan)
    {
        try {
            return $this->where('id_pelayanan', $id_pelayanan)
                       ->orderBy('sort_order', 'ASC')
                       ->findAll();
        } catch (\Exception $e) {
            // Fallback if sort_order column doesn't exist yet
            return $this->where('id_pelayanan', $id_pelayanan)
                       ->findAll();
        }
    }
}
