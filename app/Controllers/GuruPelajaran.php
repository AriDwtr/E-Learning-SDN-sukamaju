<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalPengajaranModel;

class GuruPelajaran extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect(); // Loading database
        // OR $this->db = \Config\Database::connect();
    }

    public function index($id)
    {
        $session = session();

        $builder = $this->db->table("tbl_pelajaran as pelajaran");
        $builder->select('*');
        $builder->where('pelajaran.id_pelajaran', $id);
        $builder->join('tbl_kelas as kelas', 'pelajaran.id_kelas = kelas.id_kelas');
        $pelajaran = $builder->get()->getResult();

        $builder2 = $this->db->table("tbl_jadwal_pelajaran as jadwalpelajaran");
        $builder2->select('*');
        $builder2->where('jadwalpelajaran.id_pelajaran', $id);
        $builder2->join('tbl_pelajaran as pelajaran', 'jadwalpelajaran.id_pelajaran = pelajaran.id_pelajaran');
        $builder2->join('tbl_kelas as kelas', 'pelajaran.id_kelas = kelas.id_kelas');
        $builder->orderBy('jadwalpelajaran.tanggal_jadwal', 'ASC');
        $jadwalpelajaran = $builder2->get()->getResult();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'pelajaran' => $pelajaran,
            'jadwalpelajaran' => $jadwalpelajaran
        ];
        return view('guru/pelajaran/detail_pelajaran.php', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $jadwalpelajaran = new JadwalPengajaranModel();
        $rules = [
            'judul'         => 'required',
        ];
        if($this->validate($rules)){
            $dataBerkas = $this->request->getFile('filemateri');
		    $fileName = $dataBerkas->getRandomName();
            $data = [
                'id_pelajaran' => $this->request->getPost('idpelajaran'),
                'judul_materi' => $this->request->getVar('judul'),
                'ringkas_materi' => $this->request->getVar('kilas'),
                'link_zoom' => $this->request->getPost('zoom'),
                'tanggal_jadwal' => $this->request->getPost('tanggal'),
                'file_upload' => $fileName
            ];
        $jadwalpelajaran->insert($data);
        $dataBerkas->move('./upload', $fileName);
        $session->setFlashdata('msg', 'Berhasil Menambahkan Jadwal Baru');
        return redirect()->route('gurudashboard');
        }
    }

    public function delete($id)
    {
        $session = session();
        $jadwalpelajaran = new JadwalPengajaranModel();
        $jadwalpelajaran->delete($id);
        $session->setFlashdata('msg', 'Berhasil MenghapusJadwal Kelas');
        return redirect()->route('gurudashboard');
    }
}
