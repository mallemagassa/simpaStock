<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupPermission extends Model
{
    protected $table = 'group_permissions';
    protected $primaryKey = ['group_id', 'permission_id'];
    protected $allowedFields = ['group_id', 'permission_id'];

}
