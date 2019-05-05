<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Seession;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function destroy() {
        auth()->logout();
        return redirect('/login');
    }
}
