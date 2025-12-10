<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetEntreprisePartenaire extends Model
{
    protected $table = 'projet_entreprise_partenaire';

    protected $fillable = [
        'module_id', 'projet_id',
        'entreprise_id', 'partenaire_id',
        'date_debut', 'date_fin'
    ];
}
