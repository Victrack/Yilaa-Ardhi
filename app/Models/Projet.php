<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function etatProjet()
    {
        return $this->hasOne('EtatProjet', 'projet');
    }

    public function terrainProjet()
    {
        return $this->hasOne('TerrainProjet', 'projet');
    }

    public function promoteur()
    {
        return $this->hasOne('Promoteur', 'projet');
    }

}
