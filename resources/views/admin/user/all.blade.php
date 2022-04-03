@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> All User Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-sm btn-dark" href="{{url('dashboard/user/add')}}"><i class="mdi mdi-plus-circle me-1"></i><span>Add User</span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Photo</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($allUser as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>
                              @if($data->phone!='')
                              {{$data->phone}}
                              @else
                              ---
                              @endif
                            </td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->roleInfo->role_name}}</td>
                            <td>
                            @if($data->photo!='')
                            <img class="img-thumbnail" height="30" width="50" src="{{asset('uploads/users/'.$data->photo)}}">
                            @else
                            <img class="img-thumbnail" height="30" width="50" src="{{asset('uploads/users/avater.png')}}">
                            @endif
                            </td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
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
