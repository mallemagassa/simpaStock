<?php

namespace App\Controllers;
use App\Models\Shop;
use App\Models\Notification;
use App\Models\Out;
use App\Models\Product;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $model = new Shop();
        $product = new Product();
        $out = new Out();

        $data['shops'] = $model->findAll();
        $data['products'] = $product->findAll();
        $data['outs'] = $out->findAll();

        return view('content/index', $data);
    }

}
