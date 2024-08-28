<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class Blog extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\Blog();
        $data['blogs'] = $model->orderBy('id', 'DESC')->findAll();
        return view('blog/index', $data);
    }

    public function create(): string
    {
        return view('product/create');
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $model = new \App\Models\Blog();
        $data = [
            'users_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        $model->save($data);
        session()->setFlashdata('success', 'Create success');
        return redirect()->to('/blogs');
    }

    public function edit($id): string
    {
        $model = new \App\Models\Blog();
        $data['blog'] = $model->find($id);
        return view('blog/edit', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function update(): RedirectResponse
    {
        $model = new \App\Models\Blog();
        $id = $this->request->getPost('id');
        $data = [
            'users_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        $model->update($id, $data);
        session()->setFlashdata('success', 'Update success');
        return redirect()->to('/blogs');
    }

    public function delete($id): RedirectResponse
    {
        $model = new \App\Models\Blog();
        $model->delete($id);
        session()->setFlashdata('success', 'Delete success');
        return redirect()->to('/blogs');
    }
}
