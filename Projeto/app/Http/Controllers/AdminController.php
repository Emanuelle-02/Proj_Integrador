<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Role;
Use Hash;
use Auth;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\Emprestimo;

class AdminController extends Controller
{
    public function __contstruct(){
        $this->middleware('auth');
        $this->middleware(['role:administrador']);
    }

    public function dashboard(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        $usuariosCount = User::count();
        return view('admin.dashboard', compact('users','usuariosCount'));
    }

    public function userIndex(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.gerenciar.user.index', compact('users'));
    }
    
    public function cadastrarUser(){
        $roles = Role::all();
        return view('admin.gerenciar.user.cadastrar', compact('roles'));
    }

    public function userStore(Request $request){
        $request->validate([
            'name'       => 'required|max:255',
            'email'      => 'required|email|unique:users',
            'matricula'  => 'required',
            'telefone'   => 'required',
            'password'   => 'required',
        ]);

        $user = user::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'matricula' => $request->matricula,
            'telefone'  => $request->telefone,
            //O erro era que tinha que usar esse Hash::make ao invés de só $request->password
            'password' => Hash::make($request['password']), 
        ]);

        //$user->save();
        $user->attachRole($request->role_id);
        //event(new Registered($user));
        
        return redirect()->route('adminDashboard');


    }

    public function userDetails($id){
        $user = User::find($id);
        return view('admin.gerenciar.user.details', compact('user'));
    }

    public function userEdit($id){
        $user =  User::find($id);
        $roles = Role::all();
        return view('admin.gerenciar.user.edit', compact('user', 'roles'));
    }

    public function userUpdate(Request $request, $id){
        $this->validate($request, [
            'name'       => 'required|max:255',
            'email'      => 'required|email|unique:users,email,'.$id,
            'matricula'  => 'required',
            'telefone'   => 'required',
        ]);

        $user = User::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->matricula    = $request->matricula;
        $user->telefone     = $request->telefone;

        $user->save();
        //$user->syncRoles(explode(',', $request->roles));
        return redirect()->route('adminDashboard');
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('adminDashboard')->with('success', 'Dados removidos com sucesso!');
    }

    public function generatePDF(){
        $livros_data = $this->get_livros_data();
        return view('admin.gerenciar.user.generate_pdf')->with('livros_data', $livros_data);
    }
    
    public function get_livros_data(){
        $livros_data = DB::table('livros')
                        ->limit(200)
                        ->get();
        return $livros_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_livros_data_to_html());
     return $pdf->stream();
    }

    function convert_livros_data_to_html()
    {
        $livros_data = $this->get_livros_data();
        $output = '
        <h4>IFRN-Lib. - Acervo</h4>
        <h2 align="center">Relatório</h2>
        <h3>Dados do Acervo</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
            <th style="border: 1px solid; padding:12px;" width="5%">Id</th>
            <th style="border: 1px solid; padding:12px;" width="20%">Título</th>
            <th style="border: 1px solid; padding:12px;" width="20%">Autor</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Genero</th>
            <th style="border: 1px solid; padding:12px;" width="15%">ISBN</th>
            <th style="border: 1px solid; padding:12px;" width="5%">Qtd</th>
            <th style="border: 1px solid; padding:12px;" width="20%">Criado em</th>
        </tr>
     ';  
     foreach($livros_data as $livro)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$livro->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->titulo.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->autor.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->genero.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->isbn.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->disponibilidade.'</td>
       <td style="border: 1px solid; padding:12px;">'.$livro->created_at.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }

    public function buscarUser(){
        $search_text = $_GET['query'];
        $users = User::where('id', 'LIKE', '%'.$search_text.'%')
        ->orWhere('name', 'LIKE', '%'.$search_text.'%')
        ->orWhere('email', 'LIKE', '%'.$search_text.'%')
        ->orWhere('id', 'LIKE', '%'.$search_text.'%')
        ->get();

        return view('admin.gerenciar.user.search', compact('users'));
    }

    public function emprestimos(){
        $emprestimo = Emprestimo::orderBy('id', 'desc')->paginate(25);
        return view('admin.gerenciar.user.emprestimos', compact('emprestimo'));
    }
}
