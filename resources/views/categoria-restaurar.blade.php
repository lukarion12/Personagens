@extends('layout.base', ["current"=>"categorias"])

@section('body')
    <h1>Categorias</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categorias as $c)
        <tr>
          <td>{{$c->id}}</td>
          <td>{{$c->nome}}</td>
          <td><a href="/categorias/restaurar/{{$c->id}}" class="btn btn-success">recuperar</a></td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection