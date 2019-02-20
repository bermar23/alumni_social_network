@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="row">        
            <h3 class="display-4">{{ $headline->title }}</h3>

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
        </div>
        <br>
        <div class="row">
        <div class="col-sm-8 offset-2">
            @if(Storage::disk('local')->has("images/headlines/".$headline->featured_photo))
            <img class="img-fluid"  src="{{ route('headlines.image', ['filename' => $headline->featured_photo]) }}" alt="Generic placeholder image">
            @endif
        </div>
        </div>
        <br>
        <div class="row">
            <blockquote class="blockquote text-left">
                <p class="mb-0">{{ $headline->body }}</p>
                <footer class="blockquote-footer">{{ $author->first_name }} {{ $author->last_name }} - <cite title="Source Title">{{ $author->created_at }}</cite></footer>
            </blockquote>        
        </div>
        <br>
        <div class="row">        
            <h3 class="display-5">{{ _('Comments') }}</h3>

        </div>
        <br>
        <br>
        <br>
        <br>
    </div>    
</div>
@endsection
