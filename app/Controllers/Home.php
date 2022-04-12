<?php

namespace App\Controllers;

use App\Models\StaffModel;

class Home extends BaseController
{
    public function formloginsiswa()
    {
        return view('login/form_login_siswa');
    }

    public function formloginguru()
    {
        return view('login/form_login_guru');
    }
    public function loginguru()
    {
        $staff = new StaffModel();
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $staff->where('username', $username)->first();
        if ($data) {
            $staff_password = $data['password'];
            $verify_password = password_verify($password, $staff_password);
            if ($verify_password) {
                $session_data = [
                    'id_staff' => $data['id_staff'],
                    'nip' => $data['nip'],
                    'nama_pegawai' => $data['nama_pegawai'],
                    'tipe' => $data['tipe'],
                    'logged_in' => TRUE
                ];
                if ($session_data['tipe']=="admin") {
                    $session->set($session_data);
                    return redirect()->route('admindashboard');
                }else{
                    $session->set($session_data);
                    return redirect()->route('gurudashboard');
                }
            }else{
                $session->setFlashdata('msg', 'Password Salah Tolong Cek Ulang');
                return redirect()->route('login_guru');
            }
        }else{
            $session->setFlashdata('msg', 'Ooops Email Tidak Terdaftar');
            return redirect()->route('login_guru');
        }
    }
}
