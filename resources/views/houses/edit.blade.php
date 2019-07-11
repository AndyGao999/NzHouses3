
@extends('/layouts/app')
@section('title','Houses in NZ Auckland')
@section('content')
<div class="text-center mb-3">
<a  href="/photos/{{$house->id}}"> <button role="button" class="btn btn-primary">
        Edit Photo
    </button></a>
</div>

<form method="POST"  action="/houses/{{$house->id}}">
    @method('PATCH')
    @csrf
<input value="{{$house->id}}" name="id" type="hidden">
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ??$house->title}}" required autocomplete="title" autofocus>

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>




    <div class="form-group row">
        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

        <div class="col-md-6">
            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location')??$house->location }}" required autocomplete="location" autofocus>

            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>



    <div class="form-group row">
        <label for="rooms" class="col-md-4 col-form-label text-md-right">{{ __('Rooms') }}</label>

        <div class="col-md-6">
        <input id="rooms" type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms" value="{{ old('rooms')??$house->rooms }}" required autocomplete="rooms" autofocus>

        @error('rooms')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
<label for="parking" class="col-md-4 col-form-label text-md-right">{{ __('Parking') }}</label>
 <div class="col-md-6">
    <input id="parking" type="text" class="form-control @error('parking') is-invalid @enderror" name="parking" value="{{ old('parking') ??$house->parking}}" required autocomplete="parking" autofocus>

    @error('parking')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="land_size" class="col-md-4 col-form-label text-md-right">{{ __('Land Size') }}</label>
   <div class="col-md-6">
      <input id="land_size" type="text" class="form-control @error('land_size') is-invalid @enderror" name="land_size" value="{{ old('land_size')??$house->land_size }}" required autocomplete="lnad_size" autofocus>

      @error('land_size')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>


<div class="form-group row">
<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
 <div class="col-md-6">
    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')??$house->price }}" required autocomplete="price" autofocus>

    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>




<div class="form-group row">
<label for="qv" class="col-md-4 col-form-label text-md-right">{{ __('QV') }}</label>
 <div class="col-md-6">
    <input id="qv" type="text" class="form-control @error('price') is-invalid @enderror" name="qv" value="{{ old('qv')??$house->qv }}" required autocomplete="qv" autofocus>

    @error('qv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="ope_nhome" class="col-md-4 col-form-label text-md-right">{{ __('Open Hoome') }}</label>
 <div class="col-md-6">
    <input id="open_home" type="text" class="form-control @error('open_home') is-invalid @enderror" name="open_home" value="{{ old('open_home') ??$house->open_home}}" required autocomplete="open_home" autofocus>

    @error('open_home')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>


<div class="form-group row">
<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
 <div class="col-md-6">

 <textarea rows="12" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')??$house->description }}" required autocomplete="description" autofocus> {{old('description')??$house->description}} </textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>






    <div class="form-group row mb-0">
        <div class="col-md-5 offset-md-4">
            <button type="submit" class="btn btn-primary">
             Edit
            </button>
        </div>


    <a href="/photos/{{$house->id}}"> <button role="button" class="btn btn-primary">
                    Edit Photo
                </button></a>
    </div>
</form>





@endsection
