@extends('/layouts/app')
@section('content')
<div class="container">
<div class="row col-sm-12 " >

        @if($houses->count()>0)

    @foreach ($houses as $house)
    @foreach( $house->photos as $houseshow  )
@if($houseshow->main_image==1)
<div class="col-sm-4 mb-3 text-size-4"> <a href="/houses/{{$house->id}}">  <img src="/storage/{{ $houseshow->images_mini}}" width="100%" ></a><small> <div>{{ $house->title}}</div><div>{{$house->location}}</div><div>{{$house->rooms}} </div></small></div>

@endif


@endforeach
@endforeach

@else

<H2 class="ml-8">Sorry You don't have list yet!</H2>
@endif

</div>
</div>
@endsection
