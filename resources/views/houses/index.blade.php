@extends('/layouts/app')

@section('title','Houses in NZ Auckland')
@section('content')
<div class="container bg-light">








<div class="row col-sm-12 " >
    <div class="col-sm-12 text-info"> <h5> Latest Houses Lists: </h5> </div>
    @foreach ($houses as $house)
    @foreach( $house->photos as $houseshow  )
@if($houseshow->main_image==1)
<div class="col-sm-4 mb-3 text-size-4 border border-bottom-1"> <a href="/houses/{{$house->id}}">  <img src="/storage/{{ $houseshow->images_mini}}" width="100%" ></a><small> <div>{{ $house->title}}</div><div>{{$house->location}}</div><div>{{$house->rooms}} </div></small></div>

@endif


@endforeach
@endforeach

</div>
{{$houses->links()}}
<hr>
<div class="row col-sm-12 ">
        <div class="col-sm-12 text-info"> <h5>Latest News </h5></div>
        @foreach ($posts as $post)

        <div class="col-md-3"><a href="/post/{{$post->id}}"> <img src="/storage/{{$post->image_mini}}" class="w-100"> </a>{{$post->title}}   </div>
        @endforeach




</div>
<div>{{ $posts->links()}}</div>

</div>
@endsection
