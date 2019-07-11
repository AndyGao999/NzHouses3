<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Photo;
use App\House;
use Intervention\Image\Facades\Image;
class PhotosController extends Controller
{
    public function show(House $house) {
        $photos=$house->photos;
        return view('/photos/show',compact('photos','house'));

     }


    public function delete (Photo $photo){
        $photo->delete();
    }


       public function update (Photo $photo){

           $photos=$photo->house->photos;


           foreach ($photos as $photoMain) {
                if ($photoMain->main_image==1) {

                   $photoMain->update([
                       'main_image'=>2,
                   ]);
                }
           };
           $photo->update([
               'main_image'=>1,
           ]);



       }



       public function addMorePhotos (){

          $i=20;

        foreach (request('images') as $image) {
           $data=request()->validate([
               'image'=>['fiel','image',],
               'house_id'=>[],
           ]);

           $imagePath=$image->store('uploads','public');
           $imageSave=Image::make(public_path("/storage/$imagePath"))->fit(1200,600);
            $imageSave->save();

           $imageMiniPath=$image->store('uploadsMini','public');
           $imageMini=Image::make(public_path("/storage/$imageMiniPath"))->fit(500,500);
            $imageMini->save();
               $i++;
           Photo::create([
               'house_id'=>$data['house_id'],
               'images'=>$imagePath,
               'images_mini'=>$imageMiniPath,
               'main_image'=>$i,
           ]);
        }
        return redirect('/photos/'.request('house_id')) ;
       }


}
