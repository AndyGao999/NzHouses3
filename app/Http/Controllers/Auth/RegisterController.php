<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/houses';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'licence_id'=>['required','max:255'],
            'company_name'=>['required'],
            'mobile_phone'=>['required','Numeric'],
            'landline'=>['required','Numeric'],
            'image'=>[''],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (request('image')){
            $imagePath=request('image')->store('uploads','public');
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'licence_id'=>$data['licence_id'],
            'company_name'=>$data['company_name'],
            'mobile_phone'=>$data['mobile_phone'],
            'landline'=>$data['landline'],
            'image'=>$imagePath,
            'password' => Hash::make($data['password']),
        ]);
    }     else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'licence_id'=>$data['licence_id'],
                'company_name'=>$data['company_name'],
                'mobile_phone'=>$data['mobile_phone'],
                'landline'=>$data['landline'],
                'image'=>0,

                'password' => Hash::make($data['password']),
            ]);
          }
    }
}
