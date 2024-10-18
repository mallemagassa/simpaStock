<?php
namespace App\Controllers;

use App\Models\Permission;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\PermissionModel;
use Config\AuthGroups;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct()
    {
        $this->permission = new Permission();
    }

    public function index()
    { 
        $data['permissions'] = $this->permission->findAll();
        return view('content/crud/permission', $data);
    }

    public function create()
    {
        return view('content/crud/permission');
    }

    public function store()
    {
        $this->permission->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/permissions');
    }

    public function edit($id)
    {
        $data['permission'] = $this->permission->find($id);
        return view('content/crud/edit', $data);
    }

    public function update($id)
    {
        $this->permission->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/permissions');
    }

    public function delete($id)
    {
        $this->permission->delete($id);
        return redirect()->to('/permissions');
    }
}
