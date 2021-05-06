@extends('layouts.master')
@section('content')
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="/">Home</a></li>
      <li>پست ها</li>
    </ol>
    <h2>پست ها</h2>

  </div>
</section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $post->name }}</h4>
                        <p>{{ $post->user->name }}</p>
                        <div class="portfolio-links">
                        <a href="{{ asset($post->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $post->name }}"><i class="bx bx-plus"></i></a>
                        <a href="{{ route('post.details',['id'=>$post->id]) }}" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
          
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection