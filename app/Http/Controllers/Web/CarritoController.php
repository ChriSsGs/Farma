<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\stock;
use App\Models\Subcategoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $producto_id = Crypt::decrypt($request->producto);
        } catch (Exception $e) {
            redirect()->back(); 
        }

        $producto_db = Producto::findOrfail($producto_id);
        if(empty(Session::get('carrito'))){
            Session::push('carrito',$producto_db);
        }else{
            $sproductos = Session::get('carrito');
            $stotal = count(Session::get('carrito'));
            for($i = 0; $i<$stotal;$i++){
                if($sproductos[$i]->id === $producto_id){
                return redirect()->back()->withErrors('producto ya agregado al carrito');
            }
        }
                Session::push('carrito',$producto_db);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}