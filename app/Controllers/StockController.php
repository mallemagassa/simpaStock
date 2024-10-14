<?php

namespace App\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Notification;
use CodeIgniter\Exceptions\PageNotFoundException;

class StockController extends BaseController
{
    public function index()
    {
        $model = new Stock();
        $modelProduct = new Product();

        $data['stocks'] = $model->getAllStocksWithProducts();
        $data['products'] = $modelProduct->findAll();

        return view('content/crud/stock', $data);
    }

    public function create()
    {
        $modelProduct = new Product();
        $data['products'] = $modelProduct->findAll();

        return view('stock/create', $data);
    }

    public function store()
    {
        $model = new Stock();

        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRulesAdd, $model->validationMessagesAdd)) {
            $data = [
                'quantity' => $this->request->getPost('quantity'),
                'critique' => $this->request->getPost('critique'),
                'product_id' => $this->request->getPost('product_id')
            ];

            $model->save($data);

            return redirect()->to('/stock')->with('success', 'Stock créé avec succès');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    public function show($id)
    {
        $model = new Stock();
        $data['stock'] = $model->find($id);

        if (!$data['stock']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Stock non trouvé');
        }

        return view('stock/show', $data);
    }

    public function edit($id)
    {
        $model = new Stock();
        $data['stock'] = $model->find($id);
        $modelProduct = new Product();
        $data['products'] = $modelProduct->findAll();

        if (!$data['stock']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Stock non trouvé');
        }

        return view('stock/edit', $data);
    }

    public function update()
    {
        $model = new Stock();
        
        if ($this->request->getMethod() === 'post') {
            // Récupérer les données
            $data = [
                'quantity'   => $this->request->getPost('quantity'),
                'critique'   => $this->request->getPost('critique'),
                'product_id' => $this->request->getPost('product_id')
            ];
    
            // Valider les données
            if ($this->validate($model->validationRulesUpdate, $model->validationMessagesUpdate)) {
                // Utilisez la méthode d'update du modèle
                $updated = $model->update($this->request->getPost('stock_id'), $data);
    
                if ($updated) {
                    return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès');
                } else {
                    return redirect()->back()->with('error', 'La mise à jour du stock a échoué.')->withInput();
                }
            }
    
            // Récupérer les erreurs de validation
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        return redirect()->back()->with('error', 'Méthode non autorisée');
    }
    
    
    public function delete($id)
    {
        $model = new Stock();
    
        $stock = $model->find($id);
        
        if ($stock) {
            if ($model->delete($id)) {
                return redirect()->to('/stock')->with('success', 'Stock supprimé avec succès.');
            } else {
                return redirect()->to('/stock')->with('error', 'Une erreur s\'est produite lors de la suppression du stock.');
            }
        } else {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }
    }

    public function in($id)
    {
        $model = new Stock();
        $stock = $model->find($id);

        if (!$stock) {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }

        if ($this->request->getMethod() === 'post') {
            // Validation rules
            $rules = [
                'quantity' => 'required|integer|greater_than[0]'
            ];

            if (!$this->validate($rules)) {
                return view('stock/in', [
                    'stock' => $stock,
                    'validation' => $this->validator,
                    'modal' => 'in-stock-modal'
                ]);
            }

            $quantityToAdd = $this->request->getPost('quantity');
            $newQuantity = $stock['quantity'] + $quantityToAdd;
            $model->update($id, ['quantity' => $newQuantity]);

            return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès. Quantité ajoutée.');
        }

        return redirect()->to('/stock')->with('error', 'Stock introuvable.');
    }

    public function out($id)
    {
        $model = new Stock();
        $stock = $model->find($id);
    
        if (!$stock) {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }
    
        if ($this->request->getMethod() === 'post') {
            // Règles de validation
            $rules = [
                'quantity' => 'required|integer|greater_than[0]'
            ];
    
            if (!$this->validate($rules)) {
                // Retourner à la vue avec les erreurs de validation et garder la modal ouverte
                return view('stock/out', [
                    'stock' => $stock,
                    'validation' => $this->validator,
                    'modal' => 'out-stock-modal'  // Variable pour garder la modal ouverte
                ]);
            }
    
            $quantityToRemove = $this->request->getPost('quantity');
    
            // Vérifier si la quantité demandée est disponible
            if ($quantityToRemove <= $stock['quantity']) {
                $newQuantity = $stock['quantity'] - $quantityToRemove;
                $model->update($id, ['quantity' => $newQuantity]);
    
                // Déclencher un événement si le stock atteint un niveau critique
                if ($newQuantity <= $stock['critique']) {
                    $eventData = [
                        'user_id' => auth()->id(),
                        'message' => "Attention, le niveau critique de produit est atteint.",
                    ];
    
                    \CodeIgniter\Events\Events::trigger('stockUpdated', $eventData);
                }
    
                return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès. Quantité retirée.');
            } else {
                // Quantité insuffisante, rester sur la même page et afficher l'erreur dans la modal
                return view('stock/out', [
                    'stock' => $stock,
                    'validation' => $this->validator,
                    'modal' => 'out-stock-modal',  // Garder la modal ouverte
                    'error' => 'Quantité insuffisante en stock.'
                ]);
            }
        }
    
        return redirect()->to('/stock')->with('error', 'Stock introuvable.');
    }
    

    
}
