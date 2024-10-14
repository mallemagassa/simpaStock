<?php
namespace App\Controllers;

use App\Models\Unit;
use App\Models\Shop;
use CodeIgniter\Controller;
use App\Models\Notification;

class ShopController extends BaseController
{
    // Afficher la liste des produits
    public function index()
    {
        $model = new Shop();
        $modelUnit = new Unit();
        $data['shops'] = $model->getAllshopsWithUnits();
        $data['units'] = $modelUnit->findAll();


        return view('content/crud/shop', $data);
    }

    public function create()
    {
        return view('shop/create');
    }

    public function store()
    {
        $model = new Shop();
    
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name'           => $this->request->getPost('name'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'description'    => $this->request->getPost('description'),
                'code'           => $this->request->getPost('code'),
                'unit_id'        => $this->request->getPost('unit_id')
            ];
    
            $model->save($data);
    
            return redirect()->to('/shop')->with('success', 'Produit créé avec succès');
        }
    
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    

    public function show($id)
    {
        $model = new Shop();
        $data['shop'] = $model->find($id);

        if (!$data['shop']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produit non trouvé');
        }

        return view('shop/show', $data);
    }

    public function edit($id)
    {
        $model = new Shop();
        $data['shop'] = $model->find($id);

        if (!$data['shop']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produit non trouvé');
        }

        return view('shop/edit', $data);
    }

    public function update()
    {
        $model = new Shop();
        
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name'           => $this->request->getPost('name'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'description'    => $this->request->getPost('description'),
                'code'           => $this->request->getPost('code'),
                'unit_id'        => $this->request->getPost('unit_id')
            ];
    
            $updated = $model->update($this->request->getPost('shop_id'), $data);
    
            if ($updated) {
                return redirect()->to('/shop')->with('success', 'Produit mis à jour avec succès');
            } else {
                return redirect()->back()->with('error', 'La mise à jour du produit a échoué.')->withInput();
            }
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    
    public function delete($id)
    {
        $model = new Shop();
    
        $shop = $model->find($id);
        
        if ($shop) {
            if ($model->delete($id)) {
                return redirect()->to('/shop')->with('success', 'Produit supprimé avec succès.');
            } else {
                return redirect()->to('/shop')->with('error', 'Une erreur s\'est produite lors de la suppression du produit.');
            }
        } else {
            return redirect()->to('/shop')->with('error', 'Produit introuvable.');
        }
    }
    
}
