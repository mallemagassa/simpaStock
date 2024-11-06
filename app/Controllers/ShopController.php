<?php
namespace App\Controllers;

use DateTime;
use Dompdf\Dompdf;
use App\Models\Out;
use App\Models\Shop;
use App\Models\Stock;
use App\Models\Product;
use App\Models\UserModel;
use Dompdf\Options;

class ShopController extends BaseController
{
    public function index()
    {
        $model = new Shop();
        $userModel = new UserModel();
        
        $data['shops'] = $model->getShopsWithUsers();
        $data['users'] = $userModel->findAll();

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
                'name'    => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'user_id'  => $this->request->getPost('user_id'),
            ];
    
            $logoShopData = $this->request->getPost('logo_shop');
    
            if ($logoShopData) {
                $logoShopArray = json_decode($logoShopData, true);
    
                if (json_last_error() === JSON_ERROR_NONE) {
                    $tempFileId = $logoShopArray['id'];
    
                    $tempPath = FCPATH . 'assets/images/tmp/' . $tempFileId;
    
                    if (file_exists($tempPath)) {
                        $newName = uniqid() . '_' . $tempFileId;
    
                        $finalPath = FCPATH . 'assets/images/boutique/' . $newName;
    
                        rename($tempPath, $finalPath);

                        $data['logo_shop'] = 'assets/images/boutique/' . $newName;
                    } else {
                        return redirect()->back()->with('error', 'Fichier temporaire introuvable.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Erreur lors du décodage des données JSON.');
                }
            }
    
            $model->save($data);
    
            return redirect()->to('/shop')->with('success', 'Boutique créée avec succès');
        }
    
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
   public function tmpUpload()
    {
        $file = $this->request->getFile('logo_shop');

        if ($file && $file->isValid()) {
            $newName = $file->getRandomName();

            if (!is_writable(FCPATH . 'assets/images/tmp')) {
                return $this->response->setStatusCode(400, 'Le répertoire temporaire n\'est pas accessible en écriture.');
            }

            if ($file->move(FCPATH . 'assets/images/tmp', $newName)) {
                return $this->response->setJSON([
                    'id' => $newName,
                    'name' => $file->getClientName(),
                ]);
            } else {
                return $this->response->setStatusCode(400, 'Erreur lors du déplacement du fichier vers le répertoire temporaire.');
            }
        }

        return $this->response->setStatusCode(400, 'Erreur lors du téléchargement du fichier.');
    }

    
    public function show($id)
    {
        $shopModel = new Shop(); 
        $outModel = new Out(); 
        $productModel = new Product(); 
        $stockModel = new Stock(); 
    
        $data['shop'] = $shopModel->getShopWithUserById($id);
        $data['products'] = $productModel->findAll();
        $data['stocks'] = $stockModel->findAll();
    
        if (!$data['shop']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Boutique non trouvée');
        }

        $data['outs'] = $outModel->where('shop_id', $id)->findAll();
    
        return view('content/crud/shop/shop_detail', $data);
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


    public function update($id)
    {
        $model = new Shop();
    
        $existingShop = $model->find($id);
    
        if (!$existingShop) {
            return redirect()->back()->with('error', 'Boutique non trouvée.');
        }

        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            
            $data = [
                'name'    => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'user_id'  => $this->request->getPost('user_id'),
            ];

            $logoShopData = $this->request->getPost('logo_shop');

            if ($logoShopData) {
    
                if ($this->isJson($logoShopData)) {
                    $logoShopArray = json_decode($logoShopData, true);
    
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $tempFileId = $logoShopArray['id'];
    
                        $tempPath = FCPATH . 'assets/images/tmp/' . $tempFileId;
    
                        if (file_exists($tempPath)) {
                            $newName = uniqid() . '_' . $tempFileId;
    
                            $finalPath = FCPATH . 'assets/images/boutique/' . $newName;
    
                            rename($tempPath, $finalPath);

                            if (!empty($existingShop['logo_shop']) && file_exists(FCPATH . $existingShop['logo_shop'])) {
                                unlink(FCPATH . $existingShop['logo_shop']);
                            }
    
                            $data['logo_shop'] = 'assets/images/boutique/' . $newName;
                        } else {
                            return redirect()->back()->with('error', 'Fichier temporaire introuvable.');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Erreur lors du décodage des données JSON.');
                    }
                } else {
                    $data['logo_shop'] = $logoShopData;
                }
            }
    
            $model->update($id, $data);
    
            return redirect()->to('/shop')->with('success', 'Boutique mise à jour avec succès');
        }
    
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }


    // public function exportToPDF($id)
    // {
    //     $outI = new Out();
    //     $out = $outI->find($id);
    //     $outP = json_decode($out['product_out']);
    
    //     $spreadSheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    //     $sheet = $spreadSheet->getActiveSheet();
    
    //     // Ajouter le logo dans l'en-tête à gauche
    //     $logoPath = FCPATH . '/assets/images/logo/logo.png'; // Chemin de votre logo
    //     $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('Logo');
    //     $drawing->setPath($logoPath);
    //     $drawing->setHeight(50);
    //     $drawing->setCoordinates('A1');
    //     $drawing->setWorksheet($sheet);
    
    //     // Créer un espace pour le logo
    //     $sheet->mergeCells('A1:B1'); // Fusionner A1 et B1 pour le logo
    
    //     // Titre à droite, avec soulignement
    //     $sheet->setCellValue('C1', 'Bordereau de Sortie'); // Titre
    //     $sheet->getStyle('C1')->getFont()->setBold(true)->setSize(16)->setUnderline(true);
    //     $sheet->getStyle('C1')->getAlignment()->setHorizontal('right');
    
    //     // Récupérer et afficher la date de sortie
    //     $date = DateTime::createFromFormat('Y-m-d H:i:s', $out['created_at']);
    //     if ($date) {
    //         $formattedDate = $date->format('d/m/Y');
    //         $sheet->setCellValue('A3', 'Date de sortie : ' . $formattedDate);
    //         $sheet->mergeCells('A3:C3');
    //         $sheet->getStyle('A3')->getAlignment()->setHorizontal('center');
    //     }
    
    //     // Définir les en-têtes des colonnes
    //     $headers = ['Quantité', 'Produit', 'Montant'];
    //     $columnLetter = 'A';
    //     foreach ($headers as $header) {
    //         $sheet->setCellValue($columnLetter . '4', $header);
    //         $sheet->getStyle($columnLetter . '4')->getFont()->setBold(true);
    //         $sheet->getStyle($columnLetter . '4')->getAlignment()->setHorizontal('center');
    //         $sheet->getStyle($columnLetter . '4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    //         $columnLetter++;
    //     }
    
    //     $totalAmount = 0;
    //     // Remplir les données
    //     foreach ($outP as $i => $value) {
    //         $row = $i + 5;
    //         $sheet->setCellValue('A' . $row, $value->quantity);
    //         $sheet->setCellValue('B' . $row, $value->product_name);
            
    //         $amount = $value->amount_total;
    //         $sheet->setCellValue('C' . $row, number_format($amount, 0, '.', ' ') . ' F CFA');
    //         $totalAmount += $amount;
    
    //         foreach (range('A', 'C') as $columnLetter) {
    //             $sheet->getStyle($columnLetter . $row)->getAlignment()->setHorizontal('center');
    //             $sheet->getStyle($columnLetter . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    //         }
    //     }
    
    //     // Ajouter une ligne pour le pied de tableau
    //     $footerRow = count($outP) + 5;
    //     $sheet->setCellValue('A' . $footerRow, 'Total');
    //     $sheet->setCellValue('C' . $footerRow, number_format($totalAmount, 0, '.', ' ') . ' F CFA');
    //     $sheet->mergeCells('A' . $footerRow . ':B' . $footerRow);
    //     $sheet->getStyle('A' . $footerRow)->getFont()->setBold(true);
    //     $sheet->getStyle('A' . $footerRow)->getAlignment()->setHorizontal('center');
    //     $sheet->getStyle('C' . $footerRow)->getFont()->setBold(true);
    //     $sheet->getStyle('C' . $footerRow)->getAlignment()->setHorizontal('center');
    
    //     // Ajuster la largeur des colonnes
    //     $sheet->getColumnDimension('A')->setWidth(25);
    //     $sheet->getColumnDimension('B')->setWidth(35);
    //     $sheet->getColumnDimension('C')->setWidth(25);
    
    //     // Générer le fichier PDF
    //     try {
    //         // Utiliser explicitement le writer PDF avec Mpdf
    //         $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadSheet);
            
    //         $fileName = 'bordereau.pdf';
    //         $filePath = FCPATH . $fileName;
    //         $writer->save($filePath);
    
    //         // Forcer le téléchargement du fichier PDF
    //         header("Content-Type: application/pdf");
    //         header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
    //         header("Content-Length: " . filesize($filePath));
    
    //         ob_clean();
    //         flush();
    //         readfile($filePath);
    //         unlink($filePath);
    //         exit;
    //     } catch (\Exception $e) {
    //         echo 'Erreur lors de la génération du PDF : ', $e->getMessage();
    //     }
    // }



    public function exportToPDF($id)
    {
        $outI = new Out();
        $out = $outI->find($id);
        $outP = json_decode($out['product_out']);

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
        
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $fileName = 'bordereau.pdf';
        $dompdf->stream($fileName, array("Attachment" => true));
    }

        // public function exportToPDF($id)
        // {
        //     $outI = new Out();
        //     $out = $outI->find($id);
        //     $outP = json_decode($out['product_out']);
    
        //     // Récupérer la date formatée
        //     $date = DateTime::createFromFormat('Y-m-d H:i:s', $out['created_at']);
        //     $formattedDate = $date ? $date->format('d/m/Y') : '';
    
        //     // Calculer le montant total
        //     $totalAmount = array_sum(array_column($outP, 'amount_total'));
    
        //     // Charger la vue et passer les données
        //     $data = [
        //         'formatted_date' => $formattedDate,
        //         'products' => $outP,
        //         'total_amount' => $totalAmount,
        //         'logo_path' => base_url('assets/images/logo/logo.png') // Chemin du logo
        //     ];
    
        //     // Charger la vue HTML
        //     $html = view('pdf/waybill', $data);
    
        //     // Charger Dompdf
        //     $dompdf = new Dompdf();
        //     $dompdf->set_option('isRemoteEnabled', true); // Permettre le chargement d'images à distance
    
        //     // Charger le HTML
        //     $dompdf->loadHtml($html);
    
        //     // (Facultatif) Configurer le format et la taille de la page
        //     $dompdf->setPaper('A4', 'portrait');
    
        //     // Rendre le PDF
        //     $dompdf->render();
    
        //     // Envoyer le fichier PDF au navigateur
        //     $fileName = 'bordereau.pdf';
        //     $dompdf->stream($fileName, array("Attachment" => true));
        // }
    
    
    
    

    
    
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
