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

        //$data['shops'] = $model->findAll();
        $data['products'] = $product->findAll();
        $data['outs'] = $out->findAll();

        $user = auth()->user();

        if ($user->inGroup('boutiquier')) {
            
            $data['shops'] = $model->getShopsWithUsers($user->id);
        }
        else{
            $data['shops'] = $model->getShopsWithUsers();
        }

        return view('content/index', $data);
    }

}
