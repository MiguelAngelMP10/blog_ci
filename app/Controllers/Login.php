<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function login(): string
    {
        return view('login', ['page_title' => 'Login']);
    }

    public function auth(): RedirectResponse
    {
        $model = new  User();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->getUser($email);

        if ($user and password_verify($password, $user['password'])) {
            session()->set(['email' => $user['email']]);
            return redirect()->to('/blogs');
        } else {
            session()->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('/login');
        }
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
