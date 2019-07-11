@extends('/layouts/app')
@section('content')

<div class="container">
<div class="row col-sm-12  ">
<div class="col-sm-6 text-right">Name: </div><div class="col-sm-6 text-left">{{auth()->user()->name}}</div>
<div class="col-sm-6 text-right">Email: </div><div class="col-sm-6 text-left">{{auth()->user()->email}}</div>
<div class="col-sm-6 text-right ">Mobile: </div><div class="col-sm-6 text-left">{{auth()->user()->mobile_phone}}</div>
<div class="col-sm-6 text-right">Landline: </div><div class="col-sm-6 text-left">{{auth()->user()->landline}}</div>
<div class="col-sm-6 text-right">Licence ID: </div><div class="col-sm-6 text-left">{{auth()->user()->licence_id}}</div>
<div class="col-sm-6 text-right">Company: </div><div class="col-sm-6 text-left">{{auth()->user()->company_name}}</div>
<div class="col-sm-6 text-right">Profile:</div><div class="col-sm-6 text-left"><img src="/storage/{{(auth()->user()->image)?auth()->user()->image:'default/defaultProfile.jpg'}}" width="200"></div>
<div class="col-sm-6 "></div><div class="mt-3"> <a href="/users/{{auth()->user()->id}}/edit"><button class="btn btn-primary btn-center ">Edit</button></a></div>
</div>


</div>


@endsection
