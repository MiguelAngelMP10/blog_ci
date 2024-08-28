<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\Post();
        $data['posts'] =  $model->getBlogWithUsers();
        return view('home/index', $data);
    }
}
