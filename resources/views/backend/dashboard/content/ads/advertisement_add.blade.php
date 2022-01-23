@extends('backend.dashboard.dashboard')
@section('dashboard_content')


                <form action="{{ route('ads.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header ">
                            Post Ads
                        </div>
                        <div class="card-body">
                            <label for="file" class="mt-2"><b>Upload 3 Images</b></label>
                            <div class=" form-inline form-group mt-1">

                                    <feature-image/>                                

                            </div>
                            <label for="file" class="mt-2"><b>Choose category</b></label>
                            <div class="row form-inline form-group mt-1">

                                        <category-dropdown/>
                                

                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Price status</label>
                                <select class="form-control" name="price_status">
                                    <option value="negoitable">Negotiable</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Product Condition</label>
                                <select class="form-control" name="product_condition">
                                    <option value="">Select </option>
                                    <option value="likenew">Looks like New</option>
                                    <option value="heavilyused">Heavily Used</option>
                                    <option value="new">New</option>
                                </select>
                            </div>

                            <label for="file" class="mt-2"><b>Choose address</b></label>
                            <div class="row form-inline form-group mt-1">

                                         <address-dropdown/>
                            
                            </div>
                            <div class="form-group">
                                <label for="location">Seller contact number</label>
                                <input type="number" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="location">Demo link of product(ie:youtube)</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div class="form-group mt-2">
                                <button class="btn btn-info text-white float-right" type="submit">Publish</button>
                            </div>

                        </div>
                    </div>
                </form>



@endsection