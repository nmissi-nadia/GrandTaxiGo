<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trajet;
use App\Models\Reservation;

class ChauffeurController extends Controller
{
    // Afficher les trajets du chauffeur
    public function mesTrajets()
    {
        $trajets = Trajet::where('chauffeur_id', auth()->id())->get();
        return view('chauffeur.trajets.index', compact('trajets'));
    }

    // Créer un nouveau trajet
    public function creerTrajet()
    {
        return view('chauffeur.trajets.create');
    }

    public function enregistrerTrajet(Request $request)
    {
        $request->validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'places_disponibles' => 'required|integer|min:1',
        ]);

        Trajet::create([
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'date_depart' => $request->date_depart,
            'places_disponibles' => $request->places_disponibles,
            'chauffeur_id' => auth()->id(),
            'statut' => 'actif',
        ]);

        return redirect()->route('chauffeur.trajets')->with('success', 'Trajet créé avec succès.');
    }

    // Modifier un trajet existant
    public function modifierTrajet($id)
    {
        $trajet = Trajet::findOrFail($id);
        return view('chauffeur.trajets.edit', compact('trajet'));
    }

    public function mettreAJourTrajet(Request $request, $id)
    {
        $trajet = Trajet::findOrFail($id);

        $request->validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'prix' => 'required|numeric|min:0',
            'places_disponibles' => 'required|integer|min:1',
        ]);

        $trajet->update($request->all());

        return redirect()->route('chauffeur.trajets')->with('success', 'Trajet mis à jour avec succès.');
    }

    // Voir les réservations pour un trajet
    public function voirReservations($idTrajet)
    {
        $reservations = Reservation::where('trajet_id', $idTrajet)->get();
        return view('chauffeur.reservations.index', compact('reservations'));
    }

    // Mettre à jour le statut d'une réservation
    public function mettreAJourStatutReservation(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate(['statut' => 'required|in:confirmée,annulée']);

        $reservation->update(['statut' => $request->statut]);

        return back()->with('success', 'Statut de la réservation mis à jour.');
    }
}
