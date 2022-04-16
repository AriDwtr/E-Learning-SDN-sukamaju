<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalPengajaranModel extends Model
{
    protected $table            = 'tbl_jadwal_pelajaran';
    protected $primaryKey       = 'id_jadwal';
    protected $allowedFields    = ['id_pelajaran','judul_materi','ringkas_materi','link_zoom','file_upload','tanggal_jadwal'];

}
