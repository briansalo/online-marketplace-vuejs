@extends('admin.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          @include('backend.flash-message.message')
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                             <h3>Category</h3>
                         </div>   
                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $key => $category)
                              <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                  <a href="{{route('category.edit', $category->id)}}"class="btn btn-primary">Edit</a>
                                  <a href="{{route('category.destroy', $category->id)}}"class="btn btn-danger">Delete</a>
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