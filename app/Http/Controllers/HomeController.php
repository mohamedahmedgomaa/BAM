<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Product;
use App\Model\Setting;
use App\Departments;

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

    public function pagenotfound() {
        return view('index')->with('first_post', Product::orderBy('created_at', 'desc')->first())
            ->with('second_post', Product::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Product::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('four_post', Product::orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first())
            ->with('five_post', Product::orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first())
            ->with('sex_post', Product::orderBy('created_at', 'desc')->skip(5)->take(1)->get()->first())
            ->with('seven_post', Product::orderBy('created_at', 'desc')->skip(6)->take(1)->get()->first())
            ->with('eight_post', Product::orderBy('created_at', 'desc')->skip(7)->take(1)->get()->first())
            ->with('category1', Departments::find(1))
            ->with('category2', Departments::find(2))
            ->with('category3', Departments::find(3))
            ->with('settings', Setting::all())
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5))
            ->with('topTenProductByLikes', Product::withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->get());
    }
}
