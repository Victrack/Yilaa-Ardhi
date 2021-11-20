<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Arrondissement extends Model
{
    use HasFactory;
    public function commune(){
        return $this->belongsTo(Commune::class);
    }

    public function village()
    {
        return $this->hasOne('Village', 'arrondissement');
    }
}
