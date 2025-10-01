<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreateRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $query = Post::query();
         
        if($user){
            $ids = $user->following()->pluck("users.id");
            // dd($ids);
            $query->whereIn("user_id", $ids);
        }

        $posts =$query->simplePaginate(5);

        // dd($posts);
        return view("post.index", compact( "posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view("post.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
       $data =$request->validated();

       $image = $data["image"];
    //    unset($data["image"]);
       $data['user_id'] = auth()->user()->id;
       $data['slug'] = Str::slug($data["title"]);
       $imagePath = $image ->store("posts", "public");
       $data["image"] = $imagePath;
       Post::create($data);

       return redirect()->route("dashboard");
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(string $username,Post $post)
    {
        return view("post.show", compact("post"));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    public function category(Category $category){
        $posts = $category->posts()->latest()->simplePaginate(5);
        return view("post.index", compact("posts"));
    }
}
