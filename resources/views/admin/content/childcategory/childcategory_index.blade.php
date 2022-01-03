@extends('admin.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          @include('backend.flash-message.message')
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                             <h3>Childcategory</h3>
                         </div>   
                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($childcategories as $key => $childcategory)
                              <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$childcategory->subcategory->name}}</td>
                                <td>{{$childcategory->name}}</td>
                                <td>
                                  <a href="{{route('childcategory.edit', $childcategory->id)}}"class="btn btn-primary">Edit</a>
                                  <a href="{{route('childcategory.destroy', $childcategory->id)}}"class="btn btn-danger">Delete</a>
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