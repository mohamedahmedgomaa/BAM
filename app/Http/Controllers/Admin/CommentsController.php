<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CommentsDatatable;
use Illuminate\Http\Request;
use App\Model\Comment;
use Storage;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentsDatatable $trade)
    {
        //
        return $trade->render('admin.comments.index', ['title'=> trans('admin.comments')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.comments.create', ['title'=> trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $data = $this->validate(request(), 
            [
                'comment'               => 'required', 
                'product_id'            => 'required|numeric',
                'user_id'               => 'required|numeric',
            ],[],[
                'comment'               => trans('admin.comment'),
                'product_id'            => trans('admin.product_id'), 
                'user_id'               => trans('admin.user_id'), 
            ]);
        Comment::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('comments'));
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
        $comment = Comment::find($id);
        $title = trans('admin.edit');
        return view('admin.comments.edit', compact('comment', 'title'));
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
        $data = $this->validate(request(), 
            [
                'comment'               => 'required', 
                'product_id'            => 'required|numeric',
                'user_id'               => 'required|numeric',
            ],[],[
                'comment'               => trans('admin.comment'),
                'product_id'            => trans('admin.product_id'), 
                'user_id'               => trans('admin.user_id'), 
            ]);
        Comment::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('comments'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $comments = Comment::find($id);
                $comments->delete();
            }
        } else {
            $comments = Comment::find(request('item'));
            $comments->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('comments'));
    }
}
