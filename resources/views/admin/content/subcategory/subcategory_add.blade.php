@extends('admin.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                             <h3>Add Subcategory</h3>
                         </div>   
                        <div class="card-body">

                            <form class="forms-sample" action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="name of category">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="name">Choose Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category )
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                     </select>   
                                    
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
