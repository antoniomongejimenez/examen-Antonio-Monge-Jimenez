<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function index()
    {

        $notas = DB::table('notas', 'n')
            ->leftJoin('alumnos AS alumno', 'alumno_id', '=', 'alumno.id')
            ->select('n.*','alumno.nombre as nombre')
            ->get();

        return view('notas.index', [
            'notas' => $notas,
        ]);
    }
}
