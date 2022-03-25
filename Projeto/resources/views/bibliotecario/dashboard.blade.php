@extends('bibliotecario.layouts.bibliotecario')
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$livrosCount}}</h3>

                <p>Títulos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <p class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-down"></i></p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$usuariosCount}}</h3>
                <p>Usuários cadastrados no sistema</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('userShow')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- Conteúdo -->
        <head>
            <style>
                .btn-primary {
                    margin-bottom: 10px;
                }
                .form-control {
                  margin-bottom: 10px;
                }

                .btn-default{
                  margin-bottom: 10px;
                  color: white;
                  background-color:black;
                }
                
            </style>
        </head>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Gerenciar Acervo</h5>
                    </div>
                    <div class="col-md-9 text-right m-b-10">
                        <a href="{{ route('criarLivro') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar novo livro</a>
                    </div>
                </div>
                <div id="busca-container" class="col-md-10">
                  <form action="{{ route('search') }}" type="get">
                    <input type="text" name="query" type="search" class="form-control" placeholder="Buscar livro por id/título/autor ou gênero"  required>
                    <button class="btn btn-default" type="submit"><i class="fas fa-search"></i> Buscar</button>
                  </form>
                </div>
                  <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Genero</th>
                                    <th>Qtd</th>
                                    <th style="padding:12px;" width="15%">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- puxa os dados do banco -->
                                @foreach($livros as $livro)
                                <tr>
                                    <td>{{ $livro->id }}</td>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->autor }}</td>
                                    <td>{{ $livro->genero }}</td>
                                    <td>{{ $livro->disponibilidade }}</td>
                                    <td>
                                        <a href="{{route('livroDetails', $livro->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-right"></i></a>
                                        <a href="{{route('livroEdit', $livro->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('livroDelete', $livro->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Paginação -->
                    <div class="row justify-content-center">
                        {!! $livros->links('pagination::bootstrap-4') !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection