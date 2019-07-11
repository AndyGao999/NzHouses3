<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App;
use App\Post;
use App\House;

class PostController extends Controller
{
    public function create (){
     $this->authorize('create',House::class);
        return view('/post/create');
    }

    public function store(){
        $this->authorize('create',House::class);
            $data=request()->validate([
                'title'=>['required','unique:posts','min:3'],
                'description'=>['required','min:5'],
                'category'=>['required'],
                'writer'=>['required'],
                'image'=>['required','file','mimes:jpg,png,jpeg,giv,svg','Max:2048'],
                'image_title'=>['required'],
            ]);

            $imagePath=request('image')->store('uploads','public');
                 $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,600);
                $image->save();

                $imageMiniPath=request('image')->store('uploadsMini','public');
                $image=Image::make(public_path("storage/{$imageMiniPath}"))->fit(500,500);
                $image->save();

               Post::create([
                   'title'=>$data['title'],
                   'description'=>$data['description'],
                   'image'=>$imagePath,
                   'image_mini'=>$imageMiniPath,
                   'image_title'=>$data['image_title'],
                   'category'=>$data['category'],
                   'writer'=>$data['writer'],
                   'count'=>1,
               ]);


        $posts=Post::latest()->paginate(12);
       return view('/post/index',compact('posts'));

  }

   public function index(){
       $posts=Post::latest()->paginate(12);
       return view('/post/index',compact('posts'));
   }
   public function admin(){
    $this->authorize('create',House::class);
    $posts=Post::latest()->paginate(12);
    return view('/post/admin',compact('posts'));
}



   public function edit (Post $post){
    $this->authorize('create',House::class);
       return view('/post/edit',compact('post'));
   }

     public function update(Post $post){
        $this->authorize('create',House::class);

            $data=request()->validate([
                'title'=>['required','min:3'],
                'description'=>['required','min:5'],
                'category'=>['required'],
                'writer'=>['required'],
                'image'=>['required','file','mimes:jpg,png,jpeg,giv,svg','Max:2048'],
                'image_title'=>['required']
            ]);

            $imagePath=request('image')->store('uploads','public');
                 $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,600);
                $image->save();

                $imageMiniPath=request('image')->store('uploadsMini','public');
                $image=Image::make(public_path("storage/{$imageMiniPath}"))->fit(500,500);
                $image->save();

               $post->update([
                   'title'=>$data['title'],
                   'description'=>$data['description'],
                   'image'=>$imagePath,
                   'image_mini'=>$imageMiniPath,
                   'image_title'=>$data['image_title'],
                   'category'=>$data['category'],
                   'writer'=>$data['writer'],

               ]);



        $posts=Post::latest()->paginate(12);
       return view('/post/index',compact('posts'));

     }


   public function show(Post $post){
       $post['count']=$post['count']+2;

     $post->update([
         'count'=>$post['count'],
     ]);

     $posts=Post::orderBy('created_at','desc')->limit(6)->get();
     $postsRead=Post::orderBy('count','desc')->limit(6)->get();
    return view('/post/show',compact('post','posts','postsRead'));
   }


   public function destroy(Post $post){
    $post->delete();
    $posts=Post::latest()->paginate(12);
    return view('/post/admin',compact('posts'));
   }

}
