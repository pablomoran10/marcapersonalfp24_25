<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function getIndex()
    {
        return view('proyectos.index')
            ->with('proyectos', Proyecto::all());
    }

    public function getShow($id)
    {
            return view('proyectos.show')
                ->with('proyecto', Proyecto::findOrFail($id))
                ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $proyecto = new Proyecto;
        $proyecto->nombre = $request->nombre;
        $proyecto->docente_id = $request->docente_id;
        $proyecto->dominio = $request->dominio;
        // to do: serialize metadatos
        $proyecto->metadatos = serialize(array($request->metadatos));
        $proyecto->save();

        return redirect()->action([self::class, 'getShow'], ['id' => $proyecto->id]);
    }

    public function getEdit($id)
    {
            return view('proyectos.edit')
                ->with('proyecto', Proyecto::findOrFail($id))
                ->with('id', $id);
    }

    public function putEdit(Request $request, $id): RedirectResponse
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->docente_id = $request->docente_id;
        $proyecto->dominio = $request->dominio;
        try{
            $proyecto->save();
        }catch (\Exception $e){
            return redirect()->action([self::class, 'getEdit'], ['id' => $proyecto->id])
                ->with('error', $e->getMessage());
        }


        return redirect()->action([self::class, 'getShow'], ['id' => $proyecto->id]);
    }
}
