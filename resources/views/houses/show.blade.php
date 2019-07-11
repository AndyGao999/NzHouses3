@extends('/layouts/app')

@section('title',$house->title .'.Location:'.$house->location)
@section('content')

<div class="container">


<div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators" {{$i=0}} >

                @foreach ($house->photos as $photo)
        <li data-target="#demo" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}" style="background-color:orange;"></li  {{$i=$i+1}}>

                 @endforeach
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner" {{$t=0}}>
                @foreach ($house->photos as $photo)


          <div class="carousel-item {{$t==0?'active':''}} ">
          <img src="/storage/{{$photo->images}}"  width="100%" {{$t=$t+1}} >
          </div>
               @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>




    </div>
     <div class="container">
   <div class="row col-sm-12 bg-light botton-line">
   <div class=" col-9 text-primary mt-3"> <h3><strong>{{$house['title']}} </strong></h3> </div>
   <div class="col-sm-2 mt-3"><small>  <watching-button watchlists="{{$watchLists}}" house-id="{{$house->id}}"></watching-button> </small> </div>

   @guest

   @else
   @if(auth()->user()->id==$house->user_id)
   <div class="col-sm-1 mt-4"><h5> <a href="/houses/{{$house->id}}/edit">Edit</a> </h5></div>
   @endif
   @endguest





    <div class="col-sm-6"><strong>Location: </strong>{{$house->location}} </div><div class="col-sm-6"> <strong>Rooms: </strong>{{$house->rooms}}</div>
   <div class="col-sm-6"><strong>Land Size:</strong> &nbsp; {{$house->land_size}} </div><div class="col-sm-6"> <strong>Parking:</strong>  {{$house->parking}}  </div>
   <div class="col-sm-12"><strong>Open Home:</strong> {{$house->open_home}}</div>
   <div class="col-sm-12 mb-4 mt-2"> {{$house->description}}</div>
   <div class="col-sm-6 center"> <img class="w-50" src="/storage/default/{{$house->user->company_name}}.jpg"> <br> <img src="/storage/{{($house->user->image)?$house->user->image:'default/defaultProfile.jpg'}}" class="w-50"> </div>
   <div class="col-sm-6"> <br> <br>
        <div class="col-sm-12"><strong>Name:</strong> &nbsp;{{$house->user->name}} </div>
       <div class="col-sm-12"> <strong>Mobile:</strong> &nbsp;{{$house->user->mobile_phone}}</div>
     <div class="col-sm-12"><strong> Email:</strong> &nbsp;{{$house->user->email}}</div>
   </div>

<div class="col-sm-12 mt-3 border-bottom"> School Information:  &nbsp;

    @guest
    @else
    @if(auth()->user()->id==$house->user_id)
    <a href="/schools/{{$house->id}}/edit">Edit School </a>
    @endif
    @endguest </div>

<hr>
@foreach ($house->schools as $school)
<div class="col-md-5 border-bottom  "> School Name: &nbsp; <span class="text-info">{{$school->name}} </span></div>
        <div class="col-md-3  border-bottom">{{$school->school_type}}</div>
        <div class="col-md-2 border-bottom">{{$school->zone}}</div>
        <div class="col-md-2 border-bottom">
                @guest
                @else
                @if(auth()->user()->id==$house->user_id)
            <school-manage delete-id="{{$school->id}}" ></school-manage>
            @endif
            @endguest
        </div>
@endforeach


@guest
@else
@if(auth()->user()->id==$house->user_id)
<div class="container text-center mt-3"> <a href="/photos/{{$house->id}}">Edit Photos </a>
</div>
@endif
@endguest
   </div>
<hr>
<div class="col-md-12 mb-4 text-success"><h5> Recommend: </h5></div>
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">







        <!--Slides-->
        <div class="carousel-inner" role="listbox">

          <!--First slide-->

          <div class="carousel-item  active">
                <div class="row col-md-12" {{$i=0}}>

                        @foreach ($housesRecommend as $houseBanner)
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



        </div>
        <!--/.Slides-->

        <ol class="carousel-indicators " style="red">
                <li data-target="#multi-item-example" data-slide-to="0" class="active" style="background-color:orange;"></li>
                <li data-target="#multi-item-example" data-slide-to="1" style="background-color:orange;"></li>

              </ol>
              <!--/.Indicators-->




<!--Indicators-->



</div>
<!--/.Carousel Wrapper-->






</div>

</div>



@endsection

