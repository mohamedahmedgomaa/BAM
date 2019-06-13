<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Departments;
use App\Like;
use App\Model\Product;
use App\Order;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Seession;
use Image;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class PostController extends Controller
{


    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $topTenProductByLikes = Product::withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->get();
        return view('homepage', compact(['products', 'topTenProductByLikes']))
            ->with('departments', Departments::all());
    }

   
    public function product(Product $products, $id)
    {
        $products = Product::find($id);
        $next_page = Product::where('id', '>', $products->id)->min('id');
        $prev_page = Product::where('id', '<', $products->id)->max('id');
        return view('product')->with('product', $products)
            ->with('categories', Departments::all()->take(5))
            ->with('next', Product::find($next_page))
            ->with('prev', Product::find($prev_page));
    }
    
    public function createProduct() {
        return view('createProduct')->with('departments', Departments::all())
            ->with('categories', Departments::all()->take(5))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }

    public function store(Request $request)
    {
        $product = new Product;

        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,gif,png|max:4084',
            'price' => 'required|numeric',
            'user_id' => 'nullable|numeric',
            'offer'   => 'nullable|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('/upload/' . $filename));

            $product->photo = $filename;
        }

        $product->title = request('title');
        $product->content = request('content');
        $product->price = request('price');
        $product->category_id = request('category_id');
        if ($request->offer > 0) {
            $product->offer = request('offer');
        } else {
            $product->offer = 0;
        }
        $product->user_id = auth()->id();
        $product->save();


        // $request->photo->move(public_path('upload'), $filename);

        return redirect('/homepage');

    }


    public function delete($id)
    {
        $products = Product::find($id);
        if ($products->user_id == auth()->id()) {
            $products->delete();
            return redirect('/homepage');
        }
        abort('404');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product->user_id == auth()->id()) {
            return view('edit')->with('products', $product)->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
        }
        abort('404');
    }

    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);

        if ($product->user_id == auth()->id()) {
            $this->validate($request, [
                'title'     => 'required',
                'content'   => 'required',
                'photo'     => 'required|image|mimes:jpg,jpeg,gif,png|max:15084',
                'price'     => 'required|numeric',
                'offer'     => 'sometimes|nullable|numeric',
            ]);

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                Image::make($photo)->resize(300, 300)->save(public_path('/upload/' . $filename));

                $product->photo = $filename;
            }

            $product->title = request('title');
            $product->content = request('content');
            $product->price = request('price');
            $product->offer = request('offer');

            $product->save();

            return redirect('/homepage/' . $product->id);
        }
        abort('404');

    }

    public function like(Request $request)
    {
        $like_s = $request->like_s;
        $product_id = $request->product_id;
        $change_like = 0;

        $like = DB::table('likes')
            ->where('product_id', $product_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$like) {
            $new_like = new Like;
            $new_like->product_id = $product_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();

            $is_like = 1;

        } elseif ($like->like == 1) {
            DB::table('likes')
                ->where('product_id', $product_id)
                ->where('user_id', Auth::user()->id)
                ->delete();

            $is_like = 0;

        } elseif ($like->like == 0) {
            DB::table('likes')
                ->where('product_id', $product_id)
                ->where('user_id', Auth::user()->id)
                ->update(['like' => 1]);

            $is_like = 1;
            $change_like = 1;

        }

        $response = array(
            'is_like' => $is_like,
            'change_like' => $change_like,
        );

        return response()->json($response, 200);

    }
//
//
//    public function dislike(Request $request)
//    {
//        $like_s = $request->like_s;
//        $product_id = $request->product_id;
//        $change_dislike = 0;
//
//        $dislike = DB::table('likes')
//            ->where('product_id', $product_id)
//            ->where('user_id', Auth::user()->id)
//            ->first();
//
//        if (!$dislike) {
//            $new_like = new Like;
//            $new_like->product_id = $product_id;
//            $new_like->user_id = Auth::user()->id;
//            $new_like->like = 0;
//            $new_like->save();
//
//            $is_dislike = 1;
//
//        } elseif ($dislike->like == 0) {
//            DB::table('likes')
//                ->where('product_id', $product_id)
//                ->where('user_id', Auth::user()->id)
//                ->delete();
//
//            $is_dislike = 0;
//
//        } elseif ($dislike->like == 1) {
//            DB::table('likes')
//                ->where('product_id', $product_id)
//                ->where('user_id', Auth::user()->id)
//                ->update(['like' => 0]);
//
//            $is_dislike = 1;
//            $change_dislike = 1;
//
//        }
//
//        $response = array(
//            'is_dislike' => $is_dislike,
//            'change_dislike' => $change_dislike,
//        );
//
//        return response()->json($response, 200);
//
//    }


 public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart')->with('categories', Departments::all()->take(5));
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart')->with('categories', Departments::all()->take(5));
    }
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart')->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice])
            ->with('categories', Departments::all()->take(5))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());

    }

//    public function getCheckout()
//    {
//        if (!Session::has('cart')) {
//            return view('shop.shopping-cart')->with('user',Auth::user())->with('categories', Departments::all()->take(5))
//                ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
//        }
//
//        $oldCart = Session::get('cart');
//        $cart = new Cart($oldCart);
//        $total = $cart->totalPrice;
//        return view('shop.checkout', ['total' => $total, 'user'=>Auth::user()])->with('categories', Departments::all()->take(5))
//            ->with('user',Auth::user())->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
//    }
//
//    public function postCheckout(Request $request)
//    {
//        if (!Session::has('cart')) {
//            return redirect()->route('shop.shoppingCart')->with('categories', Departments::all()->take(5))
//                ->with('user',Auth::user())->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
//        }
//        $oldCart = Session::get('cart');
//        $cart = new Cart($oldCart);
//        Stripe::setApiKey('sk_test_sdJiqY1EpLxwdrMGssocEJax00jC21qpGo');
//        try {
//            $charge = Charge::create(array(
//                "amount" => $cart->totalPrice * 100,
//                "currency" => "usd",
//                "source" => $request->input('stripeToken'), // obtained with Stripe.js
//                "description" => "Test Charge"
//            ));
//            $order = new Order();
//            $order->cart = serialize($cart);
//            $order->address = $request->input('address');
//            $order->name = $request->input('name');
//            $order->payment_id = $charge->id;
//
//            Auth::user()->orders()->save($order);
//        } catch (\Exception $e) {
//            return redirect()->route('checkout')->with('error', $e->getMessage());
//        }
//        Session::forget('cart');
//        return redirect()->route('index')->with('user',Auth::user())->with('success', 'Successfully purchased Products !')
//            ->with('categories', Departments::all()->take(5));
//    }



    public function statistics()
    {
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        $comments = DB::table('comments')->count();

        ///////////// User /////////////////

        // User 1 = Most Comments
        $most_comments = User::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->first();

        // $most_comments->comments_count
        $likes_count_1 = DB::table('likes')->where('user_id', $most_comments->id)->count();
        $user_1_count = $most_comments->comments_count + $likes_count_1;

        // User 2 = Most Likes 
        $most_likes = User::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->first();

        // $most_likes->likes_count
        $comments_count_2 = DB::table('comments')->where('user_id', $most_likes->id)->count();
        $user_2_count = $most_likes->likes_count + $comments_count_2;

        if ($user_1_count > $user_2_count) {
            $active_user = $most_comments->name;
            $active_user_likes = $likes_count_1;
            $active_user_comments = $most_comments->comments_count;
        } else {
            $active_user = $most_likes->name;
            $active_user_likes = $most_likes->likes_count;
            $active_user_comments = $comments_count_2;
        }

        ///////////// Product /////////////////

        $mosts_comments = Product::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->first();

        // $mosts_comments->comments_count
        $likes_count_3 = DB::table('likes')->where('product_id', $mosts_comments->id)->count();
        $product_1_count = $mosts_comments->comments_count + $likes_count_3;

        // User 2 = Most Likes 
        $mosts_likes = Product::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->first();

        // $most_likes->likes_count
        $comments_count_4 = DB::table('comments')->where('product_id', $mosts_likes->id)->count();
        $product_2_count = $mosts_likes->likes_count + $comments_count_4;

        if ($product_1_count > $product_2_count) {
            $active_product = $mosts_comments->title;
            $active_product_likes = $likes_count_3;
            $active_product_comments = $mosts_comments->comments_count;
        } else {
            $active_product = $mosts_likes->title;
            $active_product_likes = $mosts_likes->likes_count;
            $active_product_comments = $comments_count_4;
        }

        $statistics = array(
            'users' => $users,
            'products' => $products,
            'comments' => $comments,
            'active_user' => $active_user,
            'active_user_likes' => $active_user_likes,
            'active_user_comments' => $active_user_comments,
            'active_product' => $active_product,
            'active_product_likes' => $active_product_likes,
            'active_product_comments' => $active_product_comments,
        );


        return view('statistics', compact('statistics'))->with('categories', Departments::all()->take(5));
    }


}
