@extends('layout.base', ['current'=>'produtos'])

@section('body')
    <h1>Novo Produto</h1>
    <form action = "/produtos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class = "form-group">        
            <label for="nome">Nome do Produto</label>
            <input type = "text" class = "form-control" name="nomeProduto" id = "nome" placeholder = "Nome do Produto">
            
            <label for="desc">Descrição do Produto</label>
            <textarea class = "form-control " name="descProduto" id = "desc" placeholder = "Descrição do Produto"></textarea>
            
            <label for="cat">Categoria do Produto</label>
            <select id="cat" name = "catProduto" class="form-control">
                @foreach($cats as $c)
                    <option value = "{{$c->id}}">{{$c->nome}}</option>
                @endforeach                
            </select>
        
            <label for="qtd">Quantidade do Produto</label>
            <input type = "number" class = "form-control" name="qtdProduto" id = "qdt" placeholder = "Quantidade do produto">

            <label for="pc">Preço do Produto</label>
            <input type = "number" step="any" class = "form-control" name="pcProduto" id = "pc" placeholder = "Preço do produto">

            <label for="img">Imagem</label>
            <input type="file" class="form-control-file" name="imagemProduto" id="img">  
        
        
        </div>
        <button type="submit" class = "btn btn-success btn-sm">Salvar</button>
        <button type="cancel" class = "btn btn-danger btn-sm">Cancelar</button>
    </form>
@endsection