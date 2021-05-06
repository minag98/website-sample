@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="row" style="padding-top: 10px;">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            @if(session('message'))
            <div class="alert alert-success" role="alert" style="text-align:right;margin-left: 30%; margin-top:5%;">
                <strong>{{ session('message') }}</strong>
              </div>
              @endif
            <h2 style="margin-left: 60%;">اضافه کردن دسته</h2>
          </div>
          <div class="card-body" style="text-align: right;">
            <form method="POST" action="{{ route('add.category') }}">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">نام دسته</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="نام دسته">
                @error('name')
                  <p class="text-danger">{{ $message }}</p>  
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">اسلاگ</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="slug" placeholder="اسلاگ">
                @error('slug')
                  <p class="text-danger">{{ $message }}</p>  
                @enderror
              </div>
              <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">اضافه کردن دسته</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection