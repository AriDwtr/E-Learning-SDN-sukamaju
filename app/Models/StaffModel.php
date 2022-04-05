<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table            = 'tbl_staff';
    protected $primaryKey       = 'id_staff';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nip','nama_pegawai','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','foto','username','password','tipe'];
}
