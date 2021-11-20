<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Promoteur extends Model
{
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
}
