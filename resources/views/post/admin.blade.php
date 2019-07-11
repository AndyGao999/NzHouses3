@extends('/layouts/app')
@section('title','News in Properties Market')
@section('content')

<div class="container">
<div class="row col-md-12">

    <div class="col-md-12 text-center"><a href="/post/create"> Add News</a></div>
    @foreach ($posts as $post)

<div class="col-md-4"><a href="/post/{{$post->id}}/edit"> <img src="/storage/{{$post->image_mini}}" class="w-100"> </a>{{$post->title}}
<br>  <div class="row">
<div class="col-md-3">
  <a href="/post/{{$post->id}}/edit"> <button class="btn btn-primary">Edit</button></a> </div> &nbsp;  &nbsp;  &nbsp;<div class="col-md-3"> <form action="/post/{{$post->id}}" method="POST">@method('delete') @csrf <button class="btn btn-primary"> delete</button></form></div>
</div>
</div>

@endforeach


</div>
<div>{{ $posts->links()}}</div>
</div>









@endsection
