@extends('user.user_master')
@section('content')
<div class="content-wrapper">
    <div class="content">							
        <div class="row">
                          <div class="col-lg-12">
                              <div class="card card-default">
                                  <div class="card-header card-header-border-bottom"> 
                                    <h2 style="margin-left: 80%;">تغییر رمز عبور</h2>
                                  </div>
                                  <div class="card-body">
                                    @if(session('message'))
                                    <div class="alert alert-success" role="alert" style="text-align:right;">
                                        <strong>{{ session('message') }}</strong>
                                      </div>
                                      @endif
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <div class="form-group" style="text-align: right;">
                                            <label for="">پسورد فعلی</label>
                                            <input style="text-align: right;" name="oldpass" class="form-control input-lg" placeholder="پسورد فعلی" id="current_password" type="password" autocomplete="current-password">
                                            @error('oldpass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="text-align: right;">
                                            <label for="">پسورد جدید</label>
                                            <input style="text-align: right;" name="password" class="form-control" placeholder="پسورد جدید" id="password" type="password" autocomplete="new-password">
                                            @error('newpass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="text-align: right;">
                                            <label for="">تکرار پسورد</label>
                                            <input style="text-align: right;"  name="password_confirmation" class="form-control input-sm" placeholder="تکرار پسورد" id="password_confirmation" type="password" autocomplete="new-password">
                                            @error('repeatpass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-default">تغییر پسورد</button>
                                    </form>
                                </div>
                              </div>
                          </div>
                      </div>
</div>

    


  </div>
  @endsection