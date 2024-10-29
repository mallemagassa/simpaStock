<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Report;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{
    public function index()
    {
        $model = new Report();

        $data['ins'] = $model->getReportsWithDetails('e');
        $data['outs'] = $model->getReportsWithDetails('s');
        return view('content/crud/reports', $data);
    }

    public function delete($id)
    {
        $model = new Report();
    
        $shop = $model->find($id);
        
        if ($shop) {
            if ($model->delete($id)) {
                return redirect()->to('/reports')->with('success', 'Produit supprimé avec succès.');
            } else {
                return redirect()->to('/reports')->with('error', 'Une erreur s\'est produite lors de la suppression du produit.');
            }
        } else {
            return redirect()->to('/reports')->with('error', 'Produit introuvable.');
        }
    }
}
