<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Like;
use App\Message;
use App\Model\Product;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    //
    public function profile($id)
    {
        $user = User::with('product')->findOrFail($id);
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile', compact('user'))
            ->with('product', $user->product)
            ->with('orders', $orders)
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }


    public function getAllConnections()
    {
        $id = auth()->id();
        $toUsers = Message::distinct()->where('from', $id)->get(['to'])->pluck('to')->toArray();
        $fromUsers = Message::distinct()->where('to', $id)->get(['from'])->pluck('from')->toArray();
        $users = User::with(['messageFrom', 'messageTo'])->whereIn('id', array_merge($toUsers, $fromUsers))->get();
        return view('profile.connection_all')->with('users', $users)
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function getMessagesByUser($id)
    {
        $currentId = auth()->id();
        $user = User::findOrFail($id);
        $toUsers = Message::distinct()->where('from', $currentId)->get(['to'])->pluck('to')->toArray();
        $fromUsers = Message::distinct()->where('to', $currentId)->get(['from'])->pluck('from')->toArray();
        $users = User::with(['messageFrom', 'messageTo'])->whereIn('id', array_merge($toUsers, $fromUsers))->get();
        $currentConnection = [auth()->id(), $id];
        $messages = Message::where(function (Builder $query) use ($id) {
            $query->where('from', auth()->id());
            $query->where('to', $id);
        })->orWhere(function (Builder $query) use ($id) {
            $query->where('to', auth()->id());
            $query->where('from', $id);
        })->get();
        return view('messages.message', compact(['messages', 'users', 'user']))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function send($id)
    {
        $user = User::findOrFail($id);
        return view('messages.send', compact(['user']))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }

    public function receive(Request $request, $id)
    {
        //
        $validated = $this->validate($request, [
            'text' => 'required',
        ]);
        // $message = Message::where('from', $id)->orWhere('to', $id);
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $id,
            'text' => $validated['text']
        ]);
        return redirect()->route('profile.connection.get', ['id' => $id])
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get())
            ->with('categories', Departments::all()->take(5));
    }


    public function update_avatar(Request $request)
    {

        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return redirect('/profile/' . auth()->id());

        } else {
            
            return redirect('/profile/' . auth()->id());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user->id == auth()->id()) {
            return view('users.edit')->with('users', $user);
        }
        abort('404');
    }

    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if ($user->id == auth()->id()) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'sometimes|nullable|min:6',
                'mobile' => 'required|numeric',
                'address' => 'sometimes|nullable',
            ]);
            if (request()->has('password')) {
                $data['password'] = bcrypt(request('password'));
            }

            $user->name = request('name');
            $user->email = request('email');
            $user->mobile = request('mobile');
            $user->address = request('address');

            $user->save();

            return redirect()->route('profile', ['id' => auth()->id()]);
        }
        abort('404');
    }

    public function likedProduct()
    {
        $productId = Like::where('user_id', auth()->id())->get()->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productId)->get();
        return view('likedProduct')->with('products', $products)
            ->with('categories', Departments::all()->take(5))
            ->with('footerTopProduct', Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
    }
}
