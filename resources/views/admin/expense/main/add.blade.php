@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <form class="form-horizontal" method="post" action="{{url('dashboard/expense/submit')}}" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> Add Expense Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/expense')}}"><i class="mdi mdi-reorder-horizontal me-1"></i><span>All Expense</span></a>
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
              <div class="row mb-3 {{ $errors->has('title') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Expense Title:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control form_control" id="" name="title" value="{{old('title')}}">
                    @if ($errors->has ('title'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('title')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('category') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Expense Category:<span class="req_star">*</span></label>
                <div class="col-7">
                  @php
                    $allCategory=App\Models\ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','ASC')->get();
                  @endphp
                    <select class="form-control form_control" id="" name="category">
                      <option>Select Income Category</option>
                      @foreach($allCategory as $cate)
                      <option value="{{$cate->expcate_id}}">{{$cate->expcate_name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has ('category'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('category')}}</strong>
                     </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('date') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Income Date:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control" id="myDate" name="date" value="{{old('date')}}">
                    @if ($errors->has('date'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('date') }}</strong>
                       </span>
                   @endif
                </div>
              </div>
              <div class="row mb-3 {{ $errors->has('amount') ? ' has-error' : ''}}">
                <label class="col-3 col-form-label col_form_label">Income Amount:<span class="req_star">*</span></label>
                <div class="col-7">
                    <input type="text" class="form-control form_control" id="" name="amount" value="{{old('amount')}}">
                    @if ($errors->has ('amount'))
                     <span class="invalid-feedback" role="alert">
                       <strong>{{$errors->first('amount')}}</strong>
                     </span>
                    @endif
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
