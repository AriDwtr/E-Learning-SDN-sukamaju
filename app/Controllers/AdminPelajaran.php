<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\PelajaranModel;
use App\Models\StaffModel;

class AdminPelajaran extends BaseController
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

    public function detail($id)
    {
        $session = session();
        $builder = $this->db->table("tbl_pelajaran as pelajaran");
        $builder->select('*');
        $builder->where('pelajaran.id_kelas', $id);
        $builder->join('tbl_kelas as kelas', 'pelajaran.id_kelas = kelas.id_kelas');
        $builder->join('tbl_staff as staff', 'pelajaran.id_staff = staff.id_staff');
        $pelajaran = $builder->get()->getResult();
        $kelas = new KelasModel();
        $staff = new StaffModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'pelajaran' => $pelajaran,
            'kelas'=> $kelas->findAll(),
            'staff'=> $staff->findAll()
        ];
        return view('admin/pelajaran/detail_pelajaran', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $pelajaran = new PelajaranModel();
        $rules = [
            'pelajaran'         => 'required',
        ];
        if($this->validate($rules)){
            $data = [
                'id_kelas' => $this->request->getPost('kelas'),
                'id_staff' => $this->request->getPost('staff'),
                'pelajaran' => $this->request->getVar('pelajaran'),
            ];
        $pelajaran->insert($data);
        $session->setFlashdata('msg', 'Berhasil Menambahkan Mata Pelajaran');
        return redirect()->route('adminpelajaran');
        }
    }

    public function edit($id)
    {
        $session = session();
        $pelajaran = new PelajaranModel();
        $staff = new StaffModel();
        $kelas = new KelasModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'pelajaran' => $pelajaran->find($id),
            'staff'=> $staff->orderBy('id_staff', 'ASC')->findAll(),
            'kelas'=> $kelas->orderBy('id_kelas', 'ASC')->findAll()
        ];
        return view('admin/pelajaran/edit_pelajaran', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $pelajaran = new PelajaranModel();
        $rules = [
            'pelajaran'         => 'required',
        ];
        if($this->validate($rules)){
            $data = [
                'id_kelas' => $this->request->getPost('kelas'),
                'id_staff' => $this->request->getPost('staff'),
                'pelajaran' => $this->request->getVar('pelajaran'),
            ];
        $pelajaran->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Mata Pelajaran');
        return redirect()->route('adminpelajaran');
        }
    }

    public function delete($id)
    {
        $session = session();
        $pelajaran = new PelajaranModel();
        $pelajaran->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Mata Pelajaran');
        return redirect()->route('adminpelajaran');
    }

}
