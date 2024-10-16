<?php

namespace App\Controllers;
use App\Models\Shop;
use App\Models\Notification;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $model = new Shop();

        $data['shops'] = $model->findAll();

        return view('content/index', $data);
    }

}
