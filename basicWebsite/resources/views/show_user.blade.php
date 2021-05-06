@extends('layouts.master')
@section('content')
<main id="main">


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="/">Home</a></li>
      <li>کاربران</li>
    </ol>
    <h2>کاربران</h2>

  </div>
</section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-lg-6" style="margin-top:50px;">
                    <div class="testimonial-item">
                    <img src="{{ $user->profile_photo_path }}" class="testimonial-img" alt="">
                    <h3>{{ $user->name }}</h3>
                    <h4>{{ $user->email }}</h4>
                    <p style="text-align: right;">
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ $user->bio }}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                </div>
            @endforeach

         

        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
@endsection