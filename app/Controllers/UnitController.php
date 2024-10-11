<?php

namespace App\Controllers;

use App\Models\Unit;
use App\Models\Notification;
use CodeIgniter\Exceptions\PageNotFoundException;

class UnitController extends BaseController
{
    public function index()
    {
        $model = new Unit();
        $data['units'] = $model->findAll();

        return view('content/crud/unit', $data);
    }

    public function create()
    {
        return view('unit/create');
    }

    public function store()
    {
        $model = new Unit();
    
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name' => $this->request->getPost('name'),
            ];
    
            $model->save($data);
    
            return redirect()->to('/unit')->with('success', 'Unité créé avec succès');
        }
    
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    

    public function show($id)
    {
        $model = new Unit();
        $data['unit'] = $model->find($id);

        if (!$data['unit']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Unité non trouvé');
        }

        return view('unit/show', $data);
    }

    public function edit($id)
    {
        $model = new Unit();
        $data['unit'] = $model->find($id);

        if (!$data['unit']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('unité non trouvé');
        }

        return view('unit/edit', $data);
    }

    public function update()
    {
        $model = new Unit();
        
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name'           => $this->request->getPost('name'),
            ];
    
            $updated = $model->update($this->request->getPost('unit_id'), $data);
    
            if ($updated) {
                return redirect()->to('/unit')->with('success', 'Unité mis à jour avec succès');
            } else {
                return redirect()->back()->with('error', 'La mise à jour du unité a échoué.')->withInput();
            }
        }
        
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    
    public function delete($id)
    {
        $model = new Unit();
    
        $unit = $model->find($id);
        
        if ($unit) {
            if ($model->delete($id)) {
                return redirect()->to('/unit')->with('success', 'Unité supprimé avec succès.');
            } else {
                return redirect()->to('/unit')->with('error', 'Une erreur s\'est Unitée lors de la suppression du unité.');
            }
        } else {
            return redirect()->to('/unit')->with('error', 'Unité introuvable.');
        }
    }
}