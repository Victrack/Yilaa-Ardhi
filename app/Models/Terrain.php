<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;
    public function proprietaire(){
        return $this->belongsTo(Proprietaire::class);
    }

    public function hameau(){
        return $this->belongsTo(Hameau::class);
    }

    public function croqui()
    {
        return $this->hasOne('Croqui', 'terrain');
    }

    public function coordonnee()
    {
        return $this->hasOne('Coordonnee', 'terrain');
    }

    public function terrainProjet()
    {
        return $this->hasOne('TerrainProjet', 'terrain');
    }



}
