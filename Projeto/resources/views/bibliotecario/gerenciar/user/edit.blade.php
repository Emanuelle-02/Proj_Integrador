@extends('bibliotecario.layouts.bibliotecario')
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

            textarea {
                padding: 10px;
                max-width: 100%;
                line-height: 1.5;
                border-radius: 5px;
                border: 1px solid #ccc;
                box-shadow: 1px 1px 1px #999;
                text-align: justify;
            }
        </style>
    </head>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Editar informações</h5>
                </div>
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('bibliotecarioDashboard')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('livroUpdate', $livro->id) }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" value="{{$livro->titulo}}" name="titulo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="autor">Autor</label>
                                    <input type="autor" value="{{$livro->autor}}" name="autor" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <input type="genero" value="{{$livro->genero}}" name="genero" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea id="descricao" type="descricao"  name="descricao" class="form-control" rows="25" cols="40">{{$livro->descricao}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="isbn" value="{{$livro->isbn}}" name="isbn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="paginas">Páginas</label>
                                    <input type="numner" value="{{$livro->paginas}}" name="paginas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="disponibilidade">Quantidade:</label>
                                    <input type="number" value="{{$livro->disponibilidade}}" name="disponibilidade" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
