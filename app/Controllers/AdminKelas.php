<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class AdminKelas extends BaseController
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
            'kelas' => $kelas->orderBy('id_kelas', 'ASC')->findAll()
        ];
        return view('admin/kelas/menu_kelas', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $kelas = new KelasModel();
        $rules = [
            'kelas'         => 'required|is_unique[tbl_kelas.kelas]',
        ];
        if($this->validate($rules)){
            $data = [
                'kelas' => $this->request->getVar('kelas'),
            ];
        $kelas->insert($data);
        $session->setFlashdata('msg', 'Berhasil Menambahkan Kelas Baru');
        return redirect()->route('adminkelas');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'kelas' => $kelas->orderBy('id_kelas', 'DESC')->findAll()
            ];
            return view('admin/kelas/menu_kelas', $data);
        }
    }

    public function edit($id)
    {
        $session = session();
        $kelas = new KelasModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'kelas' => $kelas->find($id),
        ];
        return view('admin/kelas/edit_kelas', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $kelas = new KelasModel();
        $rules = [
            'kelas'         => 'required',
        ];
        if($this->validate($rules)){
            $data = [
                'kelas' => $this->request->getVar('kelas'),
            ];
        $kelas->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Perbarui Kelas');
        return redirect()->route('adminkelas');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'kelas' => $kelas->find($id),
            ];
            echo view('admin/kelas/edit_kelas', $data);
        }
    }

    public function delete($id)
    {
        $session = session();
        $kelas = new KelasModel();
        $kelas->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Kelas');
        return redirect()->route('adminkelas');
    }
}
