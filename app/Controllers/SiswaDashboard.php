<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelajaranModel;

class SiswaDashboard extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect(); // Loading database
        // OR $this->db = \Config\Database::connect();
    }

    public function index()
    {   $session = session();
        $listmatpel = new  PelajaranModel();
        $id_kelas = $session->get('id_kelas');
        $id_siswa = $session->get('id_siswa');

        $builder = $this->db->table("tbl_siswa as siswa");
        $builder->select('*');
        $builder->where('siswa.id_siswa', $id_siswa);
        $builder->join('tbl_kelas as kelas', 'siswa.id_kelas = kelas.id_kelas');
        $kelas = $builder->get()->getResult();

        $builder2 = $this->db->table("tbl_pelajaran as pelajaran");
        $builder2->select('*');
        $builder2->join('tbl_jadwal_pelajaran as jadwal', 'pelajaran.id_pelajaran = jadwal.id_pelajaran');
        $jadwalpelajaran = $builder2->get()->getResult();

        $data = [
            'id_siswa' => $id_siswa,
            'nisn' => $session->get('nisn'),
            'nama_siswa' => $session->get('nama_siswa'),
            'id_kelas' => $id_kelas,
            'listkelas'=> $kelas,
            'jadwalpelajaran' => $jadwalpelajaran,
            'listmatpel' => $listmatpel->where('id_kelas', $id_kelas)->findAll()
        ];
        return view('siswa/index', $data);
    }
}
