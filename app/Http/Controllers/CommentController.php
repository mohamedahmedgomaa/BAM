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
}
