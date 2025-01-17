<?php

namespace App\Models;

use CodeIgniter\Model;

class Faq extends Model
{
    protected $table      = 'ssfaq';
    protected $primaryKey = 'id_faq';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_opd', 'pertanyaan','jawaban', 'active','tgl_input'];
}