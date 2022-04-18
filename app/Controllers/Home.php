<?php

namespace App\Controllers;

use App\Models\SiswaModel;
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
            $session->setFlashdata('msg', 'Ooops Username Tidak Terdaftar');
            return redirect()->route('login_guru');
        }
    }

    public function loginsiswa()
    {
        $siswa = new SiswaModel();
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $siswa->where('username', $username)->first();
        if ($data) {
            $siswa_password = $data['password'];
            $verify_password = password_verify($password, $siswa_password);
            if ($verify_password) {
                $session_data = [
                    'id_siswa' => $data['id_siswa'],
                    'nisn' => $data['nisn'],
                    'nama_siswa' => $data['nama_siswa'],
                    'id_kelas' => $data['id_kelas'],
                    'logged_in' => TRUE
                ];
                $session->set($session_data);
                return redirect()->route('siswadashboard');
            }else{
                $session->setFlashdata('msg', 'Password Salah Tolong Cek Ulang');
                return redirect()->route('login_siswa');
            }
        }else{
            $session->setFlashdata('msg', 'Ooops Username Tidak Terdaftar');
            return redirect()->route('login_siswa');
        }
    }
}
