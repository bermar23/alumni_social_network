@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <h2>{{ __('New Post') }}</h2>
            
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
            
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control form-control-sm{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="" required autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>    

            <div class="form-group row">
                <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                <div class="col-md-6">
                    <textarea id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" rows="8" required></textarea>

                    @if ($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
            </div>          

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Featured Image') }}</label>
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control form-control-sm">
                </div>          
            </div>          

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-primary btn-sm">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>

    
</div>
@endsection
