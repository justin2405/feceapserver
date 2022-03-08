<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($slug)
   {
       return view('post', [
           'post' => Post::where('slug', '=', $slug)->first()
       ]);
   }

   public function store(Request $request)
   {
       $post = new Post;

       $post->product_id = $request->product_id;
       $post->product_name = $request->product_name;
       $post->product_image_url = $request->product_image_url;
       $post->product_price = $request->product_price;
       $post->ship_fee = $request->ship_fee;

       $post->save();

       return response()->json(["result" => "ok"], 201);
   }
}
