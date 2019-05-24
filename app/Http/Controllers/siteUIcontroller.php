<?php

namespace App\Http\Controllers;

use App\Departments;
use App\User;
use App\Model\Product;
use App\Model\Setting;

class siteUIcontroller extends Controller
{
    //
    public function index()
    {
        return view('index')->with('categories', Departments::all()->take(5))
            ->with('first_post', Product::orderBy('created_at', 'desc')->first())
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
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

    public function showCategory($id)
    {
        $category = Departments::find($id);
        $next_page = Departments::where('id', '>', $category->id)->min('id');
        $prev_page = Departments::where('id', '<', $category->id)->max('id');
        return view('categories.category')->with('category', $category)
            ->with('categories', Departments::all()->take(5))
            ->with('next', Departments::find($next_page))
            ->with('prev', Departments::find($prev_page))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

    public function footerTopProduct() {
        $footerTopProduct = Product::withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get();
        return view('index', compact('footerTopProduct'));
    }

    public function shopshow() {
        $shopshow = User::all();
        return view('adminshop_show', compact('shopshow'))
        ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
        ->with('categories', Departments::all()->take(5));
    }

    public function allProduct() {
        $allProducts = Product::all();
        return view('allProducts', compact('allProducts'))
        ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
        ->with('categories', Departments::all()->take(5));
    }

}
