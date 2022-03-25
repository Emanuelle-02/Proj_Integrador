@extends('bibliotecario.layouts.bibliotecario')
@section('content')

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
                        <h5>Resultado da busca</h5>
                    </div>
                    <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('bibliotecarioDashboard')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
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
                    </div>
                </div>
            </div>
        </div>
@endsection