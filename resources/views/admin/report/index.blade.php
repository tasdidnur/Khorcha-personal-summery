@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> Report
                </div>
                <div class="col-md-4 card_button_part">
                  <!-- <a class="btn btn-sm btn-dark d-print-none" href="{{url('dashboard/income/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add Income</span></a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                  @if(Session::has('success'))
                  <div class="alert alert-success alertsuccess" role="alert">
                    {{Session::get('success')}}
                  </div>
                  @endif
                  @if(Session::has('error'))
                  <div class="alert alert-danger alerterror" role="alert">
                    {{Session::get('error')}}
                  </div>
                  @endif
                </div>
                <div class="col-2"></div>
              </div>
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Income Amount</th>
                            <th>Expense Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($allIncome as $data)
                        <tr>
                            <td>{{date('d-m-y',strtotime($data->income_date))}}</td>
                            <td>{{$data->income_title}}</td>
                            <td>{{$data->category->incate_name}}</td>
                            <td>{{number_format($data->income_amount,2)}}</td>
                            <td>-</td>
                        </tr>
                      @endforeach
                      @foreach($allExpense as $data)
                        <tr>
                            <td>{{date('d-m-y',strtotime($data->expense_date))}}</td>
                            <td>{{$data->expense_title}}</td>
                            <td>{{$data->category->expcate_name}}</td>
                            <td>-</td>
                            <td>{{number_format($data->expense_amount,2)}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body -->
            <div class="card-footer d-print-none">
              <div class="btn-group mb-2">
                  <a href="#" class="btn btn-secondary" onclick="window.print()">Print</a>
                  <a href="{{url('dashboard/income/pdf')}}" class="btn btn-dark">PDF</a>
                  <a href="{{url('dashboard/income/export')}}" class="btn btn-secondary">Excel</a>
              </div>
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- softselete modal start -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{url('dashboard/income/softdelete')}}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Confirm Messege</h4>
            </div>
            <div class="modal-body modal_body">
                Do you want to sure delete?
                <input type="hidden" name="modal_id" id='modal_id' value="1">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </form>
    </div>
</div>
<!-- softselete modal end -->
@endsection
