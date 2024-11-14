<?php

namespace App\Controllers;

use DateTime;
use Dompdf\Dompdf;
use App\Models\Out;
use App\Models\Shop;
use App\Models\Stock;
use App\Models\Report;
use App\Models\Product;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class OutController extends BaseController
{
    public function update($outId)
    {
        $model = new Stock();
        $shopModel = new Shop();
        $outModel = new Out();
        $reportModel = new Report();

        if ($this->request->getMethod() === 'post') {
            $waybills = $this->request->getPost('waybill');
            $profit = $this->request->getPost('profit');
            $shopId = $this->request->getPost('shop_id');
            $amount_total_sale = $this->request->getPost('amount_total_sale');
            $amount_total_purchase = $this->request->getPost('amount_total_purchase');
            $created_at = $this->request->getPost('created_at_out');
            $observation = $this->request->getPost('observation');
            $ref = $this->request->getPost('ref'); // Utiliser la référence passée en paramètre

            // Vérifier si l'enregistrement Out existe
            $existingOut = $outModel->find($outId);
            if (!$existingOut) {
                return redirect()->back()->withInput()->with('error', 'Bon de sortie introuvable.');
            }

            // Préparer les données pour la mise à jour dans Out
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

            // Mettre à jour l'enregistrement dans Out
            if (!$outModel->update($outId, $outData)) {
                log_message('error', 'Échec de la mise à jour dans Out: ' . json_encode($outModel->errors()));
                return redirect()->back()->withInput()->with('error', 'Erreur lors de la mise à jour du bon de livraison.' . json_encode($outModel->errors()));
            }

            // Récupérer les produits actuels associés à cet Out pour restaurer les quantités en stock
            $currentWaybills = json_decode($existingOut['product_out'], true);
            foreach ($currentWaybills as $item) {
                $stock = $model->find($item['stock_id']);
                if ($stock) {
                    // Rétablir la quantité en stock
                    $model->update($stock['id'], ['quantity' => $stock['quantity'] + (int)$item['quantity']]);
                }
            }

            // Mettre à jour les quantités avec les nouvelles données
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

            return redirect()->to('/stock')->with('success', 'Bon de sortie mis à jour avec succès.');
        }

        return redirect()->to('/stock')->with('error', 'Méthode non autorisée.');
    }

   
    
    public function delete($id)
    {
        $model = new Out();
    
        $out = $model->find($id);
        
        if ($out) {
            if ($model->delete($id)) {
                return redirect()->to('/stock')->with('success', 'Stock supprimé avec succès.');
            } else {
                return redirect()->to('/stock')->with('error', 'Une erreur s\'est produite lors de la suppression du stock.');
            }
        } else {
            return redirect()->to('/stock')->with('error', 'Stock introuvable.');
        }
    }


    public function exportWaybill($id)
    {
        $outI = new Out();
        $out = $outI->find($id);
        $shopModel = new Shop();
        $outP = json_decode($out['product_out']);

        $shop = $shopModel->find($out['shop_id']);

        $date = DateTime::createFromFormat('Y-m-d H:i:s', $out['created_at']);
        $formattedDate = $date ? $date->format('d/m/Y') : '';

        $totalAmount = array_sum(array_column($outP, 'amount_total'));

        $data = [
            'formatted_date' => $formattedDate,
            'products' => $outP,
            'total_amount' => $totalAmount,
            'ref' => $out['ref'],
            'logo_path' => FCPATH . 'assets/images/logo/logo.png'//base_url('assets/images/logo/logo.png')
        ];

        $html = view('pdf/waybill', $data);

        
        $dompdf = new Dompdf();
        
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $fileName = $shop['name'].'-'.$out['ref'].'.pdf';
        $dompdf->stream($fileName, array("Attachment" => true));
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

        if ($startDate) {
            $startDate = new DateTime($startDate);
            $outs = $produitModel->where('DATE(created_at)', $startDate->format('Y-m-d'))->findAll();
        } else {
            $outs = $produitModel->findAll();
        }
        $data['outs'] = $outs;
        // Retourner la vue avec les résultats filtrés
        return view('content/crud/shop/shop_detail',  $data);
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
        return view('content/crud/shop/shop_detail', $data);
    }

}
