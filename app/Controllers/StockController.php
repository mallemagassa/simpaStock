<?php

namespace App\Controllers;

use DateTime;
use App\Models\Out;
use App\Models\Shop;
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
        $modelShop = new Shop();

        $data['stocks'] = $model->getAllStocksWithProducts();
        $data['products'] = $modelProduct->findAll();
        $data['shops'] = $modelShop->findAll();

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
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'quantity' => $this->request->getPost('quantity'),
                'critique' => $this->request->getPost('critique'),
                'product_id' => $this->request->getPost('product_id'),
                'created_at'     => $this->request->getPost('created_at')
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
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'quantity'   => $this->request->getPost('quantity'),
                'critique'   => $this->request->getPost('critique'),
                'product_id' => $this->request->getPost('product_id'),
                'created_at' => $this->request->getPost('created_at')
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
        $shopModel = new Shop();
        $outModel = new Out();
        
        $stock = $model->find($id);
        $shop = $shopModel->find( $this->request->getPost('shop_id'));
    
        if (!$stock) {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }
    
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'quantity' => 'required|integer|greater_than[0]',
                'shop_id' => 'required|integer|greater_than[0]'
            ];
    
            if (!$this->validate($rules)) {
                return view('stock/out', [
                    'stock' => $stock,
                    'validation' => $this->validator,
                    'modal' => 'out-stock-modal'
                ]);
            }

            $quantityToRemove = $this->request->getPost('quantity');
            
            if ($quantityToRemove <= $stock['quantity']) {
                $newQuantity = $stock['quantity'] - $quantityToRemove;
                $model->update($id, ['quantity' => $newQuantity]);
                
                //dd(abs($product['sale_price']),  abs($product['purchase_price']), abs($quantityToRemove));
                
                $insertResult = $outModel->insert([
                    'profit' => intval((abs($stock['sale_price']) - abs($stock['purchase_price'])) * abs($quantityToRemove)),
                    'amount_total' => intval(($stock['sale_price'] * $quantityToRemove )),
                    'quantity' => $quantityToRemove,
                    'product_id' => $stock['product_id'],
                    'shop_id' => $shop['id'],
                ]);
                
                
                if (!$insertResult) {
                    return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'insertion: '); //. json_encode($dbError)
                }
                
            
                if ($newQuantity <= $stock['critique']) {
                    $eventData = [
                        'user_id' => auth()->id(),
                        'message' => "Attention, le niveau critique de produit est atteint.",
                    ];
    
                    \CodeIgniter\Events\Events::trigger('stockUpdated', $eventData);
                }


    
                return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès. Quantité retirée.');
            } else {
              
                return view('stock/out', [
                    'stock' => $stock,
                    'validation' => $this->validator,
                    'modal' => 'out-stock-modal', 
                    'error' => 'Quantité insuffisante en stock.'
                ]);
            }
        }
    
        return redirect()->to('/stock')->with('error', 'Stock introuvable.');
    }


    public function filterByDate()
    {
        $request = service('request');
        $startDate = $request->getPost('start_date');
        
        $produitModel = new Out();
        $productModel = new Product(); // Ajoutez votre modèle de produits
        $stockModel = new Stock(); // Ajoutez votre modèle de stocks

        // Récupérez tous les produits et stocks
        $outs = $produitModel->findAll();
        $products = $productModel->findAll();
        $stocks = $stockModel->findAll();

        if ($startDate) {
            $startDate = new DateTime($startDate);
            $filteredOuts = array_filter($outs, function($out) use ($startDate) {
                $createdAt = new DateTime($out['created_at']);
                return $createdAt->format('Y-m-d') === $startDate->format('Y-m-d');
            });
        } else {
            $filteredOuts = $outs;
        }

        // Ajoutez les informations de produit et de stock à chaque `out`
        $response = [];
        foreach ($filteredOuts as $out) {
            $product = current(array_filter($products, fn($prod) => $prod['id'] === $out['product_id']));
            $stock = current(array_filter($stocks, fn($stk) => $stk['id'] === $out['product_id']));

            if ($product && $stock) {
                $out['name'] = $product['name'];
                $out['purchase_price'] = $stock['purchase_price'];
                $out['sale_price'] = $stock['sale_price'];
            }
            
            $response[] = $out;
        }

        return $this->response->setJSON($response);
    }

    
    public function filterOuts() {
        $filterType = $this->request->getPost('filter');
    
        $outModel = new Out();
        $productModel = new Product();
        $stockModel = new Stock();
    
        // Appliquer les filtres en fonction de la date
        switch ($filterType) {
            case 'today':
                $dateFilter = date('Y-m-d');
                $outs = $outModel->where('DATE(created_at)', $dateFilter)->findAll();
                break;
            case 'week':
                $startDate = date('Y-m-d', strtotime('-1 week'));
                $outs = $outModel->where('created_at >=', $startDate)->findAll();
                break;
            case 'month':
                $startDate = date('Y-m-d', strtotime('-1 month'));
                $outs = $outModel->where('created_at >=', $startDate)->findAll();
                break;
            case 'year':
                $startDate = date('Y-m-d', strtotime('-1 year'));
                $outs = $outModel->where('created_at >=', $startDate)->findAll();
                break;
            default:
                $outs = [];
        }
    
        $products = $productModel->findAll();
        $stocks = $stockModel->findAll();
    
        // Récupération des informations complètes pour chaque `out`
        $data = array_map(function($out) use ($products, $stocks) {
            $product = current(array_filter($products, fn($prod) => $prod['id'] === $out['product_id']));
            $stock = current(array_filter($stocks, fn($stk) => $stk['id'] === $out['product_id']));
    
            return [
                'id' => $out['id'],
                'product_name' => $product['name'] ?? '',
                'purchase_price' => number_format($stock['purchase_price'] ?? 0, 0, '.', ' '),
                'sale_price' => number_format($stock['sale_price'] ?? 0, 0, '.', ' '),
                'quantity' => $out['quantity'],
                'amount_total' => number_format($out['amount_total'], 0, '.', ' '),
                'profit' => number_format($out['profit'], 0, '.', ' ')
            ];
        }, $outs);
    
        return $this->response->setJSON($data);
    }
    
    


    
}
