@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> View Income Category Information
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
                  <table class="table table-bordered table-striped table-hover custom-view-table">
                    <tr>
                      <td>Category Name</td>
                      <td>:</td>
                      <td>{{$data->incate_name}}</td>
                    </tr>
                    <tr>
                      <td>Remarks</td>
                      <td>:</td>
                      <td>{{$data->incate_remarks}}</td>
                    </tr>
                    <tr>
                      <td>Creator</td>
                      <td>:</td>
                      <td>{{$data->creatorInfo->name}}</td>
                    </tr>
                    <tr>
                      <td>Editor</td>
                      <td>:</td>
                      <td>{{$data->editorInfo->name}}</td>
                    </tr>
                    <tr>
                      <td>Create Time</td>
                      <td>:</td>
                      <td>{{$data->created_at->format('d-m-Y h-i-s A')}}</td>
                    </tr>
                    <tr>
                      <td>Update Time</td>
                      <td>:</td>
                      <td>{{$data->updated_at->format('d-m-Y h-i-s A')}}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-2"></div>
              </div>
            </div> <!-- end card body-->
            <div class="card-footer">
              <div class="btn-group mb-2">
                  <button type="button" class="btn btn-secondary">Print</button>
                  <button type="button" class="btn btn-dark">PDF</button>
                  <button type="button" class="btn btn-secondary">Excel</button>
              </div>
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
