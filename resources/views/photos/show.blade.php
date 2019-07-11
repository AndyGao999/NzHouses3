@extends('/layouts/app')
@section('content')



@foreach($photos as $photo)

@guest
@else
@if(auth()->user()->id==$house->user_id)

<photo-manage photo-id="{{$photo->id}}"  photo-image="/storage/{{$photo->images}}" main-check="{{$photo->main_image==1}}" ></photo-manage>

@endif
@endguest
@endforeach

<div class="text-center">
    <a href="/houses/myHouses"> Back To My Houses</a>
</div>

<hr>
<div class="mt-2">
        <form  method="POST" enctype="multipart/form-data" action="/photos/">
            @csrf


        <input id="house_id" name="house_id" value="{{$house->id}}" hidden>



       <div class="form-group row">
           <div class="col-md-4"></div><div class="col-md-6"><small>Can upload Multi images. Hold"Control"or "Command"key Pls</small></div>
<label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

<div class="col-md-6">
   <input id="images" type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple >

   @error('images')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
   @enderror
</div>
</div>







               <div class="form-group row mb-0">
                   <div class="col-md-6 offset-md-4">
                       <button type="submit" class="btn btn-primary">
                           Add Photos
                       </button>
                   </div>
               </div>
           </form>



</div>




@endsection
