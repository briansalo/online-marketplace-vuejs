@extends('admin.admin')
@section('content')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ratings Computation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	5points = Very Good<br>
        	4points = Good<br>
        	3points = Almost Good<br>
        	2points = Bad<br>
        	1points = Very Bad<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



    <div class="main-panel">
        <div class="content-wrapper">
          @include('backend.flash-message.message')
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                             <h3>Reported User</h3>
                         </div>    
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                         		<th scope="col">Email</th>
                                <th scope="col"><a href="" data-toggle="modal" data-target="#exampleModal">Ratings?</a></th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($users as $key => $user)
                              <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @switch($user->count_penalty)
                                	@case(0)
                                		<td>Very Good</td>
                                		@break
                                	@case(1)
                                		<td>Good</td>
                                		@break
                                	@case(2)
                                		<td>Almost Good</td>
                                		@break
                                	@case(3)
                                		<td>Bad</td>
                                		@break
                                	@case(4)
                                		<td>Very Bad</td>
                                		@break	
                                @endswitch
                                <td>
                                @if($user->status == 0)
                                 	 <a href="{{route('activate.user', $user->id)}}"class="btn btn-success">Active</a>
                                @else
                               		 <a href="{{route('deactivate.user', $user->id)}}" class="btn btn-danger">Deactivate</a>
                                @endif  
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