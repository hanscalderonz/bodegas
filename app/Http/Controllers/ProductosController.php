<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductosModel;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $productos = ProductosModel::Search($request->nombre)->orderBy('id', 'DESC')->paginate(4);
        return view('productos.index', compact('productos'));
    }

    public function lista(Request $request)
    {
        $nombre = $request->get('nombre');
        $productos = ProductosModel::Search($request->nombre)->orderBy('id', 'DESC')->paginate(4);
        return view('productos.lista', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre_producto'=>'required', 'codigo_producto'=>'required', 'numero_cajas'=>'required', 'precio_caja'=>'required', 'restriccion_edad'=>'required' ]);
        $codigo = ProductosModel::find(['codigo_producto' => $request->codigo_producto]);
        if(count($codigo) == 0){
            ProductosModel::create($request->all());
            return redirect()->route('productos.index')->with('success', 'Registro creado satisfactoriamente');
        }
        return redirect()->route('productos.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos=ProductosModel::find($id);
        return view('productos.show',compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=ProductosModel::find($id);
        return view('productos.edit',compact('productos'));
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
        $this->validate($request,[ 'nombre_producto'=>'required', 'numero_cajas'=>'required', 'precio_caja'=>'required', 'restriccion_edad'=>'required' ]);
        $producto = ProductosModel::find($id);
        if($producto){
            if( $request->sacar_cajas ){
                if($producto->numero_cajas > $request->numero_cajas){
                    $producto->numero_cajas -= $request->numero_cajas;
                }else{
                    return redirect()->route('productos.index')->with('error','No hay suficientes cajas en bodega');
                }
            }else{
                $producto->numero_cajas += $request->numero_cajas;
            }
            $producto->save();
        }else{
            return redirect()->route('productos.index')->with('error','Ha ocurrido un error inesperado');
        }
        return redirect()->route('productos.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductosModel::find($id)->delete();
        return redirect()->route('productos.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function comprar(Request $request, $id)
    {
        $this->validate($request,[ 'numero_cajas'=>'required' ]);
        $producto = ProductosModel::find($id);
        if($producto){
            if($producto->numero_cajas >= $request->numero_cajas){
                $producto->numero_cajas -= $request->numero_cajas;
            }else{
                return redirect()->route('productos.lista')->with('error','No hay suficientes cajas en bodega');
            }
            $producto->save();
        }else{
            return redirect()->route('productos.lista')->with('error','Ha ocurrido un error inesperado');
        }
        return redirect()->route('productos.lista')->with('success','Registro actualizado satisfactoriamente');
    }

    public function compras($id)
    {
        $productos=ProductosModel::find($id);
        return view('productos.compras',compact('productos'));
    }

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
}