<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\House;


class WatchingController extends Controller
{
    public function store (House $house) {
       

        return  auth()->user()->watching()->toggle($house);
    }
}
