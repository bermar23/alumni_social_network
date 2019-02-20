@extends('layouts.app')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
      <div class="container">
        <div class="carousel-caption text-right">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        </div>
      </div>
    </div>
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
        <img class="rounded-circle" src="images/{{ $contributor->profile_picture }}" alt="Generic placeholder image" width="140" height="140">
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
