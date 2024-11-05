<?php

namespace App\Validation;

class WaybillValidation
{
    public function validateWaybillsData(string $data): bool
    {
        // Convertir la chaîne JSON en tableau PHP
        $waybills = json_decode($data, true);
    
        // Vérifier si le JSON est invalide
        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }
    
        
        return true;
    }
    
}
