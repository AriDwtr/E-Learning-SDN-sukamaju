<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuruDashboard extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect(); // Loading database
        // OR $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $session = session();
        $id_staff = $session->get('id_staff');
        $builder = $this->db->table("tbl_pelajaran as pelajaran");
        $builder->select('*');
        $builder->where('pelajaran.id_staff', $id_staff);
        $builder->join('tbl_kelas as kelas', 'pelajaran.id_kelas = kelas.id_kelas');
        $builder->orderBy('pelajaran.id_kelas', 'ASC');
        $pelajaran = $builder->get()->getResult();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'pelajaran' => $pelajaran,
        ];
        return view('guru/index', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('login_guru');
    }
}
