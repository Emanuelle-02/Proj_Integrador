@extends('user.layouts.user')
@section('content')
        <head>
            <style>
                .btn-default{
                    background-color: black;
                    color:white;
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
                    <h3>Meus empréstimos</h3>
                    </div>
                </div>
               
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id_Livro</th>
                                    <th>Id_Usuario</th>
                                    <th>Status</th>
                                    <th>Data de emprestimo</th>
                                    <th>Data de devolução</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- puxa os dados do banco -->
                                @foreach($emprestimo as $emprestimos)
                                <tr>
                                @if( $emprestimos->user_id == Auth::user()->id ) 
                                    <td>{{ $emprestimos->book_id }}</td>
                                    <td>{{ $emprestimos->user_id }}</td>
                                    <td>
                                        @if($emprestimos->status == 'aguardando')
                                        <font color="blue">Aguardando</font>
                                        @endif
                                        @if($emprestimos->status == 'aprovado')
                                        <font color="green">Aprovado</font>
                                        @endif
                                        @if($emprestimos->status == 'rejeitado')
                                        <font color="red">Negado</font>
                                        @endif
                                        @if($emprestimos->status == 'renovando')
                                        <font color="yellow">Renovando</font>
                                        @endif
                                        @if($emprestimos->status == 'renovado')
                                        <font color="gold">Renovado</font>
                                        @endif
                                        @if($emprestimos->status == 'devolvendo')
                                        <font color="indigo">Devolvendo</font>
                                        @endif
                                        @if($emprestimos->status == 'finalizado')
                                        <font color="black">Devolvido</font>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $emprestimos->data_emprestimo }}</td>
                                    <td>{{ $emprestimos->data_devolucao }}</td>
                                    
                                    <td>
                                        @if($emprestimos->status == 'aprovado')
                                        <a href="{{route('renovarEmprestimo', $emprestimos->id)}}" class="btn btn-default btn-sm"> Renovar</a>
                                        <a href="{{route('devolverEmprestimo', $emprestimos->id)}}" class="btn btn-warning btn-sm">Devolver</a>
                                        @endif
                                        @if($emprestimos->status == 'renovado')
                                        <a href="{{route('devolverEmprestimo', $emprestimos->id)}}" class="btn btn-warning btn-sm">Devolver</a>
                                        @endif
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