<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proprietaire extends Model
{
    use HasFactory;
    public function terrain()
    {
        return $this->hasOne('Terrain', 'proprietaire');
    }
}
