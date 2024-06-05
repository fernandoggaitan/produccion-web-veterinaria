<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::select('id', 'nombre', 'fecha_nacimiento', 'categoria_id')
            ->where('is_visible', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('mascotas.index', [
            'mascotas' => $mascotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('mascotas.create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required',
            'fecha_nacimiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required'
        ]);
        
        Mascota::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()
            ->route('mascotas.index')
            ->with('status', 'El registro se ha agregado correctamente correctamente');;

    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', [
            'mascota' => $mascota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('mascotas.edit', [
            'categorias' => $categorias,
            'mascota' => $mascota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required',
            'fecha_nacimiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required'
        ]);

        $mascota->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()
            ->route('mascotas.index')
            ->with('status', 'El registro se ha modificado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //$mascota->delete();

        $mascota->update([
            'is_visible' => false
        ]);

        return redirect()
            ->route('mascotas.index')
            ->with('status', 'El registro se ha eliminado correctamente');

    }
}
