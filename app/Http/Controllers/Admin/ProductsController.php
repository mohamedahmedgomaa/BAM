<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDatatable;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatable $trade)
    {
        //
        return $trade->render('admin.products.index', ['title' => trans('admin.products')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect()->route('products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        // $data = $this->validate(request(),
        //     [
        //         'title' => 'required',
        //         'photo' => 'required|' . v_image(),
        //         'content' => 'required',
        //         'price' => 'required|numeric',
        //         'user_id' => 'nullable|numeric',
        //     ], [], [
        //         'title' => trans('admin.title'),
        //         'photo' => trans('admin.photo'),
        //         'content' => trans('admin.content'),
        //         'price' => trans('admin.price'),
        //         'user_id' => trans('admin.user_id'),
        //     ]);
        // if (request()->hasFile('photo')) {
        //     $data['photo'] = up()->upload([
        //         'file' => 'photo',
        //         'path' => 'products',
        //         'upload_type' => 'single',
        //         'delete_file' => '',
        //     ]);
        // }
        // Product::create($data);
        // session()->flash('success', trans('admin.record_added'));
        // return redirect(aurl('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $title = trans('admin.edit');
        return view('admin.products.index', compact('product', 'title')); // 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data = $this->validate(request(),
        //     [
        //         'title' => 'required',
        //         'photo' => 'required|' . v_image(),
        //         'content' => 'required',
        //         'price' => 'required|numeric',
        //         'user_id' => 'nullable|numeric',
        //     ], [], [
        //         'title' => trans('admin.title'),
        //         'photo' => trans('admin.photo'),
        //         'content' => trans('admin.content'),
        //         'price' => trans('admin.price'),
        //         'user_id' => trans('admin.user_id'),
        //     ]);
        // if (request()->hasFile('photo')) {
        //     $data['photo'] = up()->upload([
        //         'file' => 'photo',
        //         'path' => 'products',
        //         'upload_type' => 'single',
        //         'delete_file' => '',
        //     ]);
        // }
        // Product::where('id', $id)->update($data);
        // session()->flash('success', trans('admin.updated_record'));
        // return redirect(aurl('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $products = Product::find($id);
                $products->delete();
            }
        } else {
            $products = Product::find(request('item'));
            $products->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }
}
