<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tbl_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nisn','id_kelas','nama_siswa','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','foto','username','password'];
}
