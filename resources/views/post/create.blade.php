@extends('/layouts/app')
@section('content')


<form method="POST" enctype="multipart/form-data" action="/post">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-2">
                                 <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" >
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="">Category</option>
                                    <option value="latestNews">Latest News</option>
                                    <option value="buying">Buying</option>
                                    <option value="selling">Selling</option>
                                </select></div>
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                     <div class="col-md-7">

                     <textarea rows="8" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>{{old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">

        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

        <div class="col-md-7">
            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image_title" class="col-md-4 col-form-label text-md-right">{{ __('Image Title') }}</label>
           <div class="col-md-7">
              <input id="image_title" type="text" class="form-control @error('image_title') is-invalid @enderror" name="image_title" value="{{ old('image_title') }}" required autocomplete="image_title" autofocus>

              @error('image_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
        <label for="writer" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>
           <div class="col-md-7">
           <input id="writer" type="text" class="form-control @error('writer') is-invalid @enderror" name="writer" value="{{auth()->user()->name??'Admin'}} " required autocomplete="writer" autofocus>

              @error('writer')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                    @endsection
