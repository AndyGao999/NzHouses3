<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;

class School extends Model
{
    protected $guarded=[];


    public function house(){
        return $this->belongsTo(House::class);
    }
}
