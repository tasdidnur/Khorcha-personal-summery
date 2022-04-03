@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <form class="form-horizontal" method="post" action="{{url('dashboard/income/category/submit')}}" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> Add Income Category Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/income/category')}}"><i class="mdi mdi-reorder-horizontal me-1"></i><span>All Income Category</span></a>
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
                <label class="col-3 col-form-label col_form_label">Category Name:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                    @if ($errors->has ('name'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('name')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-3 col-form-label col_form_label">Remarks:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control" id="" name="remarks" value="{{old('remarks')}}">
                </div>
              </div>
            </div> <!-- end card body-->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-md btn-dark">SUBMIT</button>
            </div>
        </div> <!-- end card -->
      </form>
    </div><!-- end col-->
</div>
@endsection
