<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Departments;
use App\Model\Product;
use App\Model\Setting;
use App\Order;
use App\Role;
use Illuminate\Http\Request;
use Session;

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
        $category = Departments::findOrFail($id);
        $next_page = Departments::where('id', '>', $category->id)->min('id');
        $prev_page = Departments::where('id', '<', $category->id)->max('id');
        return view('categories.category')->with('category', $category)
            ->with('categories', Departments::all()->take(5))
            ->with('next', Departments::find($next_page))
            ->with('prev', Departments::find($prev_page))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

    public function footerTopProduct()
    {
        $footerTopProduct = Product::withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get();
        return view('index', compact('footerTopProduct'));
    }

    public function shopshow()
    {
//      $shopshow = Role::find(2)->users;
        $shopshow = Role::where('name', 'admin_shop')->firstOrFail()->users;

        return view('adminshop_show', compact('shopshow'))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function allusers()
    {
        $shopshow = Role::find(1)->users;
        return view('adminshop_show', compact('shopshow'))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function allProduct()
    {
        $allProducts = Product::all();
        return view('allProducts', compact('allProducts'))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function alloffer()
    {
        $alloffer = Product::where('offer', '>', 0)->get();

        return view('alloffer', compact('alloffer'))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }


    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart')->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $item = $cart->items;
        $totalQty = $cart->totalQty;
        // dd($totalQty);
        return view('shop.checkout', ['total' => $total])->with('categories', Departments::all()->take(5))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('total', $total)
            ->with('totalQty', $totalQty);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart')->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
                ->with('totalQty', $totalQty);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();

        $this->validate(request(), [
            'address' => 'required',
            'name' => 'required',
            'total' => 'nullable|numeric',
            'user_id' => 'nullable|numeric',
            'totalQty' => 'nullable|numeric',
        ]);

        $order->address = request('address');
        $order->name = request('name');
        $order->user_id = auth()->id();
        $order->total = $cart->totalPrice;
        $order->totalQty = $cart->totalQty;
        $order->save();

        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Successfully purchased Products !')
            ->with('categories', Departments::all()->take(5));
    }

    public function about() {
        return view('contactus.about')->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

    public function team() {
        return view('contactus.team')->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

}
