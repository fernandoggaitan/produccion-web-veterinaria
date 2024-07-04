<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class CartController extends Controller
{
    
    //Mostrar los ítems del carrito
    public function index(Request $request)
    {
        //Recuperamos los ítems del carrito.
        $cart = $request->session()->get('cart', []);
        return view('cart.index', [
            'cart' => $cart
        ]);
    }

    //Agregar ítems al carrito o bien, modificar la cantidad.
    public function update(Request $request, string $id)
    {
        //Recuperamos el servicio por su id.
        $servicio = Servicio::findOrFail($id);
        //Recuperamos el carrito.
        $cart = $request->session()->get('cart', []);
        //Seteamos el ítem del carrito.
        $cart[$id] = [
            'nombre' => $servicio->nombre,
            'precio' => $servicio->precio,
            'cantidad' => $request->cantidad
        ];
        //Guardamos el carrito en la sesión.
        $request->session()->put('cart', $cart);
        //Retornamos a la página de donde vino.
        return redirect()->back()->with('status', 'El ítem ha sido agregado a su carrito');
    }

    //Eliminar un ítem del carrito.
    public function destroy(Request $request, string $id)
    {
        //Recuperamos el servicio por su id.
        $servicio = Servicio::findOrFail($id);
        //Recuperamos el carrito.
        $cart = $request->session()->get('cart', []);
        //Eliminamos esa posición.
        unset($cart[$id]);
        //Guardamos el carrito en la sesión.
        $request->session()->put('cart', $cart);
        //Retornamos a la página de donde vino.
        return redirect()->back()->with('status', 'El ítem ha sido eliminado de su carrito');
    }

    //Vaciar el carrito.
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->back()->with('status', 'El carrito ha sido vaciado');
    }

}
