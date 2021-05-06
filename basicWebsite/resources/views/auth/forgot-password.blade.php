{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
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

              <h4 class="text-dark mb-5" style="text-align:right;">بازیابی رمز</h4>
              <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                      <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <input style="text-align:right;" placeholder="آدرس ایمیل" type="email" class="form-control input-lg"  aria-describedby="emailHelp" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
                    @error('email')
                        {{ $message }}
                    @enderror
                    @if (session('status'))
              <div class="mb-4 font-medium text-sm text-green-600" style="color:green;">
                  {{ session('status') }}
              </div>
          @endif
                  </div>
                  
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">لینک ریست پسورد ایمیل شود</button>
                   
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