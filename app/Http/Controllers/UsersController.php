<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\rerquest;

class UsersController extends Controller
{
    public function show(User $user){
    return view('users/show',compact('user'));
    }

  public function edit (User $user){
      return view('/users/edit',compact('user'));
  }

    public function update (User $user){
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'licence_id'=>['required','max:255'],
            'company_name'=>['required'],
            'mobile_phone'=>['required','Numeric'],
            'landline'=>['required','Numeric'],
            'image'=>[''],

        ]);



        if (request('image')){
            $imagePath=request('image')->store('uploads','public');
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(400,400);
            $image->save();

           auth()->user()->update([
            'name' => $data['name'],

            'licence_id'=>$data['licence_id'],
            'company_name'=>$data['company_name'],
            'mobile_phone'=>$data['mobile_phone'],
            'landline'=>$data['landline'],
            'image'=>$imagePath,

        ]);
    }     else {
        auth()->user()->update([
                'name' => $data['name'],

                'licence_id'=>$data['licence_id'],
                'company_name'=>$data['company_name'],
                'mobile_phone'=>$data['mobile_phone'],
                'landline'=>$data['landline'],



            ]);
          }

           return view('/users/show',compact('user'));


        }
}
