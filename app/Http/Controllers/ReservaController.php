<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function reserva()
    {
        $quartosDisponiveis = Quarto::where('disponivel', true)->get();
        
        return view('reserva', compact('quartosDisponiveis'));
    }

    public function reservaStore(Request $request)
    {
        $request->validate([
            'quarto' => 'required|exists:quartos,id',
        ]);

        
        $quarto = Quarto::find($request->input('quarto'));

        if (!$quarto->disponivel) {
            return redirect()->route('reserva')->with('error', 'Este quarto não está disponível.');
        }

        
        $reserva = new Reserva([
            'data_checkin' => $request->input('data_checkin'),
            'data_checkout' => $request->input('data_checkout'),
            'user_id' => auth()->user()->id,
        ]);

        $reserva->quarto()->associate($quarto);
        $reserva->save();

        
        $quarto->disponivel = false;
        $quarto->save();

        return redirect()->route('reserva')->with('success', 'Reserva criada com sucesso!');
    }

    public function usuarioReserva()
    {
        
        $user = Auth::user();
        
        $reservasUsuario = Reserva::where('user_id', $user->id)->get();
        
        return view('usuarioreserva', compact('reservasUsuario'));
    }
}
