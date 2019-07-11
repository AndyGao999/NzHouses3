@extends('/layouts/app')
@section('title','News in Properties Market')
@section('content')

<div class="container">
<div class="row col-md-12">
    @foreach ($posts as $post)

<div class="col-md-4"><a href="/post/{{$post->id}}"> <img src="/storage/{{$post->image_mini}}" class="w-100"> </a>{{$post->title}}   </div>
@endforeach


</div>
<div>{{ $posts->links()}}</div>
</div>









@endsection
