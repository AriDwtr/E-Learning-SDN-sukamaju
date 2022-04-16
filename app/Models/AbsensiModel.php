<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table            = 'tbl_absensi';
    protected $primaryKey       = 'id_absensi';
    protected $allowedFields    = ['id_jadwal','id_siswa','waktu_absensi'];
}
