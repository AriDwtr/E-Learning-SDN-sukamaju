<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class AdminPelajaran extends BaseController
{
    public function index()
    {
        $session = session();
        $kelas = new KelasModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'kelas'=> $kelas->orderBy('id_kelas', 'ASC')->findAll()
        ];
        return view('admin/pelajaran/menu_pelajaran', $data);
    }
}
