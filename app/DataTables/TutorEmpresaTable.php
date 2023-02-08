<?php

namespace App\DataTables;


use App\Models\TutorEmpresa;
use App\Models\Profesorado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TutorEmpresaTable extends DataTable
{    /**
 * Build DataTable class.
 *
 * @param mixed $query Results from query() method.
 * @return \Yajra\DataTables\DataTableAbstract
 */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('name',function($model){
                return $model->name;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like',$keyword)->get();
            })
            ->orderColumn('name',function($query,$order){
                $query->orderBy('name',$order)->get();
            })
            ->addColumn('surname',function($model){
                return $model->surname;
            })
            ->filterColumn('surname', function ($query, $keyword) {
                $query->where('surname', 'like',$keyword)->get();
            })
            ->orderColumn('surname',function($query,$order){
                $query->orderBy('surname',$order)->get();
            })
            ->addColumn('empresa',function($model){
                return $model->empresa->name;
            })
            ->addColumn('email',function($model){

                    return $model->email;
            })
            ->filterColumn('email', function ($query, $keyword) {
                $query->where('email', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('email',function($query,$order){
                $query->orderBy('email',$order)->get();
            })
            ->addColumn('tel',function($model){

                    return $model->telefono;
            })
            ->filterColumn('tel', function ($query, $keyword) {
                $query->where('tel', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('tel',function($query,$order){
                $query->orderBy('tel',$order)->get();
            })
            ->addColumn('acciones',function($model){
                return "<a href='".route('cordinador.editarTutorEmpresa',['tutor' => $model])."'>Editar</a>";
            })
            ->rawColumns([
                'name',
                'surname',
                'empresa',
                'email',
                'tel',
                'acciones'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Profesorado $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TutorEmpresa $model)
    {
        $tutor = Auth::guard('profesorado')->user();
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('cordatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->language('https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json')
            ->dom('Bfrtip')
            ->orderBy(0)
            ->scrollX(false)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
            ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns['id'] = ['data' => 'id', 'name' => 'id', 'title' => 'ID','className' => 'text-left'];
        $columns['name'] = ['data' => 'name', 'name' => 'name', 'title' => 'Nombre'];
        $columns['surname'] = ['data' => 'surname', 'name' => 'surname', 'title' => 'Apellido'];
        $columns['empresa'] = ['data' => 'empresa', 'name' => 'empresa', 'title' => 'Empresa'];
        $columns['email'] = ['data' => 'email', 'name' => 'email', 'title' => 'Correo'];
        $columns['acciones'] = ['data' => 'acciones', 'name' => 'acciones', 'title' => 'Accion'];

        return $columns;
    }

    /**
     * Get filename for export.
     *
     *
     */
    protected function filename() : string
    {
        return 'tutorempresa' . date('YmdHis');
    }
}
