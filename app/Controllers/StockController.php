<?php

namespace App\Controllers;

use DateTime;
use Exception;
use Dompdf\Dompdf;
use App\Models\Out;
use App\Models\Shop;
use App\Models\Stock;
use App\Models\Report;
use App\Models\Product;
use App\Models\Waybill;
use App\Models\Notification;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class StockController extends BaseController
{
    // public function index()
    // {
    //     $model = new Stock();
    //     $modelProduct = new Product();
    //     $modelShop = new Shop();
    //     $outModel = new Out(); 

    //     $data['stocks'] = $model->getAllStocksWithProducts();
    //     $data['products'] = $modelProduct->findAll();
    //     $data['shops'] = $modelShop->findAll();
    //     $data['outs'] = $outModel->orderBy('id', 'DESC')->findAll();

    //     return view('content/crud/stock', $data);
    // }

    public function index()
    {
        $model = new Stock();
        $modelProduct = new Product();
        $modelShop = new Shop();
        $outModel = new Out();
    
        $search = $this->request->getVar('search'); // Récupérer le terme de recherche
        $perPage = 10; // Nombre d'éléments par page
    
        $data['stocks'] = $model->getAllStocksWithProducts($search, $perPage); // Passer la recherche et pagination
        $data['pager'] = $model->pager; // Pager pour afficher les liens de pagination
        $data['products'] = $modelProduct->findAll();
        $data['shops'] = $modelShop->findAll();
        $data['outs'] = $outModel->orderBy('id', 'DESC')->paginate(10, 'outs');
        $data['search'] = $search; // Garder la valeur de recherche pour la vue
    
        return view('content/crud/stock', $data);
    }
    


    public function create()
    {
        $modelProduct = new Product();
        $data['products'] = $modelProduct->findAll();

        return view('stock/create', $data);
    }

    // public function store()
    // {
    //     $model = new Stock();


    //     if ($this->request->getMethod() === 'post' && $this->validate($model->validationRulesAdd, $model->validationMessagesAdd)) {
    //         $data = [
    //             'purchase_price' => $this->request->getPost('purchase_price'),
    //             'sale_price'     => $this->request->getPost('sale_price'),
    //             'quantity' => $this->request->getPost('quantity'),
    //             'critique' => $this->request->getPost('critique'),
    //             'product_id' => $this->request->getPost('product_id'),
    //             'created_at'     => $this->request->getPost('created_at')
    //         ];

    //         $model->save($data);

    //         return redirect()->to('/stock')->with('success', 'Stock créé avec succès');
    //     }

    //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    // }

    public function store()
    {
        $model = new Stock();

        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRulesAdd, $model->validationMessagesAdd)) {
            $data = [
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'quantity'       => $this->request->getPost('quantity'),
                'critique'       => $this->request->getPost('critique'),
                'product_id'     => $this->request->getPost('product_id'),
                'created_at'     => $this->request->getPost('created_at') ?: date('Y-m-d H:i:s'), // Date actuelle si null
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
            
            $data = [
                'purchase_price' => $this->request->getPost('purchase_price'),
                'sale_price'     => $this->request->getPost('sale_price'),
                'quantity'       => $this->request->getPost('quantity'),
                'critique'       => $this->request->getPost('critique'),
                'created_at'     => $this->request->getPost('created_at')
            ];

            if ($this->validate($model->validationRulesUpdate, $model->validationMessagesUpdate)) {
                $updated = $model->update($stock_id, $data);

                if ($updated) {
                    return redirect()->to('/stock')->with('success', 'Stock mis à jour avec succès');
                } else {
                    return redirect()->back()->with('error', 'La mise à jour du stock a échoué.')->withInput();
                }
            }

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

        //dd($this->request->getPost());
    
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

        $data = [
            'stocks' => $stocks,
            'logo_path' => FCPATH . 'assets/images/logo/logo.png',
        ];

        $html = view('pdf/stock_list', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        $fileName = 'stock_list.pdf';
        $dompdf->stream($fileName, ["Attachment" => true]);
    }

    public function filterByDate()
    {
        $request = service('request');
        $startDate = $request->getPost('start_date');
        $shop_id = $request->getPost('shop_id');

        $produitModel = new Out();
        $outModel = new Out(); 
        $productModel = new Product(); 
        $stockModel = new Stock(); 
        $model = new Stock();
        $modelProduct = new Product();
        $modelShop = new Shop();
        $outModel = new Out(); 

        $data['stocksOuts'] = $model->getAllStocksWithProducts();
        $data['products'] = $modelProduct->findAll();
        $data['shops'] = $modelShop->findAll();
        $data['outs'] = $outModel->orderBy('id', 'DESC')->paginate(10, 'outs');
        $data['pager'] = $outModel->pager;

        $data['shop'] = $modelShop->getShopWithUserById($shop_id);
        $data['products'] = $productModel->findAll();
        $data['search'] = '';


        $data['stocks'] = $model->getAllStocksWithProducts('', 10);

        if ($startDate) {
            $startDate = new DateTime($startDate);
            $outs = $produitModel->where('DATE(created_at)', $startDate->format('Y-m-d'))->findAll();
        } else {
            $outs = $produitModel->findAll();
        }
        $data['outs'] = $outs;
        // Retourner la vue avec les résultats filtrés
        return view('content/crud/stock',  $data);
    }

    public function filterOuts() {
        $filterType = $this->request->getPost('filter');

        $shop_id = $this->request->getPost('shop_id');

        $outModel = new Out(); 
        $productModel = new Product(); 
        $stockModel = new Stock(); 
        $model = new Stock();
        $modelProduct = new Product();
        $modelShop = new Shop();
        $outModel = new Out(); 

        $data['stocksOuts'] = $model->getAllStocksWithProducts();
        $data['products'] = $modelProduct->findAll();
        $data['shops'] = $modelShop->findAll();
        $data['outs'] = $outModel->orderBy('id', 'DESC')->paginate(10, 'outs');
        $data['pager'] = $outModel->pager;

        $data['shop'] = $modelShop->getShopWithUserById($shop_id);
        $data['search'] = '';

        $data['stocks'] = $model->getAllStocksWithProducts('', 10);
        
        $outModel = new Out();
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

        $data['outs'] = $outs;

        // Retourner la vue avec les résultats filtrés
        return view('content/crud/stock', $data);
    }

    
}