<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class LoginController extends BaseController
{
    public function index()
    {
        return view('content/authentication/sign-in');
    }
}