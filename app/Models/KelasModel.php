<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'tbl_kelas';
    protected $primaryKey       = 'id_kelas';
    protected $allowedFields    = ['kelas'];

}
