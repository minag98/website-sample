@extends('layouts.master')
@section('content')
<main id="main">


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
           

                <div class="swiper-slide">
                  <img src="{{ asset($post->image) }}" alt="post image" height="600px" width="700px">
                </div>

          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3 style="text-align: right; font-size:25px">اطلاعات پست</h3>
              <ul>
                <li style="text-align: right; font-size:18px"><strong>دسته</strong>: <b>{{ $post->Category->name }}</b></li>
                <li style="text-align: right; font-size:18px"><strong>عنوان پست</strong>: <b>{{ $post->name }}</li>
                <li style="text-align: right; font-size:18px"><strong>نام کاربر</strong>: <b>{{ $post->user->name }}</li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2 style="text-align: right; ">{{ $post->name }}</h2>
              <p style="text-align: justify; direction: rtl;">
                {{ $post->description }}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection