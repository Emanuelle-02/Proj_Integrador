<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;
use Auth;
use App\Emprestimo;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __contstruct(){
        $this->middleware('auth');
        $this->middleware(['role:usuario']);
    }

    public function dashboard(){
        $livros = Livro::orderBy('id', 'desc')->paginate(10);
        $livrosCount = Livro::count();
        $emprestimo = Emprestimo::all();
        return view('user.dashboard', compact('livros', 'livrosCount', 'emprestimo'));
    }

    public function livroDetalhe($id){
        $livro = Livro::find($id);
        return view('user.gerenciar.user.detalhe', compact('livro'));
    }

    public function busca(){
        $search_text = $_GET['query'];
        $livros = Livro::where('titulo', 'LIKE', '%'.$search_text.'%')
        ->orWhere('autor', 'LIKE', '%'.$search_text.'%')
        ->orWhere('genero', 'LIKE', '%'.$search_text.'%')
        ->get();

        return view('user.gerenciar.user.busca', compact('livros'));
    }

    public function meusEmprestimos(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('user.gerenciar.user.meusEmprestimos', compact('emprestimo'));

    }

    public function emprestimo($id){
            
        $livro = Livro::find($id);
        $user = auth()->user();
        $emprestimo = new Emprestimo;

        $emprestimo->user_id = $user->id;
        $emprestimo->book_id = $livro->id;
        $emprestimo->data_emprestimo = Carbon::now();
        $emprestimo->data_devolucao = Carbon::now()->addDays(8);

        $livro-> save();
        $emprestimo->save();

        return redirect()->route('meusEmprestimos');
    }

    public function renovarEmprestimo($id){
        $emprestimo = Emprestimo::find($id);
        $emprestimo->status = 'renovando';
        $emprestimo->save();
        
        return redirect()->route('meusEmprestimos');
    }

    public function devolverEmprestimo($id){
        $emprestimo = Emprestimo::find($id);
        $emprestimo->status = 'devolvendo';
        $emprestimo->save();
        
        return redirect()->route('meusEmprestimos');
    }

    
}
