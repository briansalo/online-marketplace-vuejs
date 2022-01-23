<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;

use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;

use App\Models\Advertisement;

use Illuminate\Support\Str;


class AdvertisementController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','verified']); //only auth user and verified user can access this controller
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = Advertisement::where('user_id', auth()->user()->id)->where('published', '1')->get();
        return view('backend.dashboard.content.ads.advertisement_index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['categories'] = Category::all();
        $data['subcategories'] = Subcategory::all();
        $data['childcategories'] = Childcategory::all();

        $data['regions'] = Region::all();
        $data['provinces'] = Province::all();
        $data['citys'] = City::all();
        $data['barangays'] = Barangay::all();

        return view('backend.dashboard.content.ads.advertisement_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->all());
        $featureImage = $request->file('feature_image')->store('public/ads');
        $firstImage = $request->file('first_image')->store('public/ads');
        $secondImage = $request->file('second_image')->store('public/ads');

        $data= $request->all();
        $data['feature_image'] = $featureImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;
        $data['user_id']=auth()->user()->id;
        $data['slug'] = Str::slug($request->name);
        $data['published'] = '0';
                
        //if you use this code make sure "$data=$request->all()"" is at the top of array. and the name of your input name in form is same of the name of column in the database table
        Advertisement::create($data); 

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Advertisement::find($id);
        if(auth()->user()->id == $data->user_id){
             return view('backend.dashboard.content.ads.advertisement_edit',compact('data'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ads =Advertisement::find($id);
        
        $data= $request->all();
        if($request->hasFile('feature_image')){
            $data['feature_image']=$request->file('feature_image')->store('public/ads');
        }
        if($request->hasFile('first_image')){
            $data['first_image']=$request->file('first_image')->store('public/ads');
        }
        if($request->hasFile('second_image')){
            $data['second_image']=$request->file('second_image')->store('public/ads');
        }
        if($request->description == null){
            $data['description']=$ads->description;
        }
        
        $ads->update($data);

         return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('message','Category deleted successfully');
    }



    public function Pending(){
        $advertisements = Advertisement::where('user_id',auth()->user()->id)->where('published', 0)->get();
        return view('backend.dashboard.content.pending_ads.pending_ads_index',compact('advertisements'));
    }
}
