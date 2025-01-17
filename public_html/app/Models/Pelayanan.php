<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelayanan extends Model
{
    protected $table      = 'sspelayanan';
    protected $primaryKey = 'id_pelayanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_opd', 'nama_pelayanan', 'route','url', 'file_foto', 'active', 'tgl_input','deskripsi'];
}