<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App;
use App\School;

class SchoolsController extends Controller
{
    public function edit(House $house){

        return view('/schools/edit',compact('house'));


    }

    public function store (House $house){
        $data=request()->validate([
            'house_id'=>['required'],
            'name'=>['required'],
            'school_type'=>['required'],
            'zone'=>['required'],
        ]);

                School::create($data);

        return redirect('/schools/'.$data['house_id'].'/edit');

    }


        public function delete(School $school){
            $school->delete();
        }

}
