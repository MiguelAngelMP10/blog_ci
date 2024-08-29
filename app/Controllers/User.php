<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

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

    public function store(): RedirectResponse
    {
        try {
            $model = new \App\Models\User();
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'name' => $this->request->getPost('name'),
                'surnames' => $this->request->getPost('surnames'),
                'gender' => $this->request->getPost('gender'),
                'date_of_birth' => $this->request->getPost('date_of_birth'),
            ];

            if ($model->save($data)) {
                session()->setFlashdata('success', 'Create success');
                return redirect()->to('/users');
            } else {
                $errors = $model->errors();
                session()->setFlashdata('errors', $errors);
                return redirect()->back();
            }
        } catch (\Exception $exception) {
            session()->setFlashdata('error', $exception->getMessage());
            return redirect()->to('/users');
        }
    }
    public function show(int $id): string
    {
        $model = new \App\Models\User();
        $data['user'] = $model->find($id);
        return view('users/show', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function update(): RedirectResponse
    {
        $model = new \App\Models\User();
        $id = $this->request->getPost('id');
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getPost('name'),
            'surnames' => $this->request->getPost('surnames'),
            'gender' => $this->request->getPost('gender'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
        ];

        $model->update($id, $data);
        session()->setFlashdata('success', 'Update success');
        return redirect()->to('/users');
    }

    public function edit($id): string
    {
        $model = new \App\Models\User();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

}
