<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\GetProductListController;
//use Jenssegers\Mongodatabase as db;

class GetProductListController extends Controller
{
    public function show($slug)
    {
        return view('product', [
            'product' => Post::where('slug', '=', $slug)->first()
        ]);
    }
 
    public function index(Request $request)
    {
        $id = $request->input('id');
        $data = Post::where('product_id', '=', $id)->get();
        return $data;
        if(sizeof($data) == 0){
            return response()->json(["result" => 'error',
                "message" => "Product not found!", "code"=>"404"]);
        }
        //return response()->json(["result" => "success","code"=>"201","data" =>$data]);
       // return response()->json(["result" => "success","code"=>"201","data" =>["product_id" => $id,"product_image_url"=>$data['product_image_url'],"product_price"=>$data['product_price'],"ship_fee"=>$data['ship_fee']]]);
    }
 }