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
        
        //
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
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'email' => 'required|email|max:40',
            'telefone' => 'required|min:11|max:11',
            'password' => 'required|min:6|max:40',
            
        ],[
            'nome.required' => 'Nome é obrigatório.',
            'nome.min' => 'Nome precisa ter no minimo 3 letras.',
            'nome.max' => 'Nome precisa ter no maximo 40 letras.',
            'telefone.required' => 'telefone é obrigatório',
            'telefone.min' => 'telefone precisa do DDD + Numero total de 11 digitos.',
            'telefone.max' => 'telefone precisa do DDD + Numero total de 11 digitos.',
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha obrigatória.',
            'password.min' => 'Senha com minima de 6 caracteres',
            'password.max' => 'Senha maxima de 40 caracteres.',
        ]);


        $usuario = new User;

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->telefone = $request->telefone;
        $usuario->password = bcrypt($request->password);

        $usuario->save();

        return redirect('login')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function cadastrarQuarto()
    {
        return view('quarto');
    }

    public function cadastrarQuartoStore(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'capacidade' => 'required|integer',
            'preco_diaria' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            
            
        ],[
            'numero.required' => 'numero é obrigatório.',
            'numero.integer' => 'Numero precisa ser um numero inteiro.',
            'capacidade.required' => 'capacidade é obrigatorio.',
            'capacidade.integer' => 'capacidade precisa ser um numero inteiro',
            'preco_diaria.required' => 'diaria é obrigatório.',
            'preco_diaria.numeric' => 'diaria precisa ser numero/decimal.',
            'preco_diaria.regex' => 'diaria precisa ser numero/decimal.',
           
        ]);

        $quarto = new Quarto;

        $quarto->numero = $request->numero;
        $quarto->capacidade = $request->capacidade;
        $quarto->preco_diaria = $request->preco_diaria;
        $quarto->disponivel = true;

        $quarto->save();

        return redirect('quarto')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function painel()
    {
        $quartos = Quarto::where('disponivel', '=' , true)->get();
        return view('dashboard', compact('quartos'));
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
    })->with('reservas')->get();

    // dd($quartosOcupados);

    return view('quartosocupados', compact('quartosOcupados'));
}
    
}
