<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('passager.mesreservation', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('passager.reservation.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('passager.reservation.edit', compact('reservation'));
    }
    public function updateStatut(Request $request, $id)
        {
            $reservation = Reservation::findOrFail($id);

            // Changez le statut selon votre logique. Par exemple, vous pouvez alternativer entre 'actif' et 'terminé'.
            $reservation->statut = $reservation->statut === 'actif' ? 'terminé' : 'actif';
            $reservation->save();

            return redirect()->back()->with('success', 'Statut de la réservation mis à jour.');
        }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }
}
