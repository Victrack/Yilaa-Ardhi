<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    use HasFactory;
    public function pay(){
        return $this->belongsTo(Pay::class);
    }

    public function departement()
    {
        return $this->hasOne('Departement', 'etat');
    }

}
