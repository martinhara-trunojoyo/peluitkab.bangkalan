<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_magang extends Model
{
    protected $table      = 'tb_tiket_magang';
    protected $primaryKey = 'id_tiket';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_tiket', 'tgl_input', 'status', 'catatan', 'id_opd', 'tgl_awal', 'tgl_akhir', 'nama_pembimbing', 'no_pembimbing', 'surat_pengantar', 'id_user', 'nama_project', 'deskripsi_project', 'berkas_project', 'tgl_selesai', 'id_pembina_lapangan'];
}