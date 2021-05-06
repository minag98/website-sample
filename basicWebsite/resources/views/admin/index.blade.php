@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
  <div class="content">							<div class="bg-white border rounded">
        <div class="row no-gutters">
          <div class="col-lg-4 col-xl-3">
            <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
              <div class="card text-center widget-profile px-0 border-0">
                <div class="card-img mx-auto rounded-circle">
                  @if($user->status === 1)
                  <img src="{{ $user->profile_photo_path }}" alt="user image" height="100px" width="100px" style="border-radius:50px;">
                            @else
                   <img src="{{ asset('image/default.png') }}" alt="user image" height="100px" width="100px" style="border-radius:50px;">
                  @endif
                  <img src="{{ $user->profile_photo_path }}" alt="user image">
                </div>
              </div>
              <hr class="w-100">
              <div class="contact-info pt-4">
                <h5 class="text-dark mb-1">اطلاعات کاربر</h5>
                <p class="text-dark font-weight-medium pt-4 mb-2">نام</p>
                <p>{{ $user->name }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">آدرس ایمیل</p>
                <p>{{ $user->email }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">بیو</p>
                <p>{{ $user->bio }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                <p class="pb-3 social-button">
                  <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                    <i class="mdi mdi-twitter"></i>
                  </a>
                  <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                    <i class="mdi mdi-linkedin"></i>
                  </a>
                  <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                    <i class="mdi mdi-facebook"></i>
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-xl-9">
            <div class="profile-content-right py-5">
              <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><b>پست ها</b></a>
                
                </li>
              
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b>دسته بندی ها</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="slider-tab" data-toggle="tab" href="#slider" role="tab" aria-controls="profile" aria-selected="false"><b>اسلایدر</b></a>
                </li>
              </ul>
              <div class="tab-content px-3 px-xl-5" id="myTabContent">
          
                <div class="tab-pane fade active show" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                  <a href="{{ route('post') }}" class="btn btn-outline-dark btn-lg btn-block"><b>اضافه کردن پست</b></a>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel">
                          @if(session('message'))
              <div class="alert alert-success" role="alert" style="text-align:right;margin-left: 30%; margin-top:5%;">
                  <strong>{{ session('message') }}</strong>
                </div>
                @endif
                          <div class="panel-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>شماره</th>
                                  <th>عکس</th>
                                  <th>نام پست</th>
                                  <th>متن</th>
                                  <th>ادیت</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  $i=1;
                                @endphp
                                @foreach ($posts as $post)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>
                                    <img src="{{ $post->image }}" alt="" height="50px" width="100px">
                                  </td>
                                  <td>{{ $post->name }}</td>
                                  <td>{{ $post->description }}</td>
                                  <td>
                                    <a href="{{ route('delete.post',['id'=>$post->id]) }}"  onclick="return confirm('می خواهید این پست رو حذف کنید؟')" class="btn btn-danger">حذف</a>
                                </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <a href="{{ route('category') }}" class="btn btn-outline-dark btn-lg btn-block"><b>اضافه کردن دسته</b></a>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel">
                          <div class="panel-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>شماره</th>
                                  <th>نام دسته</th>
                                  <th>اسلاگ</th>
                                  <th>ادیت</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  $i=1;
                                @endphp
                                @foreach ($categories as $category)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $category->name }}</td>
                                  <td>{{ $category->slug }}</td>
                                  <td>
                                    <a href="{{ route('delete.cat',['id'=>$category->id]) }}"  onclick="return confirm('می خواهید این دسته رو حذف کنید؟')" class="btn btn-danger">حذف</a>
                                </td>
                                  {{-- <td>
                                    <a href="{{ route('admin.editposts',['post_slug'=>$post->slug]) }}"><i class="fa fa-edit fa-x" style="color:rgb(41, 40, 40)">Edit</i></a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.post',['id'=>$category->slug]) }}" onclick="confirm('میخواهید این پست رو حذف کنی؟')"><i class="fa fa-times  text-danger"></i></a>
                                </td> --}}
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="tab-pane fade" id="slider" role="tabpanel" aria-labelledby="slider-tab">
                  <a href="{{ route('slider') }}" class="btn btn-outline-dark btn-lg btn-block"><b>اضافه کردن اسلایدر</b></a>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel">
                          <div class="panel-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>شماره</th>
                                  <th>عکس</th>
                                  <th>عنوان</th>
                                  <th>متن</th>
                                  <th>لینک</th>
                                  <th>ادیت</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $i=1;
                              @endphp
                              @foreach ($sliders as $slider)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td><img src="{{ $slider->image }}" alt="" height="50px" width="100px"></td>
                                  <td>{{ $slider->title }}</td>
                                  <td>{{ $slider->description }}</td>
                                  <td>{{ $slider->link }}</td>
                                  <td> 
                                    <a href="{{ route('delete.slider',['id'=>$slider->id]) }}"  onclick="return confirm('می خواهید این اسلایدر رو حذف کنید؟')" class="btn btn-danger">حذف</a>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-content px-3 px-xl-5" id="myTabContent">
                <div class="tab-pane fade active show" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
              </div>
            </div>
          </div>
        </div>
      </div></div>

  


</div>
@endsection