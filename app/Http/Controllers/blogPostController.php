<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogPost;
use App\Models\categories;



class blogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allposts= blogPost::all();
        return view('blog post.index',compact('allposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = categories::all();
        //
        return  view('blog post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $post= new blogPost();
        $post->title= $request->input('postTitle');
        $post->detail= $request->input('post-detail');
        $post->catrgory_id= $request->input('category');
        $post->user_id=0;
        if($post->save()){

            $photo = $request->file('featuredphoto');
            if($photo != null){
                echo($photo);
                $ext=$photo->getClientOriginalExtension();
                $fileName= rand(10000,50000). '.' . $ext;
                if($ext == 'png' || $ext == 'jpg'){
                    if($photo->storeAs('public',$fileName)){
                        $blogpost= blogPost::find($post->id);
                        $blogpost->featured_image_url=url('/') .'/'. $fileName;
                        $blogpost->save();
                    }

                }

            }

            return  redirect()->back()->with('success','saved sucessfully!');
        };

        return redirect()->back()->with('failed','could not saved');
        //
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
        //
    }
}
