<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\PelajaranModel;
use App\Models\SiswaModel;
use App\Models\StaffModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $staff = new StaffModel();
        $siswa = new SiswaModel();
        $kelas = new KelasModel();
        $pelajaran = new PelajaranModel();
        $data = [
            'id_staff' => $session->get('id_staff'),
            'nip' => $session->get('nip'),
            'nama_pegawai' => $session->get('nama_pegawai'),
            'tipe' => $session->get('tipe'),
            'staff' => $staff->countAllResults(),
            'siswa' => $siswa->countAllResults(),
            'kelas' => $kelas->countAllResults(),
            'pelajaran' => $pelajaran->countAllResults(),
        ];
        return view('admin/index', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('login_guru');
    }
}
