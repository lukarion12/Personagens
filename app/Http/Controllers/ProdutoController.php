<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Produto;
use App\Categoria;

class ProdutoController extends Controller
{
    
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos', compact('produtos'));
    }

    
    public function create()
    {
        $cats = Categoria::all();
        return view('produto-novo', compact('cats'));
    }

    
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nomeProduto');
        $produto->descricao = $request->input('descProduto');
        $produto->id_categoria = $request->input('catProduto');
        $produto->quantidade = $request->input('qtdProduto');
        $produto->preco = $request->input('pcProduto');
        $path = $request->file('imagemProduto')->store('images','public');
        $produto->imagem = $path;
        $produto->save();
        return redirect('/produtos');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $cats = Categoria::all();
        $p = Produto::find($id);
        return view("produto-editar", compact('p','cats'));
    }

    
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $img_antiga = $produto->imagem;
        $produto->nome = $request->input('nomeProduto');
        $produto->descricao = $request->input('descProduto');
        $produto->id_categoria = $request->input('catProduto');
        $produto->quantidade = $request->input('qtdProduto');
        $produto->preco = $request->input('pcProduto');

        if ($request->file('imagemProduto') != null){
            
            $path = $request->file('imagemProduto')->store('images','public');
            $produto->imagem = $path;
            Storage::disk('public')->delete(img_antiga);


        }            
        $produto->save();
        return redirect('/produtos');
    }

    
    public function destroy($id)
    {
        $produto = Produto::find($id);
        Storage::disk('public')->delete($produto->imagem);
        $produto->delete();
        return redirect("/produtos");
    }
}
