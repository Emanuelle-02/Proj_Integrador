@extends('user.layouts.user')
@section('content')

        <!-- Conteúdo -->
        <head>
            <style>
                .btn-primary {
                    margin-bottom: 10px;
                }
                .form-control {
                  margin-bottom: 10px;
                }

                .btn-secondary{
                  margin-bottom: 10px;
                  color: white;
                  background-color:black;
                }
                .btn-default{
                  margin-bottom: 10px;
                  width: 90px;
                }
                .card{
                  width: 100%;
                  overflow-x: auto;
                }
            </style>
        </head>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Resultado da busca</h5>
                    </div>
                </div>
                <div id="busca-container" class="col-md-10">
                  <form action="{{ route('busca') }}" type="get">
                    <input type="text" name="query" type="busca" class="form-control" placeholder="Buscar livro por título/autor ou gênero"  required>
                    <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                  </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Genero</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- puxa os dados do banco -->
                                @foreach($livros as $livro)
                                <tr>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->autor }}</td>
                                    <td>{{ $livro->genero }}</td>
                                    <td>
                                        @if($livro->disponibilidade > 0)
                                           <font color=\"green\">Disponível</font>  
                                        @else
                                            <font color=\"red\">Indísponivel</font>
                                        @endif         	
                                        </b>
                                    <td>
                                        <a href="{{route('livroDetalhe', $livro->id)}}" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i> Info</a>
                                        <a href="#" class="btn btn-info btn-sm">Empréstimo</a>
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