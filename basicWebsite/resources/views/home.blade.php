@extends('layouts.master')
@section('content')
<style>
  nav svg{
      height: 20px;
  }
  nav .hidden{
      display: block !important;
  }
</style>
 <!-- ======= Hero Section ======= -->
 <section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @php
          $sliders=DB::table('home_sliders')->get();
        @endphp
        @foreach ($sliders as $key=>$slider)
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item {{ $key==0 ? 'active':'' }}" style="background-image: url({{ asset($slider->image) }})">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">{{ $slider->title }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $slider->description }}</p>
                <a href="{{ $slider->link }}" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>

     

    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">
       
          <div class="row">
            @foreach ($l_posts as $l_post)
            <div class="col-lg-4">
              <div class="icon-box">
              
                  <i class="bi bi-card-checklist"></i>
                  <h3><a href="" style="margin-left:50%;">{{ $l_post->name }}</a></h3>
                  <a href="{{ route('user.page',['id'=>$l_post->user->id]) }}" class="btn btn-outline-danger btn-sm" style="margin:5px 0 0"><i class="bi bi-person-fill"> {{ $l_post->user->name }}</i></a>
                
              </div>
            </div>
            @endforeach
          </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            @foreach ($posts as $post)
              <img src="{{ $post->image }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3 style="text-align: right;">{{ $post->name }}</h3>
              <p style="text-align: right;">
               {{ $post->description }}
              </p>
              <a href="{{ route('user.page',['id'=>$post->user->id]) }}" class="btn btn-outline-success"><i class="bi bi-person-fill"> {{ $post->user->name }}</i></a>
                <a href="#" class="btn btn-outline-danger">Read More</a>
            @endforeach
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <div class="blog-pagination">
      <ul class="justify-content-center pagination">
        {{ $posts->links() }}
      </ul>
    </div>
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Clients</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="clients-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->
@endsection