@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col md 12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 style="margin-left: 80%;">اطلاعات کاربری</h2>
                    @if(session('message'))
              <div class="alert alert-success" role="alert" style="text-align:right;margin-left: 30%;">
                  <strong>{{ session('message') }}</strong>
                </div>
                @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update.pic',['id'=>$user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @if($user->status === 1)
                            <img src="{{ $user->profile_photo_path }}" height="100px" width="100px" style="border-radius:50px; margin-left: 40%;">
                            @else
                            <img src="{{ asset('image/default.png') }}" height="80px" width="80px" style="border-radius:50px; margin-left: 40%;">
                        @endif
                        
                        <div class="form-group" style="margin-left: 40%;">
                            <label for="exampleFormControlFile1" style="margin-top: 5%;"><b>بارگذاری عکس جدید</b></label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-footer mb-4" style="margin-left: 40%;">
                            @if($user->status === 1)
                            <button type="submit" class="btn btn-danger btn-default">حدف عکس</button>
                            @else
                            <button type="submit" class="btn btn-primary btn-default">بارگذاری عکس</button>
                            @endif
                        </div>
                    </form>
                    <hr>
                    <form method="POST" action="{{ route('update.pro',['id'=>$user->id]) }}">
                        @csrf
                        <div class="form-group" style="text-align: right;">
                            <label for="exampleFormControlInput1"><b>نام</b></label>
                            <input style="text-align: right;" value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="نام">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group" style="text-align: right;">
                            <label for="exampleFormControlPassword"><b>آدرس ایمیل</b></label>
                            <input style="text-align: right;" type="email" value="{{ $user->email }}" class="form-control" name="email" placeholder="آدرس ایمیل">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group" style="text-align: right;">
                            <label for="exampleFormControlTextarea1"><b>بیو</b></label>
                            <textarea style="text-align: right;" class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" placeholder="بیو">{{ $user->bio }}</textarea>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-default">ثبت اطلاعات جدید</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection