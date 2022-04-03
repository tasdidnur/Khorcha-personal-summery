@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <form class="form-horizontal" method="post" action="{{url('dashboard/user/submit')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> User Registration
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/user')}}"><i class="mdi mdi-reorder-horizontal me-1"></i><span>All User</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                  </div>
                  @endif
                  @if(Session::has('error'))
                  <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                  </div>
                  @endif
                </div>
                <div class="col-2"></div>
              </div>
              <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Name:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control" id="" name="name" value="{{old('name')}}">
                    @if ($errors->has ('name'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('name')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-3 col-form-label col_form_label">Phone:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control" id="" name="phone" value="{{old('phone')}}">
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('email') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Email:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="email" class="form-control" id="" name="email" value="{{old('email')}}">
                    @if ($errors->has ('email'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('email')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('password') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Password:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="password" class="form-control" id="" name="password" value="">
                    @if ($errors->has ('password'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('password')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-3 col-form-label col_form_label">Confirm Password:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('role') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">User Role:<span class="req_star">*</span></label>
                <div class="col-7">
                  @php
                   $allRole=App\Models\Role::where('role_status',1)->orderBy('role_id','ASC')->get();
                  @endphp
                    <select class="form-control" id="" name="role">
                      <option value="">Selet Your Role</option>
                      @foreach($allRole as $role)
                      <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has ('role'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('role')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-3 col-form-label col_form_label">Photo:</label>
                <div class="col-7">
                    <input type="file" id="" name="pic">
                </div>
              </div>
            </div> <!-- end card body-->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-md btn-dark">REGISTRATION</button>
            </div>
        </div> <!-- end card -->
      </form>
    </div><!-- end col-->
</div>
@endsection
