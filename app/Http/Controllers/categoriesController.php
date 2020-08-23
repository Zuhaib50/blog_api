<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

            $category= categories::all();
            return  view('category.index',compact('category'));


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = new categories();
        $category->name= $request->input('categoryName');
        if($category->save()){
            return  redirect()->back()->with('success','saved sucessfully!');
        };

        return redirect()->back()->with('failed','could not saved');
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
        $cat=  categories::find($id);
        return view('category.edit',compact('cat'));
        //
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
        $cat= categories::find($id);
        $cat->name = $request->input('categoryName');
        if($cat->save()){
            return  redirect()->back()->with('success','Update sucessfully!');
        };

        return redirect()->back()->with('failed','could not Update');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(categories::destroy($id))
            {
                return  redirect()->back()->with('success','Delete sucessfully!');
            };

        return redirect()->back()->with('failed','could not Delete');

        //
    }
}
