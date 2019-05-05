<?php

namespace App\DataTables;

use App\Model\Product;
use Yajra\DataTables\Services\DataTable;

class ProductsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.products.btn.checkbox')
            ->addColumn('color', 'admin.products.btn.color')
            ->addColumn('edit', 'admin.products.btn.edit')
            ->addColumn('delete', 'admin.products.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'color',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Product::query()->with('user')->select('products.*');
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    // ->parameters($this->getBuilderParameters());
                    ->parameters([
                        'dom'        => 'Blfrtip',
                        'lengthMenu' => [[10,25,50,100], [10,25,50, trans('admin.all_record')]],
                        'buttons'    =>[
                            [
                                'text' => '<i class="fa fa-plus"></i> '. trans('admin.add'),
                                 'className' => 'btn btn-info',"action"=>"function(){
                                    window.location.href = '". \URL::current() ."/create';
                                 }"
                            ],
                            
                            ['extend'   => 'print', 'className' => 'btn btn-primary', 
                                                        'text' => '<i class="fa fa-print"></i>'],
                            ['extend'   => 'csv', 'className' => 'btn btn-info',
                                                        'text' => '<i class="fa fa-file"></i> '. trans('admin.ex_csv')],
                            ['extend'   => 'excel', 'className' => 'btn btn-success',
                                                        'text' => '<i class="fa fa-file"></i> '. trans('admin.ex_excel')],
                            ['extend'   => 'reload', 'className' => 'btn btn-default',
                                                        'text' => '<i class="fa fa-refresh"></i> '],
                            [
                                'text' => '<i class="fa fa-trash"></i> ',
                                 'className' => 'btn btn-danger delBtn',
                            ],
                        ],
                        'initComplete' => " function () {
                            this.api().columns([2,3]).every(function() {
                                    var column = this;
                                    var input = document.createElement(\"input\");
                                    $(input).appendTo($(column.footer()).empty())
                                    .on('keyup', function() {
                                            column.search($(this).val(), false, false, true).draw();
                                        });
                                    });
                            }",
                            'language' => datatable_lang(),
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'          => 'checkbox',
                'data'          => 'checkbox',
                'title'         => '<input type="checkbox" class"check_all" onclick="check_all()" />',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,
            ],[
                'name'  => 'id',
                'data'  => 'id',
                'title' => 'ID',
            ],[
                'name'  => 'title',
                'data'  => 'title',
                'title' => trans('admin.title'),
            ],[
                'name'  => 'content',
                'data'  => 'content',
                'title' => trans('admin.content'),
            ],[
                'name'  => 'user.name',
                'data'  => 'user.name',
                'title' => trans('admin.user_id'),
            ],[
                'name'  => 'price',
                'data'  => 'price',
                'title' => trans('admin.price'),
            ],[
                'name'  => 'color',
                'data'  => 'color',
                'title' => trans('admin.color'),
            ],[
                'name'  => 'size',
                'data'  => 'size',
                'title' => trans('admin.size'),
            ],[
                'name'  => 'weight',
                'data'  => 'weight',
                'title' => trans('admin.weight'),
            ],[
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ],[
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.updated_at'),
            ],[
                'name'          => 'edit',
                'data'          => 'edit',
                'title'         => trans('admin.edit'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,

            ],[
                'name'          => 'delete',
                'data'          => 'delete',
                'title'         => trans('admin.delete'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products_' . date('YmdHis');
    }
}