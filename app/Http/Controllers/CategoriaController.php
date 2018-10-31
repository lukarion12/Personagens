<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('/categorias', compact('categorias'));
    }

    public function create()
    {
        return view('/categoria-nova');
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->input('nomeCategoria');
        $categoria->save();
        return redirect('/categorias');       
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

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria-editar', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nome = $request->input('nomeCategoria');
        $categoria->save();
        return redirect('/categorias'); 
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect('/categorias'); 
    }

    public function indexWithTrashed(){
        $categorias = Categoria::onlyTrashed()->get();
        return view('categoria-restaurar', compact('categorias'));
        

    }

    public function restore($id){
        $categoria = Categoria::onlyTrashed()->find($id);
        $categoria->restore();
        return redirect('/categorias');     

    }
}
