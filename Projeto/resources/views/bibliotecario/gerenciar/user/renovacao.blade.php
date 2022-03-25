@extends('bibliotecario.layouts.bibliotecario')
@section('content')
    <head>
        <style>
            .btn-primary {
                margin-bottom: 10px;
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
                <div class="col-md-10">
                    <h5>Solicitações pendentes - Renovações</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Empréstimo</th>
                                <th>ID Livro</th>
                                <th>ID Usuário</th>
                                <th>data de emprestimo</th>
                                <th>data para devolução</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                        @csrf
                            <!-- puxa os dados do banco -->
                            @foreach($emprestimo as $emprestimos)
                            <tr>
                                @if( $emprestimos->status =='renovando')
                                <td>{{ $emprestimos->id }}</td>
                                <td>{{ $emprestimos->book_id }}</td>
                                <td>{{ $emprestimos->user_id }}</td>
                                <td>{{ $emprestimos->data_emprestimo }}</td>
                                <td>{{ $emprestimos->data_devolucao }}</td>
                                <td>
                                    <a href="{{route('autorizarRenovacao', $emprestimos->id)}}" class="btn btn-success btn-sm">Autorizar</a>
                                    <a href="{{route('negarRenovacao', $emprestimos->id)}}" class="btn btn-danger btn-sm">Rejeitar</a>
                                </td>
                                
                                @endif
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection