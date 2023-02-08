<?php

namespace App\DataTables;


use App\Models\Alumno;
use App\Models\SeguimientoAlumno;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SeguimientoAlumnoTable extends DataTable
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
                return $model->alumno->name;
            })
            ->filterColumn('alumno', function ($query, $keyword) {
                $alumnos = Alumno::where('name','like',"%" . $keyword . "%")->get();
                $query->whereIn('alumno_id', $alumnos->pluck('id'))->get();
            })
            ->addColumn('periodo',function($model){
                return $model->date;
            })
            ->filterColumn('periodo', function ($query, $keyword) {
                $query->where('date', 'like',"%" . $keyword . "%")->get();
            })
            ->addColumn('actividades',function($model){
                return $model->activities;
            })
            ->filterColumn('actividades', function ($query, $keyword) {
                $query->where('activities', 'like',"%" . $keyword . "%")->get();
            })
            ->editColumn('accion', function ($model) {
                return "<a href='".route('tutor.comentar',['id' => $model->id])."'>Comentar </a>";
            })
            ->rawColumns([
                'alumno',
                'periodo',
                'actividades',
                'accion'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \SeguimientoAlumno $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SeguimientoAlumno $model)
    {
        $tutor = Auth::guard('profesorado')->user();
        $ids = $tutor->alumnos->pluck('id');
        return $model->newQuery()->whereIn('alumno_id',$ids);
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
        $columns['alumno'] = ['data' => 'alumno', 'name' => 'alumno', 'title' => 'Alumno'];
        $columns['date'] = ['data' => 'date', 'name' => 'date', 'title' => 'Periodo'];
        $columns['actividades'] = ['data' => 'actividades', 'name' => 'actividades', 'title' => 'Actividades',  ];
        $columns['accion'] = ['data' => 'accion', 'name' => 'accion', 'title' => 'accion', 'orderable' => false, 'searchable' => false];

        return $columns;
    }

    /**
     * Get filename for export.
     *
     *
     */
    protected function filename() : string
    {
        return 'SeguimientoAlumno_' . date('YmdHis');
    }
}
