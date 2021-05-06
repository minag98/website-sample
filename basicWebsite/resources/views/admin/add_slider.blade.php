@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="row" style="padding-top: 10px;">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2 style="margin-left: 60%;">اضافه کردن اسلایدر</h2>
            @if(session('message'))
                        <div class="alert alert-success" role="alert" style="text-align:right;margin-left: 30%; margin-top:5%;">
                            <strong>{{ session('message') }}</strong>
                          </div>
                          @endif
          </div>
          <div class="card-body" style="text-align: right;">
            <form method="POST" action="{{ route('add.slider') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">عنوان</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="نام اسلایدر" required>
                @error('title')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">لینک</label>
                <input style="text-align: right;" type="text" class="form-control" id="exampleFormControlInput1" name="link" placeholder="لینک مربوط به عکس" required>
                @error('link')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">متن</label>
                <textarea style="text-align: right;" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="متن اسلایدر"></textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">حالت نمایش (فعال-غیر فعال)</label>
                <select class="form-control" name="status" id="">
                    <option value="0">غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">بارگذاری عکس</label>
                <input style="text-align: right;" type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                @error('name="category_id"')
                  <p class="text-danger">{{ $message }}</p>  
                @enderror
              </div>
              <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">اضافه کردن اسلایدر</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection