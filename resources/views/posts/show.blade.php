@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="row">        
            <h3 class="display-4">{{ $post->title }}</h3>

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

        @if(Storage::disk('local')->has("images/posts/".$post->featured_photo))
        <img class="rounded float-left" src="{{ route('posts.image', ['filename' => $post->featured_photo]) }}" alt="Generic placeholder image">
        @endif
        </div>
        <br>
        <div class="row">
            <blockquote class="blockquote text-left">
                <p class="mb-0">{{ $post->body }}</p>
                <footer class="blockquote-footer">{{ $author->first_name }} {{ $author->last_name }} - <cite title="Source Title">{{ $author->created_at }}</cite></footer>
            </blockquote>        
        </div>
        <br>
        <div class="row">        
            <h3 class="display-5">{{ _('Comments') }}</h3>

        </div>
    </div>    
</div>
@endsection
