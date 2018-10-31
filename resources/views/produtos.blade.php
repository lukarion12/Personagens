@extends('layout.base', ["current"=>"produtos"])

@section('body')
    <h1>Categorias</h1>

    <table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Imagem</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Categoria</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $p)
        <tr>
          <td>{{$p->id}}</td>
          <td>{{$p->nome}}</td>
          <td>{{$p->descricao}}</td>
          <td style="text-align: center" ><img src="{{ asset('storage/'.$p->imagem) }}" width="200" height="200" class="img-fluid img-responsive img-thumbnail"></td>
          <td>{{$p->preco}}</td>
          <td>{{$p->quantidade}}</td>
          <td>{{$p->categoria["nome"] }}</td>
          <td>
            <a class="btn btn-success" href="/produtos/editar/{{$p->id}}">Editar</a>
            <a class="btn btn-success" href="/produtos/apagar/{{$p->id}}">Apagar</a>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection