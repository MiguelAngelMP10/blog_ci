<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\User();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function create(): string
    {
        return view('users/create');
    }

    public function delete($id): RedirectResponse
    {
        $model = new \App\Models\User();
        $model->delete($id);
        session()->setFlashdata('success', 'Delete success');
        return redirect()->to('/users');
    }
}
