<?php

namespace App\DataTables;


use App\Models\Alumno;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AlumnosDeTutorTable extends DataTable
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
                return $model->name ." ". $model->surname;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like',$keyword)->get();
            })
            ->orderColumn('name',function($query,$order){
                $query->orderBy('name',$order)->get();
            })
            ->addColumn('dni',function($model){
                return $model->dni;
            })
            ->filterColumn('dni', function ($query, $keyword) {
                $query->where('dni', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('dni',function($query,$order){
                $query->orderBy('dni',$order)->get();
            })
            ->addColumn('tel',function($model){
                return $model->tel;
            })
            ->filterColumn('tel', function ($query, $keyword) {
                $query->where('tel', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('tel',function($query,$order){
                $query->orderBy('tel',$order)->get();
            })
            ->addColumn('birth_date',function($model){
                return $model->birth_date;
            })
            ->filterColumn('birth_date', function ($query, $keyword) {
                $query->where('birth_date', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('birth_date',function($query,$order){
                $query->orderBy('birth_date',$order)->get();
            })
            ->addColumn('empresa',function($model){
                return $model->tutorEmpresas()->wherePivot('end_date',null)->first()->empresa->name;
            })
            ->addColumn('tutor_empresa',function($model){
                return $model->tutorEmpresas()->wherePivot('end_date',null)->first()->name;
            })
            ->rawColumns([
                'name',
                'dni',
                'tel',
                'birth_date',
                'empresa',
                'tutor_empresa'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \SeguimientoAlumno $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Alumno $model)
    {
        $tutor = Auth::guard('profesorado')->user();
        $ids = $tutor->alumnos->pluck('id');
        return $model->newQuery()->whereIn('id',$ids);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('segdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->language('https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json')
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
            ]);;

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns['id'] = ['data' => 'id', 'name' => 'id', 'title' => 'ID','className' => 'text-left'];
        $columns['name'] = ['data' => 'name', 'name' => 'name', 'title' => 'Nombre & Apellido'];
        $columns['dni'] = ['data' => 'dni', 'name' => 'dni', 'title' => 'DNI'];
        $columns['tel'] = ['data' => 'tel', 'name' => 'tel', 'title' => 'Telefono',  ];
        $columns['birth_date'] = ['data' => 'birth_date', 'name' => 'birth_date', 'title' => 'Fecha Nacimiento',  ];
        $columns['empresa'] = ['data' => 'empresa', 'name' => 'empresa', 'title' => 'Empresa',  ];
        $columns['tutor_empresa'] = ['data' => 'tutor_empresa', 'name' => 'tutor_empresa', 'title' => 'Tutor Empresa',  ];

        return $columns;
    }

    /**
     * Get filename for export.
     *
     *
     */
    protected function filename() : string
    {
        return 'TutorAlumnos_' . date('YmdHis');
    }
}
