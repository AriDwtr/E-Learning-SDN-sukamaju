<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SiswaModel;

class AdminSiswa extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect(); // Loading database
        // OR $this->db = \Config\Database::connect();
    }


    public function index()
    {
        $builder = $this->db->table("tbl_siswa as siswa");
        $builder->select('*');
        $builder->join('tbl_kelas as kelas', 'siswa.id_kelas = kelas.id_kelas');
        $siswa = $builder->get()->getResult();

        $session = session();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'siswa' => $siswa
        ];
        return view('admin/siswa/menu_siswa', $data);
    }

    public function form()
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
        return view('admin/siswa/form_siswa', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $siswa = new SiswaModel();
        $rules = [
            'nama'         => 'required|is_unique[tbl_siswa.nama_siswa]',
            'username'     => 'required|is_unique[tbl_siswa.username]',
            'password'     => 'required'
        ];
        if($this->validate($rules)){
            $data = [
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_kelas' => $this->request->getPost('kelas'),
            ];
        $siswa->insert($data);
        $session->setFlashdata('msg', 'Berhasil Menambahkan Siswa Account Baru');
        return redirect()->route('adminsiswa');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
            ];
            return view('admin/siswa/form_siswa', $data);
        }
    }
    
    public function edit($id)
    {
        $session = session();
        $siswa = new SiswaModel();
        $kelas = new KelasModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'siswa' => $siswa->find($id),
            'kelas'=> $kelas->orderBy('id_kelas', 'ASC')->findAll()
        ];
        return view('admin/siswa/edit_siswa', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $siswa = new SiswaModel();
        $rules = [
            'nama'         => 'required',
            'username'     => 'required',
        ];
        if($this->validate($rules)){
            $data = [
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'username' => $this->request->getVar('username'),
                'id_kelas' => $this->request->getPost('kelas'),
            ];
        $siswa->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Siswa');
        return redirect()->route('adminsiswa');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'siswa' => $siswa->find($id)
            ];
            return view('admin/siswa/edit_siswa', $data);
        }
    }

    public function editpassword($id)
    {
        $session = session();
        $siswa = new SiswaModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'siswa' => $siswa->find($id),
        ];
       return view('admin/siswa/password_siswa',$data);
    }

    public function updatepassword($id)
    {
        $session = session();
        $siswa = new SiswaModel();
        helper(['form']);
        $rules = [
            'password'         => 'required',
            'repassword'     => 'required|matches[password]',
        ];
        if($this->validate($rules)){
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
        $siswa->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Password Siswa');
        return redirect()->route('adminsiswa');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'siswa' => $siswa->find($id),
            ];
            return view('admin/siswa/password_siswa', $data);
        }
    }

    public function delete($id)
    {
        $session = session();
        $siswa = new SiswaModel();
        $siswa->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus siswa');
        return redirect()->route('adminsiswa');
    }

}
