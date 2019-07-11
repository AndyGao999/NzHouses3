@extends('/layouts/app')

@section('title','Home Houses Sales')
@section('content')

<div class="container bg-light">


    <div class="row col-md-12">
<div class="col-md-10">


    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">







                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                  <!--First slide-->

                  <div class="carousel-item  active">
                        <div class="row col-md-12" {{$i=0}}>

                                @foreach ($housesBanner as $houseBanner)
                                @foreach ($houseBanner->photos as $photoBanner )
                                @if($photoBanner->main_image==1)
                                @if ($i<3)


                    <div class="col-md-4">
                      <div class="card mb-4">
                      <a href="/houses/{{$houseBanner->id}}">
                        <img class="card-img-top"
                      src="/storage/{{$photoBanner->images_mini}}"
                          alt="{{$houseBanner->title}}"> </a>


                    <small>    <p class="card-text">   &nbsp; {{$houseBanner->title}}</p></small>


                      </div>
                    </div>

                        @else




       @if ($i==3)

                </div>
                  </div>
                  <!--/.First slide-->

                  <!--Second slide-->
                  <div class="carousel-item">
                        <div class="row col-md-12">
    @endif

                    <div class="col-md-4">
                      <div class="card mb-4">
                          <a href="{{$houseBanner->id}}">
                        <img class="card-img-top"
                      src="/storage/{{$photoBanner->images_mini}}" alt="{{$houseBanner->title}}">
                          </a>

                     <small>    <p class="card-text">  &nbsp;  {{$houseBanner->title}}</p></small>


                      </div>
                    </div>

    @endif

    <P hidden {{$i=$i+1}}></P>
    @endif
    @endforeach
    @endforeach



                  </div> </div>
                  <!--/.Second slide-->

                  <!--Third slide-->
                  <div class="carousel-item">
                        <div class="row col-md-12">

    @foreach($postsBanner as $postBanner)

                    <div class="col-md-4">
                      <div class="card mb-4">
                      <a href="/post/{{$postBanner->id}}">
                        <img class="card-img-top"
                      src="/storage/{{$postBanner->image_mini}}" alt="{{$postBanner->image_title}}">
                          </a>

                  <small>      <p class="card-text">  &nbsp; {{$postBanner->title}}</p> </small>


                      </div>
                    </div>


                    @endforeach



                </div>
                  </div>
                  <!--/.Third slide-->

                </div>
                <!--/.Slides-->

                <ol class="carousel-indicators " style="red">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active" style="background-color:orange;"></li>
                        <li data-target="#multi-item-example" data-slide-to="1" style="background-color:orange;"></li>
                        <li data-target="#multi-item-example" data-slide-to="2" style="background-color:orange;"></li>
                      </ol>
                      <!--/.Indicators-->




     <!--Indicators-->



        </div>
        <!--/.Carousel Wrapper-->

    </div>


<div class="col-md-2 text-warning">New User:
@foreach ($newUsers as $newUser)
<div class=" border-bottom text-info"> {{$newUser['name']}};</div>
@endforeach
</div>

    </div>








<hr>






<div class="row col-sm-12 " >
    <div class="col-sm-12 text-info"> <h5> Latest Houses Lists: </h5> </div>
    @foreach ($houses as $house)
    @foreach( $house->photos as $houseshow  )
@if($houseshow->main_image==1)
<div class="col-sm-4 mb-3 text-size-4 border-bottom"> <a href="/houses/{{$house->id}}">  <img src="/storage/{{ $houseshow->images_mini}}" width="100%" ></a><small> <div>{{ $house->title}}</div><div>{{$house->location}}</div><div>{{$house->rooms}} </div></small></div>

@endif


@endforeach
@endforeach

</div>
{{$houses->links()}}
<hr>
<div class="row col-sm-12 ">
        <div class="col-sm-12 text-info"> <h5>Latest News </h5></div>
        @foreach ($posts as $post)

        <div class="col-md-3 border-bottom"><a href="/post/{{$post->id}}"> <img src="/storage/{{$post->image_mini}}" class="w-100"> </a>{{$post->title}}   </div>
        @endforeach




</div>
<div>{{ $posts->links()}}</div>

</div>
@endsection
