@extends('backend.dashboard.dashboard')
@section('dashboard_content')

                <form action="{{ route('ads.update',$data->id)}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">
                            Update Ads
                        </div>
                        <div class="card-body">
                            <label for="file" class="mt-2"><b>Upload 3 Images</b></label>
                            <div class=" form-inline form-group mt-1">
                                    <update-feature-image
                                    feature-image="{{Storage::url($data->feature_image)}}"
                                    first-image="{{Storage::url($data->first_image)}}"
                                    second-image="{{Storage::url($data->second_image)}}"
                                    />                                

                            </div>
                            <label for="file" class="mt-2"><b>Choose category</b></label>
                            <div class="row form-inline form-group mt-1">

                                        <update-category-dropdown
                                         :category-id="{{$data->category_id}}"
                                         :subcategory-id="{{($data->subcategory_id == null)?0:$data->subcategory_id}}"
                                         :childcategory-id="{{($data->childcategory_id== null)?0:$data->childcategory_id}}"
                                         />
                                

                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{$data->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" placeholder="{{$data->description}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Price</label>
                                <input type="number" value="{{$data->price}}"name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Price status</label>
                                <select class="form-control" name="price_status">
                                    <option value="negotiable"{{($data->price_status =="negotiable")?'selected':''}}>Negotiable</option>
                                    <option value="fixed"{{($data->price_status =="fixed")?'selected':''}}>Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Product Condition</label>
                                <select class="form-control" name="product_condition">
                                    <option value="likenew"{{($data->product_condition=='likenew')?'selected':''}}>Looks like New</option>
                                    <option value="heavilyused"{{($data->product_condition=='heavilyused')?'selected':''}}>Heavily Used</option>
                                    <option value="new"{{($data->product_condition=='new')?'selected':''}}>New</option>
                                </select>
                            </div>

                            <label for="file" class="mt-2"><b>Choose address</b></label>
                            <div class="row form-inline form-group mt-1">

                                         <update-address-dropdown
                                         :province-id="{{$data->province_id}}"
                                         :city-id="{{$data->city_id}}"
                                         :barangay-id="{{$data->barangay_id}}"

                                         />
                            
                            </div>
                            <div class="form-group">
                                <label for="location">Seller contact number</label>
                                <input type="number" value="{{$data->phone_number}}" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="location">Demo link of product(ie:youtube)</label>
                                <input type="text" value="{{$data->link}}"class="form-control" name="link">
                            </div>
                            <div class="form-group mt-2">
                                <button class="btn btn-info text-white float-right" type="submit">Update</button>
                            </div>

                        </div>
                    </div>
                </form>



@endsection