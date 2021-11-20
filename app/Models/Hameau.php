<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hameau extends Model
{
    use HasFactory;
    public function village(){
        return $this->belongsTo(Village::class);
    }

    public function terrain()
    {
        return $this->hasOne('Terrain', 'hameau');
    }
}
