@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> All Income Recycle
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/income/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add Income</span></a>
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
                            <th>Income Date</th>
                            <th>Income Title</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{date('d-m-y',strtotime($data->income_date))}}</td>
                            <td>{{$data->income_title}}</td>
                            <td>{{$data->category->incate_name}}</td>
                            <td>{{number_format($data->income_amount,2)}}</td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" id="restore" data-bs-toggle="modal" data-bs-target="#restore-modal" data-id={{$data->income_id}}>Restore</a>
                                        <a class="dropdown-item" href="#" id="delete" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id={{$data->income_id}}>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body -->
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
<!-- restore modal start -->
<div id="restore-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{url('dashboard/income/restore')}}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Confirm Messege</h4>
            </div>
            <div class="modal-body modal_body">
                Do you want to restore?
                <input type="hidden" name="modal_id" id='modal_id' value="">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </form>
    </div>
</div>
<!-- restore modal end -->
<!-- delete modal start -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{url('dashboard/income/delete')}}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Confirm Messege</h4>
            </div>
            <div class="modal-body modal_body">
                Do you want to sure permanently delete?
                <input type="hidden" name="modal_id" id='modal_id' value="">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </form>
    </div>
</div>
<!-- delete modal end -->
@endsection
