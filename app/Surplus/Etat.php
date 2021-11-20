<?php

namespace App;

use App\Models\Pay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Etat extends Model
{
    public function pay(){
        return $this->belongsTo(Pay::class);
    }
    
}
