<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    protected $fillable = ['module_id', 'nom', 'description'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function entreprises()
    {
        return $this->belongsToMany(Entreprise::class, 'entreprise_domaine');
    }
}
