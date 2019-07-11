<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<body>



<div class="container">



 <!--Carousel Wrapper-->
 <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">







        <!--Slides-->
        <div class="carousel-inner" role="listbox">

          <!--First slide-->

          <div class="carousel-item  active">
                <div class="row col-md-12" {{$i=0}}>

                        @foreach ($housesRecommand as $houseBanner)
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







