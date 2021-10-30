<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UsuariosModel;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $usuarios = UsuariosModel::Search($request->nombre)->orderBy('id', 'DESC')->paginate(4);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombres'=>'required', 'email'=>'required', 'password'=>'required', 'edad'=>'required', 'tipo'=>'required', 'dinero'=>'required' ]);
        $request['password'] = md5($request->password);
        //dd($request->all());
        UsuariosModel::create($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios=UsuariosModel::find($id);
        return view('usuarios.show',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios=UsuariosModel::find($id);
        return view('usuarios.edit',compact('usuarios'));
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

        $this->validate($request,[ 'email'=>'required', 'password'=>'required' ]);
        $request['password'] = md5($request->password);
        UsuariosModel::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsuariosModel::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
}