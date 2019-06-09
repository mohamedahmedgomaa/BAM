<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MessagesDatatable;
use Illuminate\Http\Request;
use App\Message;
use Storage;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MessagesDatatable $trade)
    {
        //
        return $trade->render('admin.messages.index', ['title'=> trans('admin.messages')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.messages.create', ['title'=> trans('admin.add')]);
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
                'text'               => 'required',
                'from'             => 'nullable|numeric',
                'to'             => 'nullable|numeric',
            ],[],[
                'text'               => trans('admin.text'),
                'from'             => trans('admin.from'), 
                'to'             => trans('admin.to'), 
            ]);
        Message::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('messages'));
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
        $message = Message::find($id);
        $title = trans('admin.edit');
        return view('admin.messages.edit', compact('message', 'title'));
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
                'text'               => 'required',
                'from'             => 'nullable|numeric',
                'to'             => 'nullable|numeric',
            ],[],[
                'text'               => trans('admin.text'),
                'from'             => trans('admin.from'), 
                'to'             => trans('admin.to'), 
            ]);
        Message::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('messages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messages = Message::find($id);
        $messages->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('messages'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $messages = Message::find($id);
                $messages->delete();
            }
        } else {
            $messages = Message::find(request('item'));
            $messages->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('messages'));
    }
}
