<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioCatalogoController extends Controller
{
    
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $servicios = Servicio::get();
        return view('servicios_catalogo.index', [
            'servicios' => $servicios,
            'cart' => $cart
        ]);
    }

}
