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
            'quarto' => 'required|integer|exists:quartos,id',
            'data_checkin' => 'required|date|after_or_equal:today',
            'data_checkout' => 'required|date|after:data_checkin',
        ],[
            'quarto.required' => 'quarto é obrigatório',
            'quarto.integer' => 'quarto precisa ser numero inteiro',
            'data_checkin.date' => 'data precisa ser uma data valida',
            'data_checkin.required' => 'data de checkin é obrigatório',
            'data_checkin.after_or_equal' => 'data de checkin precisa ser hoje ou superior',
            'data_checkout.required' => 'data de checkout é obrigatório',
            'data_checkout.datel' => 'data de checkout precisa ser uma data valida',
            'data_checkout.after' => 'data de checkout precisa ser superior a data de checkin',
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
