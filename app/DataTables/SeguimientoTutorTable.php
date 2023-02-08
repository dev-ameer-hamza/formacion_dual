<?php

namespace App\DataTables;


use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Profesorado;
use App\Models\SeguimientoTutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SeguimientoTutorTable extends DataTable
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
            ->addColumn('alumno',function($model){
                $alumno = Alumno::whereId($model->alumno_id)->first();
                return $alumno->name ." ". $alumno->surname;
            })
            ->addColumn('fecha',function($model){
                return $model->date;
            })
            ->filterColumn('fecha', function ($query, $keyword) {
                $query->where('date', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('fecha',function($query,$order){
                $query->orderBy('date',$order)->get();
            })
            ->addColumn('asistentes',function($model){
                return $model->asistents;
            })
            ->filterColumn('asistentes', function ($query, $keyword) {
                $query->where('asistents', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('asistentes',function($query,$order){
                $query->orderBy('asistents',$order)->get();
            })
            ->addColumn('tipo_tutoria',function($model){
                return $model->tutorial_type;
            })
            ->filterColumn('tipo_tutoria', function ($query, $keyword) {
                $query->where('tutorial_type', 'like',"%" . $keyword . "%")->get();
            })
            ->orderColumn('tipo_tutoria',function($query,$order){
                $query->orderBy('tutorial_type',$order)->get();
            })
            ->addColumn('objetivos',function($model){
                return $model->objectives;
            })
            ->addColumn('decisiones',function($model){
                return $model->decisions;
            })
            ->addColumn('nota',function($model){
                return $model->note;
            })
            ->rawColumns([
                'alumno',
                'fecha',
                'asistentes',
                'tipo_tutoria',
                'objetivos',
                'decisiones',
                'nota'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \SeguimientoTutor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SeguimientoTutor $model)
    {
        $tutor = Auth::guard('profesorado')->user();
        return $model->newQuery()->where('profesorado_id',$tutor->id);
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
            ->scrollX(0)
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
        $columns['alumno'] = ['data' => 'alumno', 'alumno' => 'name', 'title' => 'Nombre & Apellido'];
        $columns['fecha'] = ['data' => 'fecha', 'name' => 'fecha', 'title' => 'Fecha'];
        $columns['asistentes'] = ['data' => 'asistentes', 'name' => 'asistentes', 'title' => 'Asistentes',  ];
        $columns['tipo_tutoria'] = ['data' => 'tipo_tutoria', 'name' => 'tipo_tutoria', 'title' => 'Tipo Tutoria',  ];
        $columns['objetivos'] = ['data' => 'objetivos', 'name' => 'objetivos', 'title' => 'Objetivos',  ];
        $columns['decisiones'] = ['data' => 'decisiones', 'name' => 'decisiones', 'title' => 'Decisiones',  ];

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
