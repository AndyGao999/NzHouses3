@extends('/layouts/app')
@section('title',$post->title)
@section('content')

<div class="container">
<div class="row col-md-12 bg-light">

<div class="col-md-9"><h3 class="text-center"> {{$post->title}}</h3><hr>
   <img src="/storage/{{$post->image}}" class="w-100">
  <small>  Image Caption : {{$post->image_title}} </small><br><br>
   <p> &nbsp; &nbsp;{{$post->description}}</p>

    <br><br>
<h6><small> Hits:{{$post->count}} </small></h6>
</div>


<div class="col-md-3">

   <h4> <strong>Latest News  </strong></h4>
   <br>
@foreach ($posts as $postNav)
<small> <div class="mb-2"> <a href="/post/{{$postNav->id}}"> {{$postNav->title}}</a>;</div></small>
@endforeach
<br>

<h4> <strong> Most Popular </strong></h4>
 @foreach ($postsRead as $postRead)
 <small> <div class="mb-2"><a href="/post/{{$postRead->id}}"> {{$postRead->title}}</a>;</div></small>
 @endforeach
</div>

</div>

</div>








@endsection
