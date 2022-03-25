<?php

namespace App\Http\Controllers;
use App\Role;
use App\Livro;
use App\User;
use App\Emprestimo;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BibliotecarioController extends Controller
{
    public function __contstruct(){
        $this->middleware('auth');
        $this->middleware(['role:bibliotecario']);
    }

    public function dashboard(){
        $livros = Livro::orderBy('id', 'desc')->paginate(10);
        $livrosCount = Livro::count();
        $usuariosCount = User::count();
        return view('bibliotecario.dashboard', compact('livros', 'livrosCount', 'usuariosCount'));
    }

    public function criarLivro(){
        $roles = Role::all();
        return view('bibliotecario.gerenciar.user.criar', compact('roles'));
    }

    public function livroStore(Request $request){
        $this->validate($request, [
            'titulo'            => 'required|max:255',
            'autor'             => 'required|max:255',
            'genero'            => 'required|max:255',
            'descricao'         => 'required|max:2500',
            'isbn'              => 'required|max:50',
            'paginas'           => 'required|max:50',
            'disponibilidade'   => 'required|max:50',

        ]);

        $livro = new Livro;
        $livro->titulo     = $request->titulo;
        $livro->autor    = $request->autor;
        $livro->genero = $request->genero;
        $livro->descricao = $request->descricao;
        $livro->isbn = $request->isbn;
        $livro->paginas = $request->paginas;
        $livro->disponibilidade = $request->disponibilidade;

        $livro->save();
        return redirect()->route('bibliotecarioDashboard');
    }

    public function livroDetails($id){
        $livro = Livro::find($id);
        return view('bibliotecario.gerenciar.user.details', compact('livro'));
    }

    public function livroEdit($id){
        $livro =  Livro::find($id);
        $roles = Role::all();
        return view('bibliotecario.gerenciar.user.edit', compact('livro', 'roles'));
    }

    public function livroUpdate(Request $request, $id){
        $this->validate($request, [
            'titulo'            => 'required|max:255',
            'autor'             => 'required|max:255',
            'genero'            => 'required|max:255',
            'descricao'         => 'required|max:2500',
            'isbn'              => 'required|max:50',
            'paginas'           => 'required|max:50',
            'disponibilidade'   => 'required|max:50',

        ]);

        $livro = Livro::find($id);
        $livro->titulo     = $request->titulo;
        $livro->autor    = $request->autor;
        $livro->genero = $request->genero;
        $livro->descricao = $request->descricao;
        $livro->isbn = $request->isbn;
        $livro->paginas = $request->paginas;
        $livro->disponibilidade = $request->disponibilidade;

        $livro->save();
        return redirect()->route('bibliotecarioDashboard');
    }

    public function livroDelete($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect()->route('bibliotecarioDashboard')->with('success', 'Dados removidos com sucesso!');
    }

    public function userShow(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('bibliotecario.gerenciar.user.show', compact('users'));
    }

    public function userDetalhes($id){
        $user = User::find($id);
        return view('bibliotecario.gerenciar.user.detalhes', compact('user'));
    }

    public function search(){
        $search_text = $_GET['query'];
        $livros = Livro::where('titulo', 'LIKE', '%'.$search_text.'%')
        ->orWhere('autor', 'LIKE', '%'.$search_text.'%')
        ->orWhere('genero', 'LIKE', '%'.$search_text.'%')
        ->orWhere('id', 'LIKE', '%'.$search_text.'%')
        ->get();

        return view('bibliotecario.gerenciar.user.search', compact('livros'));
    }
    //Solicitações
    public function acervoIndex(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('bibliotecario.gerenciar.user.index', compact('emprestimo'));
    }

    public function aprovarEmprestimo($id){
            $emprestimo = Emprestimo::find($id);
            $id = $emprestimo->book_id;
            $livros = Livro::find($id);
            Livro::find($id)->decrement('disponibilidade');
            
            $emprestimo->status = "aprovado";
            $emprestimo->data_emprestimo = Carbon::now();
            $emprestimo->data_devolucao = Carbon::now()->addDays(7);
            
            $emprestimo->save();
            $livros->save();

            return redirect()->route('acervoIndex');
    }

    public function negarEmprestimo($id){
            $emprestimo = Emprestimo::find($id);
            $id = $emprestimo->book_id;
            $livros = Livro::find($id);
            //Livro::find($id)->increment('disponibilidade');
            $emprestimo->status ="rejeitado";
            
            $livros->save();
            $emprestimo->save();

            return redirect()->route('acervoIndex');
        }

    public function livroRenovacao(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('bibliotecario.gerenciar.user.renovacao', compact('emprestimo'));
    }

    public function autorizarRenovacao($id){
        $emprestimo = Emprestimo::find($id);
        $emprestimo->status = 'renovado';
        $emprestimo->data_devolucao = Carbon::now()->addDays(8);
        $emprestimo->save();

        return redirect()->route('livroRenovacao');
    }

    public function negarRenovacao($id){
        $emprestimo = Emprestimo::find($id);
        $id = $emprestimo->book_id;
        $livros = Livro::find($id);

        $emprestimo->status ="rejeitado";
        $livros->save();
        $emprestimo->save();

        return redirect()->route('livroRenovacao');
    }

    public function livroDevolucao(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('bibliotecario.gerenciar.user.devolucao', compact('emprestimo'));
    }

    public function autorizarDevolucao($id){
            $emprestimo = Emprestimo::find($id);
            $id = $emprestimo->book_id;
            $livros = Livro::find($id);
            Livro::find($id)->increment('disponibilidade');

            $emprestimo->status ="finalizado";
            
            $livros->save();
            $emprestimo->save();
            
            return redirect()->route('livroDevolucao');
    }

    public function buscar(){
        $busca_text = $_GET['query'];
        $users = User::where('id', 'LIKE', '%'.$busca_text.'%')
        ->orWhere('name', 'LIKE', '%'.$busca_text.'%')
        ->orWhere('email', 'LIKE', '%'.$busca_text.'%')
        ->get();

        return view('bibliotecario.gerenciar.user.buscar', compact('users'));
    }

    public function emprestimosAtuais(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('bibliotecario.gerenciar.user.emprestimosAtuais', compact('emprestimo'));
    }
}
