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
        
        Mascota::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('mascotas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        //
    }
}
