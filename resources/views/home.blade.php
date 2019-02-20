@extends('layouts.app')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($headlines as $key => $headline)
    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ ($key==0?'active':'') }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($headlines as $key => $headline)
    <div class="carousel-item {{ ($key==0?'active':'') }}">
      @if(Storage::disk('local')->has("images/headlines/".$headline->featured_photo))
        <img class="first-slide" src="{{ route('headlines.image', ['filename' => $headline->featured_photo]) }}" alt="Slide Image">
      @endif
      <div class="container">
        <div class="carousel-caption text-center">
          <h1>{{ $headline->title }}</h1>
          <p>{{ $headline->body }}</p>
          <p><a class="btn btn-sm btn-primary" href="{{ $headline->url }}" role="button">Click Here...</a></p>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">


  <!-- START THE FEATURETTES -->
    @foreach($posts as $post)

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">{{ $post->title }}</h2>
            <p class="lead">
              {{ str_limit(strip_tags($post->body), 50) }}
              @if (strlen(strip_tags($post->body)) > 50)
                <a href="{{ route('posts.show', ['post_id' => $post->post_id]) }}" class="btn btn-info btn-sm">Read More</a>
              @endif
          </p>
        </div>
        <div class="col-md-5">
          @if(Storage::disk('local')->has("images/posts/".$post->featured_photo))
          <img class="featurette-image img-fluid mx-auto" src="{{ route('posts.image', ['filename' => $post->featured_photo]) }}" alt="Featured Image">
          @endif
        </div>
    </div>

    <hr class="featurette-divider">
    @endforeach

    <!-- Three columns of text below the carousel -->
    <div class="row">
    @foreach($contributors as $contributor)
    <div class="col-lg-4">
        @if(Storage::disk('local')->has("images/profile/".$contributor->profile_picture))
          <img class="rounded-circle" src="{{ route('profile.image', ['filename' => $contributor->profile_picture]) }}" alt="Generic placeholder image" width="140" height="140">
        @endif
        <h2>{{ $contributor->first_name }} {{ $contributor->middle_name }} {{ $contributor->last_name }}</h2>
        <p>{{ $contributor->bio }}</p>
        <p><a class="btn btn-secondary" href="#" role="button">View profile &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    @endforeach
    
    </div><!-- /.row -->

    <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
