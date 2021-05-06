@extends('user.user_master')
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
            <h2 style="margin-left: 60%;">اضافه کردن پست</h2>
          </div>
          <div class="card-body" style="text-align: right;">
            <form method="POST" action="{{ route('add.post') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">نام پست</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="p_name" placeholder="نام پست" required>
                @error('p_name')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">اسلاگ</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="p_slug" placeholder="اسلاگ" required>
                @error('p_slug')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">متن</label>
                <textarea style="text-align: right;" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="متن پست"></textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">نام دسته</label>
                    <select class="form-control" name="category_id" id="">
                      <option value="">دسته را انتخاب کنید</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                  <p class="text-danger">{{ $message }}</p>  
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">بارگذاری عکس</label>
                <input style="text-align: right;" type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                @error('name="category_id"')
                  <p class="text-danger">{{ $message }}</p>  
                @enderror
              </div>
              <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">اضافه کردن پست</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection