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
}
