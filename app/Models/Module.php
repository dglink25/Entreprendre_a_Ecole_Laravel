<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model{
    protected $fillable = [
        'code', 'nom', 'courte_description', 'longue_description'
    ];

    protected $table = 'modules';

    public function statistiques()
    {
        return $this->hasMany(StatistiqueModule::class);
    }

    public function domaines()
    {
        return $this->hasMany(Domaine::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function partenaires()
    {
        return $this->hasMany(Partenaire::class);
    }

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }
}

