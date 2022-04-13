<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    function index(){
        $drinks = DB::table('products')->where('category', 'drinks')->limit(2)->get();
        $snacks = DB::table('products')->where('category', 'snacks')->limit(2)->get();
        return view('index', ['drinks'=>$drinks, 'snacks'=>$snacks]);
       }

       function products(){
      //  $products = DB::table('products')->get();
          $drinks = DB::table('products')->where('category', 'drinks')->get();
        $snacks = DB::table('products')->where('category', 'snacks')->get();
       return view('products', ['drinks'=>$drinks, 'snacks'=>$snacks]);
        //   return view ('products',['drinks'=>$drinks]);

       }

       function single_product(Request $request, $id){

        $product_array=DB::table('products')->where ('id', $id)->get();
        return view('single_product', ['product_array'=>$product_array]);

       }


    function contact() {
        return view('contact');
    }

    function store(Request $request){
        $name = $request->name;
        return redirect()->route('thanks', ['name'=>$name]);
    }

    function thanks ($name){
        return view('thanks')->with(compact('name'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');;

        // Search in the title and body columns from the posts table
        $products= DB::table('products')
            ->where('name', 'LIKE', "%{$search}%")
           ->orWhere('category', 'LIKE', "%{$search}%")->get();

        // Return the search view with the resluts compacted
        return view('search', compact('products'));
    }



}
