<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CommentsDatatable;
use Illuminate\Http\Request;
use App\Model\Comment;
use Storage;
use App\Model\Product;
use App\Role;
use App\User;
use App\Like;
use DB;

class StatisticsController extends Controller
{
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



        return view('admin.home', compact('statistics'));
    }

}
