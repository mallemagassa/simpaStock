<?php

namespace App\Controllers;

class Errors extends BaseController
{
    public function show404(): string
    {
        
        return view('content/pages/404.php');
    }
}
