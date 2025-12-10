<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrepriseDomaine extends Model
{
    protected $table = 'entreprise_domaine';

    protected $fillable = [
        'module_id', 'domaine_id', 'entreprise_id'
    ];
}
