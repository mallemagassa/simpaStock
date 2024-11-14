<?php
namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\Unit;
use App\Models\Product;
use CodeIgniter\Controller;
use App\Models\Notification;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new Product();
        $modelUnit = new Unit();

        $search = $this->request->getVar('search');
        $perPage = 10;

        $data['products'] = $model->getAllProductsWithUnits($search, $perPage);
        $data['units'] = $modelUnit->findAll();
        $data['pager'] = $model->pager;
        $data['search'] = $search;

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


    public function exports()
    {
        $stock = new Product();
        $stocks = $stock->getAllProductsWithUnits();
    
        $file = FCPATH . 'stock.xlsx';
    
        $spreadSheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Nom');
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Code');
        $sheet->setCellValue('D1', 'Unitee');
        $sheet->setCellValue('H1', 'Date Creation');
    
        foreach ($stocks as $i => $value) {
            $row = $i + 2;
            $sheet->setCellValue('A' . $row, $value['name']);
            $sheet->setCellValue('B' . $row, $value['description']);
            $sheet->setCellValue('C' . $row, $value['code']);
            $sheet->setCellValue('D' . $row, $value['unit_name']);
            $sheet->setCellValue('E' . $row, date('d/m/Y', strtotime($value['created_at'])));
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
        $product = new Product();
        $stocks = $product->getAllProductsWithUnits();

        $data = [
            'stocks' => $stocks,
            'logo_path' => FCPATH . 'assets/images/logo/logo.png' // Mettez le chemin vers votre logo
        ];

        $html = view('pdf/product_list', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $fileName = 'product_list.pdf';
        $dompdf->stream($fileName, ["Attachment" => true]);
    }

    
}
