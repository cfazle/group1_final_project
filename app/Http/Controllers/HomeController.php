<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**public function home()
    {
        $drinks = DB::table('products')->where('category', 'drinks')->limit(2)->get();
        $snacks = DB::table('products')->where('category', 'snacks')->limit(2)->get();
        return view('index', ['drinks'=>$drinks, 'snacks'=>$snacks]);
    } **/
}
