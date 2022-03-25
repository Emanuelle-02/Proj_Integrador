@extends('user.layouts.user')
@section('content')
    <head>
        <style>
            .btn-default {
                margin-bottom: 10px;
                background-color: black;
                color: white;
            }
            .row-descr {
                text-align: justify;
            }
        </style>
    </head>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Detalhes do Livro</h5>
                </div> 
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('userDashboard')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="row">  
                        <div class="col-md-6">
                            <label for="titulo">Título</label>
                            <pre>{{$livro->titulo}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="autor">Autor</label>
                            <pre>{{$livro->autor}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="genero">Gênero</label>
                            <pre>{{$livro->genero}}</pre>
                        </div>
                        <div class="row-descr">
                            <div class="col-md-12">
                                <label for="descricao">Descrição</label>
                                <br>
                                <p>{{$livro->descricao}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="isbn">ISBN</label>
                            <pre>{{$livro->isbn}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="paginas">Número de páginas</label>
                            <pre>{{$livro->paginas}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="disponibilidade">Quantidade disponível:</label>
                            <pre>{{$livro->disponibilidade}}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection