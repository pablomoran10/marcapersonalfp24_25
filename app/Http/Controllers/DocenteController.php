<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getIndex()
    {
        return view('docentes.index')
            ->with('docentes', Docente::all());
    }

    public function getShow($id)
    {
            return view('docentes.show')
                ->with('docente', Docente::findOrFail($id))
                ->with('id', $id);
    }

    public function getCreate()
    {
        return view('docentes.create');
    }

    public function getEdit($id)
    {
            return view('docentes.edit')
                ->with('docente', Docente::findOrFail($id))
                ->with('id', $id);
    }
}
