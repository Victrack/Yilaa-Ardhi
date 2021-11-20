<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerrainProjet extends Model
{
    use HasFactory;

    public function projet(){
        return $this->belongsTo(Projet::class);
    }

    public function terrain(){
        return $this->belongsTo(Terrain::class);
    }
}
