<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class Post extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\Post();
        $data['posts'] = $model->getBlogWithUsers();
        return view('posts/index', $data);
    }

    public function create(): string
    {
        return view('posts/create');
    }

    /**
     */
    public function store(): RedirectResponse
    {
        try {
            $model = new \App\Models\Post();
            $data = [
                'user_id' => session()->get('id'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'created_at' => date('Y-m-d h:i:s')
            ];


            if ($model->save($data)) {
                session()->setFlashdata('success', 'Create success');
                return redirect()->to('/posts');
            } else {
                $errors = $model->errors();
                session()->setFlashdata('errors', $errors);
                return redirect()->back();
            }


        } catch (\Exception $exception) {
            session()->setFlashdata('error', $exception->getMessage());
            return redirect()->to('/posts');
        }
    }

    public function show(int $id): string
    {
        $model = new \App\Models\Post();
        $data['post'] = $model->find($id);
        return view('posts/show', $data);
    }

    public function edit($id): string
    {
        $model = new \App\Models\Post();
        $data['post'] = $model->find($id);
        return view('posts/edit', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function update(): RedirectResponse
    {
        $model = new \App\Models\Post();
        $id = $this->request->getPost('id');
        $data = [
            'users_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'updated_at' => date('Y-m-d h:i:s')
        ];

        $model->update($id, $data);
        session()->setFlashdata('success', 'Update success');
        return redirect()->to('/posts');
    }

    public function delete($id): RedirectResponse
    {
        $model = new \App\Models\Post();
        $model->delete($id);
        session()->setFlashdata('success', 'Delete success');
        return redirect()->to('/posts');
    }
}
