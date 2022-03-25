@extends('admin.layouts.admin')
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
                    <h5>Empréstimos atuais</h5>
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
                                <th>data de emprestimo</th>
                                <th>data para devolução</th>
                            </tr>
                        </thead>
                        <tbody>
                        @csrf
                            <!-- puxa os dados do banco -->
                            @foreach($emprestimo as $emprestimos)
                            <tr>
                                @if( $emprestimos->status =='aprovado')
                                <td>{{ $emprestimos->id }}</td>
                                <td>{{ $emprestimos->book_id }}</td>
                                <td>{{ $emprestimos->user_id }}</td> 
                                <td>{{ $emprestimos->data_emprestimo }}</td>
                                <td>{{ $emprestimos->data_devolucao }}</td>
                                @else
                                @if( $emprestimos->status =='renovado')   
                                <td>{{ $emprestimos->id }}</td>
                                <td>{{ $emprestimos->book_id }}</td>
                                <td>{{ $emprestimos->user_id }}</td> 
                                <td>{{ $emprestimos->data_emprestimo }}</td>
                                <td>{{ $emprestimos->data_devolucao }}</td>    
                                @endif           
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