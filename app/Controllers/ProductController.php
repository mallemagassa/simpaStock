<?php
namespace App\Controllers;

use App\Models\Unit;
use App\Models\Product;
use CodeIgniter\Controller;
use App\Models\Notification;

class ProductController extends BaseController
{
    // Afficher la liste des produits
    public function index()
    {
        $model = new Product();
        $modelUnit = new Unit();
        $data['products'] = $model->getAllProductsWithUnits();
        $data['units'] = $modelUnit->findAll();


        return view('content/crud/products', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $model = new Product();
    
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name'           => $this->request->getPost('name'),
                'description'    => $this->request->getPost('description'),
                'code'           => $this->request->getPost('code'),
                'unit_id'        => $this->request->getPost('unit_id')
            ];
    
            $model->save($data);
    
            return redirect()->to('/product')->with('success', 'Produit créé avec succès');
        }
    
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    

    public function show($id)
    {
        $model = new Product();
        $data['product'] = $model->find($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produit non trouvé');
        }

        return view('product/show', $data);
    }

    public function edit($id)
    {
        $model = new Product();
        $data['product'] = $model->find($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produit non trouvé');
        }

        return view('product/edit', $data);
    }

    public function update()
    {
        $model = new Product();
        
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            $data = [
                'name'           => $this->request->getPost('name'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'description'    => $this->request->getPost('description'),
                'code'           => $this->request->getPost('code'),
                'unit_id'        => $this->request->getPost('unit_id')
            ];
    
            $updated = $model->update($this->request->getPost('product_id'), $data);
    
            if ($updated) {
                return redirect()->to('/product')->with('success', 'Produit mis à jour avec succès');
            } else {
                return redirect()->back()->with('error', 'La mise à jour du produit a échoué.')->withInput();
            }
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    
    public function delete($id)
    {
        $model = new Product();
    
        $product = $model->find($id);
        
        if ($product) {
            if ($model->delete($id)) {
                return redirect()->to('/product')->with('success', 'Produit supprimé avec succès.');
            } else {
                return redirect()->to('/product')->with('error', 'Une erreur s\'est produite lors de la suppression du produit.');
            }
        } else {
            return redirect()->to('/product')->with('error', 'Produit introuvable.');
        }
    }
    
}
