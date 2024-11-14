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
        
        
        $data['users'] = $userModel->findAll();

        $user = auth()->user();

        if ($user->inGroup('boutiquier')) {
            
            $data['shops'] = $model->getShopsWithUsers($user->id);
        }
        else{
            $data['shops'] = $model->getShopsWithUsers();
        }

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

    
    // public function show($id)
    // {

    //     $shopModel = new Shop(); 
    //     $outModel = new Out(); 
    //     $productModel = new Product(); 
    //     $stockModel = new Stock(); 
    //     $model = new Stock();
    //     $modelProduct = new Product();
    //     $modelShop = new Shop();
    //     $outModel = new Out(); 

    //     $data['stocksOuts'] = $model->getAllStocksWithProducts();
    //     $data['products'] = $modelProduct->findAll();
    //     $data['outs'] = $outModel->orderBy('id', 'DESC')->paginate(10, 'outs');
    //     $data['pager'] = $outModel->pager;
        
    //     $user = auth()->user();
        
    //     if ($user->inGroup('boutiquier')) {
            
    //         //$data['shops'] = $modelShop->findAll();
    //         //if ($modelShop->getShopsWithUsers($user->id)) {
    //             # code...
    //             $data['shops'] = $modelShop->getShopsWithUsers($user->id);
    //             $data['shop'] = $shopModel->getShopWithUserById($id);
    //         //}
    //         //redirect()->to('/shop')->with('success', 'Vous n\'etes pas permit');
    //     }
    //     else{
    //         $data['shops'] = $model->getShopsWithUsers();
    //         $data['shop'] = $shopModel->getShopWithUserById($id);
    //     }

    //     $data['products'] = $productModel->findAll();
    //     $data['stocks'] = $stockModel->findAll();
    
    //     if (!$data['shop']) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Boutique non trouvée');
    //     }

    //     $data['outs'] = $outModel->where('shop_id', $id)->findAll();
    
    //     return view('content/crud/shop/shop_detail', $data);
    // }


    public function show($id)
    {
        $shopModel = new Shop();
        $outModel = new Out();
        $productModel = new Product();
        $stockModel = new Stock();
        $user = auth()->user();

        // Vérifie si le rôle est "boutiquier"
        if ($user->inGroup('boutiquier')) {
            // Récupère les boutiques spécifiques à l'utilisateur
            $data['shops'] = $shopModel->getShopsWithUsers($user->id);
            $data['shop'] = $shopModel->getShopWithUserById($id);

            // Si la boutique ne fait pas partie des boutiques de l'utilisateur
            if (!$data['shop'] || $data['shop']['user_id'] != $user->id) {
                return redirect()->to('/shop')->with('error', 'Vous n\'avez pas accès à cette boutique.');
            }
        } else {
            // Récupère toutes les boutiques pour les autres rôles
            $data['shops'] = $shopModel->getShopsWithUsers();
            $data['shop'] = $shopModel->getShopWithUserById($id);
        }

        // Récupère les autres données
        $data['stocksOuts'] = $stockModel->getAllStocksWithProducts();
        $data['products'] = $productModel->findAll();
        $data['outs'] = $outModel->where('shop_id', $id)->orderBy('id', 'DESC')->paginate(10, 'outs');
        $data['pager'] = $outModel->pager;
        $data['stocks'] = $stockModel->findAll();

        if (!$data['shop']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Boutique non trouvée');
        }

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
