<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatProjet extends Model
{
    use HasFactory;

    public function projet(){
        return $this->belongsTo(Projet::class);
    }

    public function etape(){
        return $this->belongsTo(Etape::class);
    }
}
