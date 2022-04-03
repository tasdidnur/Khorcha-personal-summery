@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> All Expense Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/expense/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add Expense</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Expense Date</th>
                            <th>Expense Title</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{date('d-m-y',strtotime($data->expense_date))}}</td>
                            <td>{{$data->expense_title}}</td>
                            <td>{{$data->category->expcate_name}}</td>
                            <td>{{number_format($data->expense_amount,2)}}</td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('dashboard/expense/view/'.$data->income_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/expense/edit/'.$data->income_slug)}}">Edit</a>
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
