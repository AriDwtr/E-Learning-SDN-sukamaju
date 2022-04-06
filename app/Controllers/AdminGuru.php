<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StaffModel;

class AdminGuru extends BaseController
{
    public function index()
    {
        $session = session();
        $staff = new StaffModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'staff' => $staff->orderBy('id_staff', 'DESC')->findAll()
        ];
        return view('admin/guru/menu_guru', $data);
    }

    public function form()
    {
        $session = session();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
        ];
        return view('admin/guru/form_guru', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $staff = new StaffModel();
        $rules = [
            'nama'         => 'required|is_unique[tbl_staff.nama_pegawai]',
            'username'     => 'required|is_unique[tbl_staff.username]',
            'password'     => 'required'
        ];
        if($this->validate($rules)){
            $data = [
                'nip' => $this->request->getPost('nip'),
                'nama_pegawai' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'tipe' => $this->request->getPost('tipe'),
            ];
        $staff->insert($data);
        $session->setFlashdata('msg', 'Berhasil Menambahkan Account Baru');
        return redirect()->route('adminguru');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
            ];
            return view('admin/guru/form_guru', $data);
        }
    }

    public function edit($id)
    {
        $session = session();
        $staff = new StaffModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'staff' => $staff->find($id),
        ];
        return view('admin/guru/edit_guru', $data);
    }

    public function update($id)
    {
        $session = session();
        $staff = new StaffModel();
        helper(['form']);
        $rules = [
            'nama'         => 'required',
            'username'     => 'required',
        ];
        if($this->validate($rules)){
            $data = [
                'nip' => $this->request->getPost('nip'),
                'nama_pegawai' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'username' => $this->request->getVar('username'),
                'tipe' => $this->request->getPost('tipe'),
            ];
        $staff->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Account Baru');
        return redirect()->route('adminguru');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'staff' => $staff->find($id),
            ];
            return view('admin/guru/edit_guru', $data);
        }
    }

    public function editpassword($id)
    {
        $session = session();
        $staff = new StaffModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'staff' => $staff->find($id),
        ];
       return view('admin/guru/password_guru',$data);
    }

    public function updatepassword($id)
    {
        $session = session();
        $staff = new StaffModel();
        helper(['form']);
        $rules = [
            'password'         => 'required',
            'repassword'     => 'required|matches[password]',
        ];
        if($this->validate($rules)){
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
        $staff->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Password Account');
        return redirect()->route('adminguru');
        }else{
            $data = [
                'id_staff' => $session->get('id_staff'),
                'nip' => $session->get('nip'),
                'nama_pegawai' => $session->get('nama_pegawai'),
                'tipe' => $session->get('tipe'),
                'validation' => $this->validator,
                'staff' => $staff->find($id),
            ];
            return view('admin/guru/password_guru', $data);
        }
    }

    public function delete($id)
    {
        $session = session();
        $staff = new StaffModel();
        $staff->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Guru');
        return redirect()->route('adminguru');
    }
}
