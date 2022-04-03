@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> All Expense Category Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/expense/category/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add Expense Category Information</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Category Name</th>
                            <th>Remarks</th>
                            <th>Total Expenses</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{$data->expcate_name}}</td>
                            <td>{{$data->expcate_remarks}}</td>
                            <td>
                              @php
                               $cateId=$data->expcate_id;
                               $categoryExpense=App\Models\Expense::where('expense_status',1)->where('expcate_id',$cateId)->sum('expense_amount');
                              @endphp
                              {{number_format($categoryExpense,2)}}
                            </td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('dashboard/expense/category/view/'.$data->expcate_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/expense/category/edit/'.$data->expcate_slug)}}">Edit</a>
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
