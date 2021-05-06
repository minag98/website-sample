{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
  {{-- toaster cdn --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script> --}}
  
  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('admin/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('admin/assets/css/sleek.css')}}" />

  

  <!-- FAVICON -->
  <link href="{{ asset('admin/assets/img/favicon.png')}}" rel="shortcut icon" />

  <script src="{{ asset('admin/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>
                  <span class="brand-name">website</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5" style="text-align:right;">ورود</h4>
              @if(session('message'))
              <div class="alert alert-success" role="alert" style="text-align:right;">
                  <strong>{{ session('message') }}</strong>
                </div>
                @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input style="text-align:right;" type="email" class="form-control input-lg"  aria-describedby="emailHelp" placeholder="آدرس ایمیل خود را وارد کنید" id="email" name="email" :value="old('email')" required autofocus>
                    @error('email')
                        {{ $message }}
                    @enderror
                  </div>
                  <div class="form-group col-md-12 ">
                    <input style="text-align:right;" type="password" class="form-control input-lg" id="password" placeholder="پسورد" name="password" required autocomplete="current-password">
                    @error('password')
                        {{ $message }}
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">مرا به خاطر بسپار
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>
                
                      </div>
                      <p><a class="text-blue" href="{{ route('password.request') }}">رمز خود را فراموش کردید؟</a></p>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">ورود</button>
                    <p style="text-align:center;">
                        <span>اکانتی نساختید؟</span> 
                        <a class="text-blue" href="{{ route('register') }}">ثبت نام</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>