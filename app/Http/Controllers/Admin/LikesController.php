<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\LikesDatatable;
use Illuminate\Http\Request;
use App\Like;
use Storage;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(likesDatatable $trade)
    {
        //
        return $trade->render('admin.likes.index', ['title'=> trans('admin.likes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // //
        // $data = $this->validate(request(), 
        //     [
        //         'like'               => 'required|numeric|in:1',
        //         'user_id'             => 'required|numeric',
        //         'product_id'             => 'required|numeric',
        //     ],[],[
        //         'like'               => trans('admin.like'),
        //         'user_id'             => trans('admin.user_id'), 
        //         'product_id'             => trans('admin.product_id'), 
        //     ]);
        // Like::create($data);
        // session()->flash('success', trans('admin.record_added'));
        // return redirect(aurl('likes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $like = Like::find($id);
        // $title = trans('admin.edit');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data = $this->validate(request(), 
        //     [
        //         'like'               => 'required|numeric|in:1',
        //         'user_id'             => 'required|numeric',
        //         'product_id'             => 'required|numeric',
        //     ],[],[
        //         'like'               => trans('admin.like'),
        //         'user_id'             => trans('admin.user_id'), 
        //         'product_id'             => trans('admin.product_id'), 
        //     ]);
        // Like::where('id', $id)->update($data);
        // session()->flash('success', trans('admin.updated_record'));
        // return redirect(aurl('likes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $likes = Like::find($id);
        $likes->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('likes'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $likes = Like::find($id);
                $likes->delete();
            }
        } else {
            $likes = Like::find(request('item'));
            $likes->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('likes'));
    }
}
