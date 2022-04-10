<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranModel extends Model
{
    protected $table            = 'tbl_pelajaran';
    protected $primaryKey       = 'id_pelajaran';
    protected $allowedFields    = ['id_kelas','id_staff','pelajaran'];
}
