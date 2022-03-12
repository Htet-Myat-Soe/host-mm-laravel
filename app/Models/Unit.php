<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = "units";

    public function units(){
        return $this->belongsToMany(Item::class,"item_units");
    }
}
