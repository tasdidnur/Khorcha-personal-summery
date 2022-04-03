@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> All Income Ctegory Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/income/category/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add Income Category Information</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Category Name</th>
                            <th>Remarks</th>
                            <th>Total Incomes</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{$data->incate_name}}</td>
                            <td>{{$data->incate_remarks}}</td>
                            <td>
                              @php
                               $cateId=$data->incate_id;
                               $categoryIncome=App\Models\Income::where('income_status',1)->where('incate_id',$cateId)->sum('income_amount');
                              @endphp
                              {{number_format($categoryIncome,2)}}
                            </td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('dashboard/income/category/view/'.$data->incate_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/income/category/edit/'.$data->incate_slug)}}">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
