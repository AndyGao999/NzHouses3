@extends('/layouts/app')
@section('content')


<form method="POST" enctype="multipart/form-data" action="/users/{{auth()->user()->id}}">
   @method('PATCH')
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name ?? old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>




    <div class="form-group row">
        <label for="licence_id" class="col-md-4 col-form-label text-md-right">{{ __('Licence ID') }}</label>

        <div class="col-md-6">
            <input id="licence_id" type="text" class="form-control @error('licence_id') is-invalid @enderror" name="licence_id" value="{{$user->licence_id ?? old('licence_id') }}" required autocomplete="licence_id" autofocus>

            @error('licence_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

        <div class="col-md-6">
            <select id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name"  value="$user->company_name" selected >
            <option value="Barfoot&Thompson" {{$user->company_name=='Barfoot&Thompson'?'selected':''}}>Barfoot&Thompson</option>
            <option value="Harcourts" {{$user->company_name=='BHarcourts'?'selected':''}}>Harcourts</option>
            <option value="RayWhite" {{$user->company_name=='RayWhite'?'selected':''}}>Ray White</option>
            <option value="Baylers" {{$user->company_name=='Baylers'?'selected':''}}>Baylers</option>
            <option value="LJHooker" {{$user->company_name=='LJHooker'?'selected':''}}>LJ Hooker</option>
            <option value="ApartmentSpecialists" {{$user->company_name=='ApartmentSpecialists'?'selected':''}}>Apartment Specialists</option>
            <option value="PrivateSale" {{$user->company_name=='PrivateSale'?'selected':''}}>Private Sale</option>
            <option value="Others" {{$user->company_name=='Others'?'selected':''}}>Others</option>
            </select>


            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mobile_phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Phone') }}</label>

        <div class="col-md-6">
        <input id="mobile_phone" type="text" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" value="{{ $user->mobile_phone??old('mobile_phone')}}" required autocomplete="mobile_phone" autofocus>

        @error('mobile_phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
<label for="landline" class="col-md-4 col-form-label text-md-right">{{ __('Landline') }}</label>
 <div class="col-md-6">
    <input id="landline" type="text" class="form-control @error('landline') is-invalid @enderror" name="landline" value="{{$user->landline ?? old('landline') }}" required autocomplete="landline" autofocus>

    @error('landline')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>


<div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
         <div class="col-md-6">
            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  >

            @error('landline')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>





    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
               Change
            </button>
        </div>
    </div>
</form>


@endsection
