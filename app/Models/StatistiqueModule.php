<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistiqueModule extends Model{
    protected $fillable = [
        'module_id', 'nom', 'nombre', 'icons', 'description'
    ];

    protected $table = 'statistiques_modules';

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
