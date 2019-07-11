@extends('/layouts/app')
@section('content')

<div class="container">

    <div class="row col-md-12">
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
    </div>

               @guest
                @else
                @if(auth()->user()->id==$house->user_id)

<form action="/schools" method="post">
    @csrf
    <hr>
    <div class="row col-12 mt-4">

    <input name="house_id" value="{{$house->id}}" hidden>
    <div class="col-5"> School Name: &nbsp;<input name="name" id="name" >
         @error('name')
        <div> <strong> {{$message}}</strong></div>
      @enderror</div>
     <div class="col-3">
         <select id="school_type" name="school_type">
             <option value="">School Type </option>
             <option value="Primary">Primary </option>
             <option value="InterMediate"> InterMediate</option>
             <option value="Secondary">Secondary</option>
         </select>
        @error('school_type')
      <div> <strong> {{$message}}</strong></div>
    @enderror
    </div>
     <div class="col-2"> <input type="radio" name="zone" value="InZone" checked> InZone</div>
     <div class="col-2"> <input type="radio" name="zone" value="UnZoned"> Unzoned</div>
     <div class="col-12 text-center mt-4"> <button type="submit"  class="btn btn-primary">Add School</button></div>

     </div>
 </form>
       @endif
            @endguest
</div>

@endsection
