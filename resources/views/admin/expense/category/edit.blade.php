@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <form class="form-horizontal" method="post" action="{{url('dashboard/expense/category/update')}}" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> Update Expense Category Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/expense/category')}}"><i class="mdi mdi-reorder-horizontal me-1"></i><span>All Expense Category</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Category Name:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="hidden" name="id" value="{{$data->expcate_id}}">
                    <input type="text" class="form-control" id="" name="name" value="{{$data->expcate_name}}">
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
                    <input type="text" class="form-control" id="" name="remarks" value="{{$data->expcate_remarks}}">
                </div>
              </div>
            </div> <!-- end card body-->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-md btn-dark">UPDATE</button>
            </div>
        </div> <!-- end card -->
      </form>
    </div><!-- end col-->
</div>
@endsection
