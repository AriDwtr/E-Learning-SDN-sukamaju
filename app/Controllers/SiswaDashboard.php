<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SiswaDashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data = [
            'id_siswa' => $session->get('id_siswa'),
            'nisn' => $session->get('nisn'),
            'nama_siswa' => $session->get('nama_siswa'),
            'id_kelas' => $session->get('id_kelas'),
        ];
        return view('siswa/index', $data);
    }
}
