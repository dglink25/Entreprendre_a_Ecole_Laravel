<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $fillable = ['module_id', 'nom', 'logo', 'description'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
