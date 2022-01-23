@extends('admin.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          @include('backend.flash-message.message')
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                              <div>
                             <h3>Reported User</h3>
                            </div>
                             <div >
                                <h3></h3>
                                <p>(Every one confirmed issue of reported user, it will deduct 1 points for their ratings)</p>
                             </div>
                         </div>   
                        <div class="card-body">

                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col" width="13%">Date</th>
                                <th scope="col">Complinant</th>
                                <th scope="col">Reported User</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Message</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($allfraud as $key => $fraud)
                              <tr>

                                <td>{{ date('m-d-Y', strtotime($fraud->created_at))  }}</td>
                                <td>{{$fraud->complinant_user->name}}</td>
                                <td>{{$fraud->reported_user->name}}</td>
                                <td>{{$fraud->reason}}</td>
                                <td>{{$fraud->message}}</td>
                                <td>
                                  <a href="{{route('reported.confirm',$fraud->id)}}"class="btn btn-success">Confirm</a>
                                  <a href="{{route('reported.ignore',$fraud->id)}}"class="btn btn-danger mt-1">Ignore</a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection