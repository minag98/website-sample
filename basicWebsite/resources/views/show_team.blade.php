@extends('layouts.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>تیم</li>
        </ol>
        <h2>تیم</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
            @foreach ($users as $user)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                    <img src="{{ asset($user->profile_photo_path) }}" alt="">
                    <h4>{{ $user->name }}</h4>
                    <span>Chief Executive Officer</span>
                    <p>
                        {{ $user->bio }}
                    </p>
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                    </div>
                </div>
            @endforeach

          

        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection