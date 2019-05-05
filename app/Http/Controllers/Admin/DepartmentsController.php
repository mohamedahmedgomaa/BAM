<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;
use Storage;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.departments.index', ['title'=> trans('admin.departments')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.departments.create', ['title'=> trans('admin.add')]);
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
                'name'              =>'required', 
                'parent'            =>'sometimes|nullable|numeric',
            ],[],[
                'name'       => trans('admin.dep_name_ar'),
                'parent'         => trans('admin.parent'),
            ]);
        
        Departments::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('departments'));
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
        $department = Departments::find($id);
        $title = trans('admin.edit');
        return view('admin.departments.edit', compact('department', 'title'));
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
                'name'              =>'required', 
                'parent'            =>'sometimes|nullable|numeric',
            ],[],[
                'name'       => trans('admin.dep_name_ar'),
                'parent'         => trans('admin.parent'),
        ]);
        Departments::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('departments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function delete_parent($id) {
        $department_parent = Departments::where('parent', $id)->get();
        foreach ($department_parent as $sub) {
            self::delete_parent($sub->id);
            // if (!empty($sub->icon)) {
            //     Storage::has($sub->icon) ? Storage::delete($sub->icon):'';
            // }
            $subdepartment = Departments::find($sub->id);
            if (!empty($subdepartment)) {
                $subdepartment->delete();
            }
        }
        $dep = Departments::find($id);
        // if (!empty($dep->icon)) {
        //         Storage::has($dep->icon) ? Storage::delete($dep->icon):'';
        //     }
            $dep->delete();
    }

    public function destroy($id)
    {
        self::delete_parent($id);
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('departments'));
    }
}
