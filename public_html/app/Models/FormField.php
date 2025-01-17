<?php

namespace App\Models;

use CodeIgniter\Model;

class FormField extends Model
{
    protected $table = 'form_fields';
    protected $primaryKey = 'id';
    protected $allowedFields = ['route', 'label', 'name', 'type', 'required', 'placeholder', 'help_text', 'options', 'accept', 'sort_order'];

    public function getFieldsByRoute($route)
    {
        return $this->where('route', $route)->orderBy('sort_order', 'ASC')->findAll();
    }
}
