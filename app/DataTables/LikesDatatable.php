<?php

namespace App\DataTables;

use App\Like;
use Yajra\DataTables\Services\DataTable;

class LikesDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.likes.btn.checkbox')
            ->addColumn('edit', 'admin.likes.btn.edit')
            ->addColumn('delete', 'admin.likes.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
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
        return Like::query();
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
                'name'  => 'like',
                'data'  => 'like',
                'title' => trans('admin.like'),
            ],[
                'name'  => 'user_id',
                'data'  => 'user_id',
                'title' => trans('admin.user_id'),
            ],[
                'name'  => 'product_id',
                'data'  => 'product_id',
                'title' => trans('admin.product_id'),
            ],[
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ],[
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.updated_at'),
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
        return 'likes_' . date('YmdHis');
    }
}
