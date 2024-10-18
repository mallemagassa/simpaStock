<?php
namespace App\Controllers;

use App\Models\Role;
use CodeIgniter\Controller;

class RoleController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    public function index()
    {
        $data['roles'] = $this->role->findAll();
        return view('content/crud/role', $data);
    }

    public function create()
    {
        return view('content/crud/create');
    }

    public function store()
    {
        $this->role->save([
            'group' => $this->request->getPost('group'),
            'user_id' => auth()->user()->id,
            
        ]);


        return redirect()->to('/roles');
    }

    public function edit($id)
    {
        $data['role'] = $this->role->find($id);
        return view('content/crud/edit', $data);
    }

    public function update($id)
    {
        $this->role->update($id, [
            'group' => $this->request->getPost('group'),
        ]);

        return redirect()->to('/roles');
    }

    public function delete($id)
    {
        $this->role->delete($id);
        return redirect()->to('/roles');
    }
}
