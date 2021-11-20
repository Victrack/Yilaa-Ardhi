<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    public function etat(){
        return $this->belongsTo(Etat::class);
    }

    public function commune()
    {
            return $this->hasOne('Commune', 'departement');
    }
}
