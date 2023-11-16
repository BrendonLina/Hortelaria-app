<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quarto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuartoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $quartos = Quarto::where('disponivel', '=' , true)->get();

        // return view('index', compact('quartos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha obrigatória.'
        ]);


        if(Auth::attempt($credenciais)){

            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        }
        if(!Auth::check()){

            return redirect()->back()->with('danger','Email ou Senha incorreto');
        }
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function cadastrarStore(Request $request)
    {
        $usuario = new User;

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->telefone = $request->telefone;
        $usuario->password = bcrypt($request->password);

        $usuario->save();

        return redirect('login');
    }

    public function cadastrarQuarto()
    {
        return view('quarto');
    }

    public function cadastrarQuartoStore(Request $request)
    {
        $quarto = new Quarto;

        $quarto->numero = $request->numero;
        $quarto->capacidade = $request->capacidade;
        $quarto->preco_diaria = $request->preco_diaria;
        $quarto->disponivel = true;

        $quarto->save();

        return redirect('dashboard');
    }

    public function painel()
    {
       
        return view('dashboard');
    }

    public function listarDisponiveis()
    {
        $quartos = Quarto::where('disponivel', '=' , true)->get();

        return view('index', compact('quartos'));

    }

    public function quartosOcupados()
    {
        $quartosOcupados = "";
        return view('quartosocupados', compact('quartosOcupados'));
    }

    public function quartosOcupadosStore(Request $request)
{
    $request->validate([
        'data_especifica' => 'required|date',
    ]);

    
    $dataEspecifica = $request->input('data_especifica');

    $quartosOcupados = Quarto::whereHas('reservas', function ($query) use ($dataEspecifica) {
        $query->whereDate('data_checkin', '<=', $dataEspecifica)
            ->whereDate('data_checkout', '>=', $dataEspecifica);
    })->get();

    return view('quartosocupados', compact('quartosOcupados'));
}
    
}
