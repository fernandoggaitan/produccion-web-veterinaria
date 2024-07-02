<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioCatalogoController extends Controller
{
    
    public function index()
    {
        $servicios = Servicio::get();
        return view('servicios_catalogo.index', [
            'servicios' => $servicios
        ]);
    }

}
