<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'form_builder';
    protected $primaryKey = 'id';
    protected $allowedFields = ['label', 'field_type', 'required', 'sort_order'];

    public function createFormField($data)
    {
        return $this->insert($data);
    }

    public function getFormFields()
    {
        return $this->findAll();
    }

    public function getFormField($id)
    {
        return $this->find($id);
    }

    public function updateFormField($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteFormField($id)
    {
        return $this->delete($id);
    }
}