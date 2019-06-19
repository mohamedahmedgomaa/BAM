<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\Model\Product;
use Auth;
use App\User;

class CommentController extends Controller
{
    //
    public function store(Product $product)
    {
        $comment = new Comment;
        $this->validate(request(), 
            [
                'comment'               => 'required', 
                'product_id'            => 'sometimes|nullable|numeric',
                'user_id'               => 'sometimes|nullable|numeric',
            ]);
        // Comment::create($data);
    	// Comment::create([
    	// 	'comment' => request('comment'),
    	// 	'product_id' => $product->id,
    	// 	'user_id' => auth()->id(),
    	// ]);

        $comment->comment = request('comment');
        $comment->product_id = $product->id;
        $comment->user_id = auth()->id();
        $comment->save();

    	return back();
    }

    public function delete($id)
    {
        $comments = Comment::findOrFail($id);
        if ($comments->user_id == auth()->id()) {
            $comments->delete();
            return redirect()->back();
        }
        abort('404');
    }

    public function edit($id)
    {
        $product = Comment::findOrFail($id);
        if ($product->user_id == auth()->id()) {
            return view('edit')->with('comments', $product)->with('departments', Departments::all())->with('categories', Departments::all()->take(5))
                ->with('footerTopProduct', Comment::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
        }
        abort('404');
    }

    public function update(Request $request, $id)
    {
        //
        $comment = Comment::findOrFail($id);

        if ($comment->user_id == auth()->id()) {
            $this->validate($request, [
                'name'     => 'required',
            ]);

            $comment->name = request('name');

            $comment->save();

            return redirect('/homepage/' . $comment->id);
        }
        abort('404');

    }
}
