<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\stock;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $categoria = Categoria::all();
        $subcategoria = Subcategoria::all();
        $stock = stock::all();
        return view('administrativo.producto',
        [
            'productos'=>$productos,
            'categorias'=>$categoria,
            'subcategorias'=>$subcategoria,
            'stocks' => $stock
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->validate($request,[
            'nombre' => ['required','string','max:200'],
            'descripcion' => ['required','string','max:500'],
            'observacion' => ['required','string','max:1000'],
            'precio' => ['required','numeric','min:0'],
            'caducidad' => ['required','date'],
            'categoria_id' => ['required','numeric'],
            'subcategoria_id' => ['required','numeric'],
        ])){
            Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'observacion' => $request->observacion,
                'precio' => $request->precio,
                'cantidad' => 1,
                'stock' => 1,
                'imagen' => 'img/productos/noimage.jpg',
                'caducidad' => $request->caducidad,
                'categoria_id' => $request->categoria_id,
                'subcategoria_id' => $request->subcategoria_id,
            ]);

            $idproducto = Producto::latest('id')->first();

            stock::create([
                'producto_id' => $idproducto->id,
                'stock' => 1
            ]);

            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Producto = Producto::findOrFail($id);
        if($Producto) {
            if($this->validate($request,[
                'nombre' => ['required','string','max:50'],
                'descripcion' => ['required','string'],
            ])){
                $Producto->nombre = $request->nombre;
                $Producto->descripcion = $request->descripcion;
                $Producto->save();
                return redirect()->back();
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Producto = Producto::findOrFail($id);
        //$Stock = Stock::findOrFail($id); 
        #falta operacion para eliminar el elemento de la tabla relacionada #STOCK
        if($Producto) {
            $Producto->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
