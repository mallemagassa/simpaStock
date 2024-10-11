<?php

namespace App\Controllers;
use App\Models\Notification;

class DashboardController extends BaseController
{
    public function index(): string
    {

        return view('content/index');
    }

}
