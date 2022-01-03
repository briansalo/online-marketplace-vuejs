<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subcategory;
use App\Models\Childcategory;

use Illuminate\Support\Str;
class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories = Childcategory::all();
        return view('admin.content.childcategory.childcategory_index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('admin.content.childcategory.childcategory_add',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Childcategory::create([
            'name'=>$name= $request->name,
            'slug'=>Str::slug($name),
            'subcategory_id' => $request->category,
            
        ]);
        return redirect()->route('childcategory.index')->with('message','Category created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories=Subcategory::all();
        $data=Childcategory::find($id);
        return view('admin.content.childcategory.childcategory_edit',compact('data','subcategories'));
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
        $category =Childcategory::find($id);
        $category->update([
            'name'=>$name= $request->name,
            'slug'=>Str::slug($name),
            'subcategory_id' => $request->category,
        ]);
        return redirect()->route('childcategory.index')->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Childcategory::find($id)->delete();
        return redirect()->route('childcategory.index')->with('message','Category deleted successfully');
    }
}
