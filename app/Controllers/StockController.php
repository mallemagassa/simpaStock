<?php

namespace App\Controllers;

use DateTime;
use Exception;
use App\Models\Out;
use App\Models\Shop;
use App\Models\Stock;
use App\Models\Report;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Waybill;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class StockController extends BaseController
{
    public function index()
    {
        $model = new Stock();
        $modelProduct = new Product();
        $modelShop = new Shop();
        $outModel = new Out(); 

        $data['stocks'] = $model->getAllStocksWithProducts();
        $data['products'] = $modelProduct->findAll();
        $data['shops'] = $modelShop->findAll();
        $data['outs'] = $outModel->findAll();

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
        $product_id = $this->request->getPost('product_id');
        $stock_id = $this->request->getPost('stock_id');
        
        // Vérifier si un autre enregistrement avec le même product_id existe
        // $existingStock = $model->where('product_id', $product_id)
        //                        ->where('id !=', $stock_id)
        //                        ->first();
        // if ($existingStock) {
        //     return redirect()->back()->with('error', 'Ce produit existe déjà dans le stock avec un autre identifiant.')->withInput();
        // }
        
        // Récupérer les données pour la mise à jour
        $data = [
            'purchase_price' => $this->request->getPost('purchase_price'),
            'sale_price'     => $this->request->getPost('sale_price'),
            'quantity'       => $this->request->getPost('quantity'),
            'critique'       => $this->request->getPost('critique'),
            //'product_id'     => $product_id,
            'created_at'     => $this->request->getPost('created_at')
        ];

        // Valider les données
        if ($this->validate($model->validationRulesUpdate, $model->validationMessagesUpdate)) {
            // Utiliser la méthode d'update du modèle
            $updated = $model->update($stock_id, $data);

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
        $reportModel = new Report();
        $stock = $model->find($id);

        if (!$stock) {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }

        if ($this->request->getMethod() === 'post') {
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
            $amountTotal = intval($stock['sale_price'] * $quantityToAdd);
            $model->update($id, ['quantity' => $newQuantity]);

            $reportData = [
                'quantity_before' => $stock['quantity'],
                'quantity_after' => $newQuantity,
                'user_id' => auth()->id(),
                'amount_total' => $amountTotal,
                'quantity' => $quantityToAdd,
                'product_id' => $stock['product_id'],
                'ops' => 'e',
            ];

            $reportResul = $reportModel->insert($reportData);

            if (!$reportResul) {
                return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'insertion de l\'historique.');
            }

            return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès. Quantité ajoutée.');
        }

        return redirect()->to('/stock')->with('error', 'Stock introuvable.');
    }
    public function out()
    {
        $model = new Stock();
        $shopModel = new Shop();
        $outModel = new Out();
        $reportModel = new Report();
    
        if ($this->request->getMethod() === 'post') {
            
            $waybills = $this->request->getPost('waybill');
            $profit = $this->request->getPost('profit');
            $shopId = $this->request->getPost('shop_id');
            $amount_total_sale = $this->request->getPost('amout_total_sale');
            $amount_total_purchase = $this->request->getPost('amout_total_purchase');
            $created_at = $this->request->getPost('created_at_out');
            $observation = $this->request->getPost('observation');
            
            if (empty($waybills) || empty($shopId) || empty($amount_total_sale) || empty($amount_total_purchase)) {
                return redirect()->back()->withInput()->with('error', 'Les données requises sont manquantes.');
            }
    
            // Generate the unique reference number
            $year = date('Y');
            $month = date('m');
    
            // Retrieve the latest "out" entry
            $lastOut = $outModel->orderBy('id', 'DESC')->first();
    
            // Calculate the incrementing number based on the last reference
            $increment = 1;
            if ($lastOut) {
                // Extract the last 5 digits of the reference and increment it
                $lastRef = intval(substr($lastOut['ref'], -5));
                $increment = $lastRef + 1;
            }
    
            // Format the reference as "BS+Year+Month+Increment"
            $ref = sprintf('BS%s%s%05d', $year, $month, $increment);
    
            // Prepare data for insertion into Out
            $outData = [
                'profit' => $profit,
                'amount_total_sale' => $amount_total_sale,
                'amount_total_purchase' => $amount_total_purchase,
                'product_out' => json_encode($waybills),
                'observation' => $observation,
                'ref' => $ref,
                'shop_id' => $shopId,
                'created_at' => $created_at,
            ];
    
            // Verify if insertion failed in Out model
            if (!$outModel->insert($outData)) {
                log_message('error', 'Échec de l\'insertion dans Out: ' . json_encode($outModel->errors()));
                return redirect()->back()->withInput()->with('error', 'Erreur lors de la création du bon de livraison.' . json_encode($outModel->errors()));
            }
    
            foreach ($waybills as $item) {
                $stock = $model->find($item['stock_id']);
                
                if (!$stock) {
                    log_message('error', 'Stock ID ' . $item['stock_id'] . ' introuvable.');
                    continue;
                }
    
                $quantityToRemove = (int)$item['quantity'];
    
                if ($quantityToRemove > $stock['quantity']) {
                    return redirect()->back()->withInput()->with('error', 'Quantité insuffisante en stock pour le produit ID ' . $stock['id']);
                }
    
                $newQuantity = $stock['quantity'] - $quantityToRemove;
                $model->update($stock['id'], ['quantity' => $newQuantity]);
    
                if ($newQuantity <= $stock['critique']) {
                    \CodeIgniter\Events\Events::trigger('stockUpdated', [
                        'user_id' => auth()->id(),
                        'message' => "Attention, le niveau critique de produit ID " . $stock['id'] . " est atteint."
                    ]);
                }
            }
    
            return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès. Quantité retirée.');
        }
    
        return redirect()->to('/stock')->with('error', 'Méthode non autorisée.');
    }
    
    
    
    private function insertStockHistory($outModel, $reportModel, $stock, $shopId, $quantity, $profit, $amountTotal, $newQuantity, $created_at, $waybillId)
    {
        $outData = [
            'profit' => $profit,
            'amount_total_sale' => $amountTotal,
            'amount_total_purchase' => $quantity,
            'product_out' => $stock['product_id'],
            'shop_id' => $shopId,
            'created_at' => $created_at,
        ];
    
        $reportData = array_merge($outData, [
            'quantity_before' => $stock['quantity'],
            'quantity_after' => $newQuantity,
            'user_id' => auth()->id(),
            'ops' => 's',
        ]);
    
        return $outModel->insert($outData) && $reportModel->insert($reportData);
    }
    



    public function exports()
    {
        $stock = new Stock();
        $stocks = $stock->getAllStocksWithProducts();
    
        $file = FCPATH . 'stock.xlsx';
    
        $spreadSheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Produit');
        $sheet->setCellValue('B1', 'Quantité');
        $sheet->setCellValue('C1', 'Prix Achat');
        $sheet->setCellValue('D1', 'Montant Inv');
        $sheet->setCellValue('E1', 'Prix Vente');
        $sheet->setCellValue('F1', 'Montant Vte');
        $sheet->setCellValue('G1', 'Niveau Critique');
        $sheet->setCellValue('H1', 'Date Creation');
    
        foreach ($stocks as $i => $value) {
            $row = $i + 2;
            $sheet->setCellValue('A' . $row, $value['product_name']);
            $sheet->setCellValue('B' . $row, $value['quantity']);
            $sheet->setCellValue('C' . $row, $value['purchase_price']);
            $sheet->setCellValue('D' . $row, number_format($value['sale_price'], 0, '.', ' ') . ' F CFA');
            $sheet->setCellValue('E' . $row, $value['sale_price']);
            $sheet->setCellValue('F' . $row, number_format(abs($value['sale_price']) * abs($value['quantity']), 0, '.', ' ') . ' F CFA');
            $sheet->setCellValue('G' . $row, $value['critique']);
            $sheet->setCellValue('H' . $row, date('d/m/Y', strtotime($value['created_at'])));
        }
    
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadSheet);
        $writer->save($file);
    
        header("Content-Description: File Transfer");
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . filesize($file));
    
        ob_clean();
        flush();
        readfile($file);
        unlink($file);
        exit;
    }

    public function exportToPDF()
    {
        $stock = new Stock();
        $stocks = $stock->getAllStocksWithProducts();
    
        $spreadSheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
    
        $headers = ['Produit', 'Quantité', 'Prix Achat', 'Montant Inv', 'Prix Vente', 'Montant Vte', 'Niveau Critique', 'Date Creation'];
        $columnLetter = 'A';
    
        foreach ($headers as $header) {
            $sheet->setCellValue($columnLetter . '1', $header);
            $sheet->getStyle($columnLetter . '1')->getFont()->setBold(true);
            $sheet->getStyle($columnLetter . '1')->getAlignment()->setHorizontal('center');
            $sheet->getStyle($columnLetter . '1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $columnLetter++;
        }
    
        foreach ($stocks as $i => $value) {
            $row = $i + 2;
            $sheet->setCellValue('A' . $row, $value['product_name']);
            $sheet->setCellValue('B' . $row, $value['quantity']);
            $sheet->setCellValue('C' . $row, $value['purchase_price']);
            $sheet->setCellValue('D' . $row, number_format($value['purchase_price'] * $value['quantity'], 0, '.', ' ') . ' F CFA');
            $sheet->setCellValue('E' . $row, $value['sale_price']);
            $sheet->setCellValue('F' . $row, number_format($value['sale_price'] * $value['quantity'], 0, '.', ' ') . ' F CFA');
            $sheet->setCellValue('G' . $row, $value['critique']);
            $sheet->setCellValue('H' . $row, date('d/m/Y', strtotime($value['created_at'])));
            
            foreach (range('A', 'H') as $columnLetter) {
                $sheet->getStyle($columnLetter . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle($columnLetter . $row)->getAlignment()->setHorizontal('center');
            }
        }
    
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadSheet, 'Mpdf');
    
        $fileName = 'stock.pdf';
        $filePath = FCPATH . $fileName;
    
        $writer->save($filePath);
    
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
        header("Content-Length: " . filesize($filePath));
    
        ob_clean();
        flush();
        readfile($filePath);
        unlink($filePath);
        exit;
    }
    

    
    public function filterByDate()
    {
        $request = service('request');
        $startDate = $request->getPost('start_date');
        
        $produitModel = new Out();
        $productModel = new Product();
        $stockModel = new Stock();

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

        $response = [];
        foreach ($filteredOuts as $out) {
            $product = current(array_filter($products, fn($prod) => $prod['id'] === $out['product_id']));
            $stock = current(array_filter($stocks, fn($stk) => $stk['product_id'] === $out['product_id']));

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
            $stock = current(array_filter($stocks, fn($stk) => $stk['product_id'] === $out['product_id']));
    
            return [
                'id' => $out['id'],
                'product_name' => $product['name'] ?? '',
                'purchase_price' => number_format($stock['purchase_price'] ?? 0, 0, '.', ' '),
                'sale_price' => number_format($stock['sale_price'] ?? 0, 0, '.', ' '),
                'quantity' => $out['quantity'],
                'amount_total' => number_format($out['amount_total'], 0, '.', ' '),
                'profit' => number_format($out['profit'], 0, '.', ' '),
                'created_at' => $out['created_at']
            ];
        }, $outs);
    
        return $this->response->setJSON($data);
    }
    
}


   // if (!$this->validate([
            //     'quantity' => 'required|integer|greater_than[0]',
            //     'shop_id' => 'required|integer|greater_than[0]',
            //     'created_at_out' => 'required|date|'
            // ])) {
            //     return view('content/crud/stock', [
            //         'stock' => $stock,
            //         'validation' => $this->validator,
            //         'modal' => 'out-stock-modal'
            //     ]);
            // }

            // $quantityToRemove = (int)$this->request->getPost('quantity');
            // $created_at = $this->request->getPost('created_at_out');

            // if ($quantityToRemove > $stock['quantity']) {
            //     return view('content/crud/stock', [
            //         'stock' => $stock,
            //         'validation' => $this->validator,
            //         'modal' => 'out-stock-modal', 
            //         'error' => 'Quantité insuffisante en stock.'
            //     ]);
            // }

            // $newQuantity = $stock['quantity'] - $quantityToRemove;
            // $profit = intval((abs($stock['sale_price']) - abs($stock['purchase_price'])) * abs($quantityToRemove));
            // $amountTotal = intval($stock['sale_price'] * $quantityToRemove);

            // $model->update(1, ['quantity' => $newQuantity]);

            // if (!$this->insertStockHistory($outModel, $reportModel, $stock, $shop['id'], $quantityToRemove, $profit, $amountTotal, $newQuantity, $created_at, $waybillModel, $waybilId, $amount_total_sale, $amount_total_purchase)) {
            //     return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'insertion de l\'historique.');
            // }

            // if ($newQuantity <= $stock['critique']) {
            //     \CodeIgniter\Events\Events::trigger('stockUpdated', [
            //         'user_id' => auth()->id(),
            //         'message' => "Attention, le niveau critique de produit est atteint."
            //     ]);
            // }