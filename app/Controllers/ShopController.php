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
        $data['shops'] = $model->findAll();
        $data['units'] = $modelUnit->findAll();


        return view('content/crud/shop', $data);
    }

    public function create()
    {
        return view('shop/create');
    }

    // public function store()
    // {
    //     $model = new Shop();
    
    //     if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            
    //         $data = [
    //             'name'    => $this->request->getPost('name'),
    //             'respon'  => $this->request->getPost('respon'),
    //             'address' => $this->request->getPost('address'),
    //         ];

    //         $file = $this->request->getFile('logo_shop');
    
    //         if ($file && $file->isValid() && !$file->hasMoved()) {
    //             $newName = $file->getClientName();
    
    //             // Spécifier le chemin vers 'assets/images/boutique'
    //             $path = FCPATH . 'assets/images/boutique';
    
    //             // Déplacer le fichier vers ce chemin
    //             $file->move($path, $newName);
    
    //         } else {
    //             return  'Erreur lors du téléchargement de l\'image';
    //         }
    
    //         $model->save($data);
    
    //         return redirect()->to('/shop')->with('success', 'Boutique créée avec succès');
    //     }
    
    //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    // }

    public function store()
    {
        $model = new Shop();
    
        // Validation des autres champs
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            
            // Collecter les données du formulaire
            $data = [
                'name'    => $this->request->getPost('name'),
                'respon'  => $this->request->getPost('respon'),
                'address' => $this->request->getPost('address'),
            ];
    
            // Récupérer le contenu JSON du champ 'logo_shop'
            $logoShopData = $this->request->getPost('logo_shop');
    
            // Vérifier si 'logo_shop' contient des données et décoder la chaîne JSON
            if ($logoShopData) {
                $logoShopArray = json_decode($logoShopData, true);
    
                if (json_last_error() === JSON_ERROR_NONE) {
                    // Récupérer l'ID du fichier temporaire
                    $tempFileId = $logoShopArray['id'];
    
                    // Chemin complet vers le fichier temporaire
                    $tempPath = FCPATH . 'assets/images/tmp/' . $tempFileId;
    
                    // Vérification si le fichier temporaire existe
                    if (file_exists($tempPath)) {
                        // Générer un nouveau nom pour le fichier
                        $newName = uniqid() . '_' . $tempFileId;
    
                        // Définir le chemin final pour le fichier
                        $finalPath = FCPATH . 'assets/images/boutique/' . $newName;
    
                        // Déplacer le fichier temporaire vers le répertoire final
                        rename($tempPath, $finalPath);
    
                        // Ajouter le chemin du fichier dans les données à sauvegarder
                        $data['logo_shop'] = 'assets/images/boutique/' . $newName;
                    } else {
                        return redirect()->back()->with('error', 'Fichier temporaire introuvable.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Erreur lors du décodage des données JSON.');
                }
            }
    
            // Enregistrer les données dans la base de données
            $model->save($data);
    
            // Rediriger vers la page des boutiques avec un message de succès
            return redirect()->to('/shop')->with('success', 'Boutique créée avec succès');
        }
    
        // Si la validation échoue, retourner en arrière avec les erreurs
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    

    // public function store()
    // {
    //     $model = new Shop();

    //     dd($this->request->getFile('logo_shop'));
    //     if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            
    //         $data = [
    //             'name'    => $this->request->getPost('name'),
    //             'respon'  => $this->request->getPost('respon'),
    //             'address' => $this->request->getPost('address'),
    //         ];


    //         $file = $this->request->getFile('logo_shop');

    //         if ($file && $file->isValid() && !$file->hasMoved()) {
    //             $newName = $file->getRandomName();

    //             $path = FCPATH . 'assets/images/boutique';

    //             // Déplacer le fichier vers ce chemin
    //             $file->move($path, $newName);

    //             $data['logo_shop'] = 'assets/images/boutique/' . $newName;
    //         } else {
    //             return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image');
    //         }

    //         $model->save($data);

    //         return redirect()->to('/shop')->with('success', 'Boutique créée avec succès');
    //     }

    //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    // }

    

    // public function tmpUpload(){
    //     $file = $this->request->getFile('logo_shop');
    
    //     if ($file && $file->isValid() && !$file->hasMoved()) {
    //         $newName = $file->getClientName();

    //         // Spécifier le chemin vers 'assets/images/boutique'
    //         $path = FCPATH . 'assets/images/boutique';

    //         // Déplacer le fichier vers ce chemin
    //         $file->move($path, $newName);

    //     } else {
    //         return  'Erreur lors du téléchargement de l\'image';
    //     }
    // }

    // public function tmpUpload()
    // {
    //     // Règles de validation pour le champ 'logo_shop'
    //     $validationRules = [
    //         'logo_shop' => 'uploaded[logo_shop]|is_image[logo_shop]|max_size[logo_shop,2048]|mime_in[logo_shop,image/jpg,image/jpeg,image/png]',
    //     ];

    //     // Messages d'erreur personnalisés
    //     $validationMessages = [
    //         'logo_shop' => [
    //             'uploaded'  => 'Vous devez télécharger une image.',
    //             'is_image'  => 'Le fichier téléchargé doit être une image.',
    //             'max_size'  => 'L\'image doit avoir une taille maximale de 2 Mo.',
    //             'mime_in'   => 'L\'image doit être au format jpg, jpeg ou png.'
    //         ]
    //     ];

    //     // Vérifier si la requête est valide en fonction des règles définies
    //     if (!$this->validate($validationRules, $validationMessages)) {
    //         // Si la validation échoue, retourner les erreurs
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     // Récupérer le fichier après la validation
    //     $file = $this->request->getFile('logo_shop');

    //     if ($file && $file->isValid() && !$file->hasMoved()) {
    //         // Utiliser le nom original du fichier
    //         $newName = $file->getClientName();

    //         // Spécifier le chemin vers 'assets/images/boutique'
    //         $path = FCPATH . 'assets/images/boutique';

    //         // Déplacer le fichier vers ce chemin
    //         if ($file->move($path, $newName)) {
    //             return 'Image téléchargée avec succès';
    //         } else {
    //             return 'Erreur lors du déplacement du fichier.';
    //         }
    //     } else {
    //         return 'Erreur lors du téléchargement de l\'image.';
    //     }
    // }

   public function tmpUpload()
{
    $file = $this->request->getFile('logo_shop');

    if ($file && $file->isValid()) {
        // Générer un nom temporaire pour le fichier
        $newName = $file->getRandomName();

        // Vérifier le chemin et les permissions
        if (!is_writable(FCPATH . 'assets/images/tmp')) {
            return $this->response->setStatusCode(400, 'Le répertoire temporaire n\'est pas accessible en écriture.');
        }

        // Déplacer le fichier vers un dossier temporaire
        if ($file->move(FCPATH . 'assets/images/tmp', $newName)) {
            // Retourner le nom temporaire du fichier comme réponse à FilePond
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

    // public function update()
    // {
    //     $model = new Shop();
        
    //     if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
    //         $data = [
    //             'name'           => $this->request->getPost('name'),
    //             'respon' => $this->request->getPost('respon'),
    //             'address'     => $this->request->getPost('address'),
    //             'logo_shop'    => $this->request->getPost('logo_shop'),
    //         ];
    
    //         $updated = $model->update($this->request->getPost('shop_id'), $data);
    
    //         if ($updated) {
    //             return redirect()->to('/shop')->with('success', 'Produit mis à jour avec succès');
    //         } else {
    //             return redirect()->back()->with('error', 'La mise à jour du produit a échoué.')->withInput();
    //         }
    //     }

    //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    // }



    public function update($id)
    {
        $model = new Shop();

        // Trouver l'entrée existante par son ID
        $existingShop = $model->find($id);

        if (!$existingShop) {
            return redirect()->back()->with('error', 'Boutique non trouvée.');
        }

        // Validation des autres champs
        if ($this->request->getMethod() === 'post' && $this->validate($model->validationRules, $model->validationMessages)) {
            
            // Collecter les données du formulaire
            $data = [
                'name'    => $this->request->getPost('name'),
                'respon'  => $this->request->getPost('respon'),
                'address' => $this->request->getPost('address'),
            ];

            // Récupérer le contenu JSON du champ 'logo_shop'
            $logoShopData = $this->request->getPost('logo_shop');

            // Vérifier si 'logo_shop' contient des données et décoder la chaîne JSON
            if ($logoShopData) {
                $logoShopArray = json_decode($logoShopData, true);

                if (json_last_error() === JSON_ERROR_NONE) {
                    // Récupérer l'ID du fichier temporaire
                    $tempFileId = $logoShopArray['id'];

                    // Chemin complet vers le fichier temporaire
                    $tempPath = FCPATH . 'assets/images/tmp/' . $tempFileId;

                    // Vérification si le fichier temporaire existe
                    if (file_exists($tempPath)) {
                        // Générer un nouveau nom pour le fichier
                        $newName = uniqid() . '_' . $tempFileId;

                        // Définir le chemin final pour le fichier
                        $finalPath = FCPATH . 'assets/images/boutique/' . $newName;

                        // Déplacer le fichier temporaire vers le répertoire final
                        rename($tempPath, $finalPath);

                        // Supprimer l'ancien logo s'il existe
                        if (!empty($existingShop['logo_shop']) && file_exists(FCPATH . $existingShop['logo_shop'])) {
                            unlink(FCPATH . $existingShop['logo_shop']);
                        }

                        // Ajouter le chemin du nouveau fichier dans les données à sauvegarder
                        $data['logo_shop'] = 'assets/images/boutique/' . $newName;
                    } else {
                        return redirect()->back()->with('error', 'Fichier temporaire introuvable.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Erreur lors du décodage des données JSON.');
                }
            }

            // Mettre à jour les données dans la base de données
            $model->update($id, $data);

            // Rediriger vers la page des boutiques avec un message de succès
            return redirect()->to('/shop')->with('success', 'Boutique mise à jour avec succès');
        }

        // Si la validation échoue, retourner en arrière avec les erreurs
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
