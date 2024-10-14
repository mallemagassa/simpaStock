<?php

namespace App\Models;

use CodeIgniter\Model;

class Unit extends Model
{
    protected $table = 'units';

    protected $allowedFields = [
        'name', 
    ];


    protected $useTimestamps = true;

    protected $validationRules = [
        'name'           => 'required|min_length[1]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Le nom du unité est requis',
            'min_length' => 'Le nom doit comporter au moins 1 caractères'
        ],
    ];
}