@extends('bibliotecario.layouts.bibliotecario')
@section('content')
    <head>
        <style>     
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
                    <h5>Solicitações pendentes - Empréstimo</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id Empréstimo</th>
                                <th>Id Livro</th>
                                <th>id Usuario</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @csrf
                            <!-- puxa os dados do banco -->
                            @foreach($emprestimo as $emprestimos)
                            <tr>
                                @if( $emprestimos->status =='aguardando')
                                <td>{{ $emprestimos->id }}</td>
                                <td>{{ $emprestimos->book_id }}</td>
                                <td>{{ $emprestimos->user_id }}</td>
                                <td>
                                    <a href="{{route('aprovarEmprestimo', $emprestimos->id)}}" class="btn btn-success btn-sm">Autorizar</a>
                                    <a href="{{route('negarEmprestimo', $emprestimos->id)}}" class="btn btn-danger btn-sm">Rejeitar</a>
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