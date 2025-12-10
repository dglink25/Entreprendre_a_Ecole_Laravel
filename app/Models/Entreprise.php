<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'module_id', 'nom', 'courte_description', 'longue_description',
        'mission', 'vision', 'fondateurs', 'date_debut_creation'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function domaines()
    {
        return $this->belongsToMany(Domaine::class, 'entreprise_domaine');
    }
}
