<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    public function index()
    {

        $alumnos = DB::table('alumnos')
            ->get();

        return view('alumnos.index', [
            'alumnos' => $alumnos,
        ]);

    }

    public function create()
    {
        $alumno = (object) [
            'nombre' => null,
            'localidad' => null,
        ];

        return view('alumnos.create', [
            'alumno' => $alumno
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('alumnos')->insert([
            'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alunmno insertado con éxito.');
    }

    public function edit($id)
    {
        $alumno = $this->findAlumno($id);

        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $this->findAlumno($id);

        DB::table('alumnos')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno modificado con éxito.');
    }

    public function destroy($id)
    {
        $alumnos = $this->findAlumno($id);

        DB::delete('DELETE FROM alumnos WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Alumno borrado correctamente');
    }


    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
        ]);

        return $validados;
    }

    private function findAlumno($id)
    {
        $alumnos = DB::table('alumnos')
            ->where('id', $id)
            ->get();

        abort_if($alumnos->isEmpty(), 404);

        return $alumnos->first();
    }
}
