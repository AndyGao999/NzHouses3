<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\House;
use App\Photo;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Post;
use App;





class HousesController extends Controller
{


    public function create(){

        return view('/houses/create');
    }

    public function index(){

       $houses=House::orderBy('created_at','desc')->paginate(9);
       $posts=Post::latest()->paginate(8);

       return view('/houses/index',compact('houses','posts'));
    }




    public function store(){

        $data=Request()->validate([
            'title'=>['required','unique:houses','Min:12','string'],
            'location'=>['required'],
            'rooms'=>['required'],
            'price'=>['required'],
            'parking'=>['required'],
            'open_home'=>['required'],
            'qv'=>['required'],
            'land_size'=>['required'],
            'description'=>['required'],
        ]);

           $house= House::create([
                'user_id'=>auth()->user()->id,
                'title'=>$data['title'],
                'location'=>$data['location'],
                'rooms'=>$data['rooms'],
                'price'=>$data['price'],
                'parking'=>$data['parking'],
                'open_home'=>$data['open_home'],
                'land_size'=>$data['land_size'],
                'qv'=>$data['qv'],
                'description'=>$data['description'],
            ]);

            $i=0;

            if(Request('images')) {
             foreach(Request('images') as $image)  {

                 $imagePath=$image->store('uploads','public');
                 $imageSave=Image::make(public_path("storage/{$imagePath}"))->fit(1200,600);
                $imageSave->save();

                $imageMiniPath=$image->store('uploadsMini','public');
                $imageMini=Image::make(public_path("storage/{$imageMiniPath}"))->fit(500,500);
                $imageMini->save();


                 $i+=1;

               Photo::Create([
                'house_id'=>$house['id'],
                'images'=>$imagePath,
                'images_mini'=>$imageMiniPath,
                'main_image'=>$i,
               ]);
            }
        }

        $houses=House::orderBy('created_at','desc')->paginate(9);
        $posts=Post::latest()->paginate(8);

                return view ('/houses/index',compact('houses','posts'));

    }

         public function show(House $house){


                     $watchLists=(auth()->user())?auth()->user()->watching->contains($house->id):false;
                  $housesRecommend=House::where('location',$house->location)->limit(6)->get();

            return view ('/houses/show',compact('house','watchLists','housesRecommend'));

         }

           public function edit(House $house){
             return view ('/houses/edit',compact('house'));
           }

          public function update(House $house){


            $data=Request()->validate([
                'id'=>[],
                'title'=>['required','Min:12','string'],
                'location'=>['required'],
                'rooms'=>['required'],
                'price'=>['required'],
                'parking'=>['required'],
                'open_home'=>['required'],
                'qv'=>['required'],
                'land_size'=>['required'],
                'description'=>['required'],
            ]);


              $house->update($data);


              return redirect('/photos/'.$house->id);


          }

          public function myHouses(){
                  $houses=House::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(9);
                    return view('/houses/myHouses',compact('houses'));
          }

          public function watching(){

           $houses= auth()->user()->watching;


            return view('/houses/watching',compact('houses'));
          }

}




