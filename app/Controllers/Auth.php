<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Student;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Auth extends BaseController
{
    private Admin $adminModel;
    private Student $studentModel;
    private $db;
    public function __construct()
    {
        $this->adminModel = new Admin();
        $this->studentModel = new Student();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $dataType = $this->request->getGet('type');
        if ($dataType) {
            return redirect()->to(base_url('/auth/login?type=' . $dataType));
        }

        return redirect()->to(base_url('/auth/login?type=admin'));
    }

    public function login()
    {
        if ($this->isLogin()) {
            return redirect()->to(base_url('/student'));
        }

        $type = $this->request->getGet('type');
        if (!$type) {
            $type = 'student';
        }

        return view('Pages/Auth/Login', $this->data([
            'type' => $type
        ]));
    }

    public function loginAction()
    {
        $ok = $this->validate([
            'username' => 'required',
            'password' => 'required|min_length[4]'
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, 'input tidak valid');

            return redirect()->back();
        }

        $username = $this->request->getPost('username') ?? '';
        $password = $this->request->getPost('password') ?? '';
        $type = $this->request->getGet('type');
        $error = NULL;
        $user = NULL;
        if ($type == 'admin') {
            $user = $this->adminModel->getByUsername($username);
            if (!$user) {
                $error = 'tidak ada admin dengan username ' . $username;
            }
        } else {
            $user = $this->studentModel->getByUsername($username);
            if (!$user) {
                $error = 'tidak ada siswa dengan nis ' . $username;
            }
        }

        if (!$error) {
            if ($type == 'admin') {
                if (!verifyPassword($password, $user['password'])) {
                    $error = 'password yang anda masukan salah';
                }
            } else {
                if ($password != $user['nis']) {
                    $error = 'password yang anda masukan salah';
                }
            }
        }

        if ($error) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata('message_error', $error);

            return redirect()->back();
        }

        $this->setBulkLoginSession($user);

        return redirect()->to(base_url('/student'));
    }

    public function profile()
    {
        $isLogin = session()->get("is_login");
        $isAdmin = session()->get("username");

        if ($isLogin) {
            if ($isAdmin) {
                return view('Pages/Profile/Profile', $this->data());
            }

            $siswaNis= session()->get("nis");

            $getDataSiswa = $this->studentModel->where("nis", $siswaNis)->first();

            return view('Pages/Profile/Siswa', $this->data($getDataSiswa));
        }

        return redirect()->to(base_url('/'));
    }

    public function updateIsAdmin()
    {
        $ok = $this->validate([
            'old_password' => 'required|min_length[8]',
            'new_password' => 'required|min_length[8]',
            're_password' => 'required|min_length[8]|matches[new_password]'
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, 'input tidak valid');

            return redirect()->back();
        }

        $oldPassword = $this->request->getPost("old_password");
        $newPassword = $this->request->getPost("new_password");
        $rePassword = $this->request->getPost("re_password");
        $usernameAdmin = session()->get("username");

        $getAdminAccount = $this->adminModel->where('username', $usernameAdmin)->first();
        $checkPassword = password_verify($oldPassword, $getAdminAccount['password']);

        if($checkPassword){
            try {
                $this->db->transException(true)->transStart();
              
                $data = [
                    "id"         =>  $getAdminAccount["id"],
                    "password"   => password_hash($newPassword, PASSWORD_DEFAULT),
                ];
    
                $this->adminModel->save($data);
    
                $this->db->transComplete();
                return redirect()->to(base_url('/'));
            } catch (DatabaseException $e) {
                log_message('error', $e->getMessage());
                $this->session->setFlashdata(MESSAGE_ERROR, 'Kesalahan Database');
                return redirect()->back();
            }
        }

        $this->session->setFlashdata(MESSAGE_ERROR, 'Password Salah');
        return redirect()->back();
    }

    public function updateIsStudents()
    {
        $ok = $this->validate([
            'address' => 'required',
            'phone' => 'required|numeric',
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, 'input tidak valid');

            return redirect()->back();
        } 

        $phone = $this->request->getPost("phone");
        $address = $this->request->getPost("address");
        $siswaNis= session()->get("nis");

        $getDataSiswa = $this->studentModel->where("nis", $siswaNis)->first();

        try {
            $this->db->transException(true)->transStart();

            $data = [
                "id"        => $getDataSiswa["id"],
                "address"   => $address,
                "phone"     => $phone
            ];

            $this->studentModel->save($data);

            $this->db->transComplete();
        } catch (DatabaseException $e) {
            log_message('error', $e->getMessage());
        }
        
        return redirect()->to(base_url('/student'));
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return redirect()->to('/student');
    }
}
