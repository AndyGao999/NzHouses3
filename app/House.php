<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class House extends Model
{

    
    protected $guarded=[];

    public function photos(){
        return $this->hasMany(Photo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function watched (){
        return $this->belongsToMany(User::class);
    }

    public function schools (){
        return $this->hasMany(School::class);
    }

}
