<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 text-white px-6 py-4">
                <h3 class="text-xl font-bold">Détails de la réservation</h3>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Reservation Details (2/3 width) -->
                    <div class="lg:col-span-2">
                        <h4 class="text-lg font-bold">Réservation #<span id="reservationId">123</span></h4>
                        
                        <!-- Trip Details -->
                        <div class="mt-6">
                            <h5 class="text-gray-600 font-semibold mb-2">Détails du trajet</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="mb-2"><span class="font-semibold">Départ:</span> <span id="villeDepart">Paris</span></p>
                                    <p><span class="font-semibold">Destination:</span> <span id="villeArrivee">Lyon</span></p>
                                </div>
                                <div>
                                    <p class="mb-2"><span class="font-semibold">Date:</span> <span id="dateDepart">15/04/2025</span></p>
                                    <p><span class="font-semibold">Heure:</span> <span id="heureDepart">09:30</span></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Passenger Details -->
                        <div class="mt-6">
                            <h5 class="text-gray-600 font-semibold mb-2">Passager</h5>
                            <p class="mb-2"><span class="font-semibold">Nom:</span> <span id="passagerNom">Jean Dupont</span></p>
                            <p class="mb-2"><span class="font-semibold">Email:</span> <span id="passagerEmail">jean.dupont@example.com</span></p>
                            <p><span class="font-semibold">Téléphone:</span> <span id="passagerTelephone">06 12 34 56 78</span></p>
                        </div>
                        
                        <!-- Reservation Status -->
                        <div class="mt-6">
                            <h5 class="text-gray-600 font-semibold mb-2">Statut de la réservation</h5>
                            <div id="statutBadge" class="bg-yellow-500 text-white px-3 py-1 rounded inline-block">
                                En attente
                            </div>
                        </div>
                        
                        <!-- Action Buttons (Driver View) -->
                        <div id="driverActions" class="mt-6 hidden">
                            <button id="btnConfirmer" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mr-2">
                                Confirmer
                            </button>
                            <button id="btnRefuser" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Refuser
                            </button>
                        </div>
                        
                        <!-- Action Buttons (Passenger View) -->
                        <div id="passengerActions" class="mt-6 hidden">
                            <button id="btnAnnuler" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Annuler ma réservation
                            </button>
                        </div>
                    </div>
                    
                    <!-- Driver Details (1/3 width) -->
                    <div>
                        <div class="bg-white border rounded-lg overflow-hidden">
                            <div class="bg-gray-600 text-white px-4 py-3">
                                <h5 class="font-semibold">Conducteur</h5>
                            </div>
                            <div class="p-4">
                                <!-- Driver Photo -->
                                <div class="flex justify-center mb-4">
                                    <div id="profileImage" class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-xl font-bold" id="conducteurInitiale">M</span>
                                    </div>
                                </div>
                                
                                <!-- Driver Name -->
                                <h5 class="text-center font-semibold mb-4" id="conducteurNom">Marie Martin</h5>
                                
                                <!-- Driver Info -->
                                <div class="space-y-2">
                                    <p><i class="fas fa-car mr-2"></i> <span id="vehicule">Renault Clio</span></p>
                                    <p><i class="fas fa-star mr-2"></i> Note: <span id="rating">4.8</span>/5</p>
                                    
                                    <button id="btnContacter" class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded hidden">
                                        <i class="fas fa-comment-alt mr-2"></i> Contacter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4 border-t">
                <a href="#" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-2"></i> Retour à mes réservations
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample data - in a real app, this would come from your backend
            const reservation = {
                id: 123,
                statut: 'en attente', // 'en attente', 'confirmé', 'annulé'
                trajet: {
                    ville_depart: 'Paris',
                    ville_arrivee: 'Lyon',
                    date_depart: '15/04/2025',
                    heure_depart: '09:30',
                    conducteur: {
                        id: 456,
                        name: 'Marie Martin',
                        avatar: null,
                        rating: 4.8
                    },
                    vehicule: 'Renault Clio'
                },
                passager: {
                    id: 789,
                    name: 'Jean Dupont',
                    email: 'jean.dupont@example.com',
                    telephone: '06 12 34 56 78'
                }
            };
            
            // Current user role (would come from authentication system)
            const currentUserId = 789; // Assuming we're the passenger
            const isPassenger = currentUserId === reservation.passager.id;
            const isDriver = currentUserId === reservation.trajet.conducteur.id;
            
            // Populate reservation details
            document.getElementById('reservationId').textContent = reservation.id;
            document.getElementById('villeDepart').textContent = reservation.trajet.ville_depart;
            document.getElementById('villeArrivee').textContent = reservation.trajet.ville_arrivee;
            document.getElementById('dateDepart').textContent = reservation.trajet.date_depart;
            document.getElementById('heureDepart').textContent = reservation.trajet.heure_depart;
            document.getElementById('passagerNom').textContent = reservation.passager.name;
            document.getElementById('passagerEmail').textContent = reservation.passager.email;
            document.getElementById('passagerTelephone').textContent = reservation.passager.telephone;
            document.getElementById('conducteurNom').textContent = reservation.trajet.conducteur.name;
            document.getElementById('conducteurInitiale').textContent = reservation.trajet.conducteur.name.charAt(0);
            document.getElementById('vehicule').textContent = reservation.trajet.vehicule;
            document.getElementById('rating').textContent = reservation.trajet.conducteur.rating;
            
            // Update status badge
            const statutBadge = document.getElementById('statutBadge');
            if (reservation.statut === 'confirmé') {
                statutBadge.classList.remove('bg-yellow-500');
                statutBadge.classList.add('bg-green-600');
                statutBadge.textContent = 'Confirmé';
                
                // Show contact button for confirmed reservations
                if (isPassenger) {
                    document.getElementById('btnContacter').classList.remove('hidden');
                }
            } else if (reservation.statut === 'annulé') {
                statutBadge.classList.remove('bg-yellow-500');
                statutBadge.classList.add('bg-red-600');
                statutBadge.textContent = 'Annulé';
            }
            
            // Show appropriate action buttons based on role and status
            if (isDriver && reservation.statut === 'en attente') {
                document.getElementById('driverActions').classList.remove('hidden');
            } else if (isPassenger && reservation.statut === 'confirmé') {
                document.getElementById('passengerActions').classList.remove('hidden');
            }
            
            // Add event listeners for buttons
            document.getElementById('btnConfirmer')?.addEventListener('click', function() {
                updateReservationStatus('confirmé');
            });
            
            document.getElementById('btnRefuser')?.addEventListener('click', function() {
                updateReservationStatus('annulé');
            });
            
            document.getElementById('btnAnnuler')?.addEventListener('click', function() {
                updateReservationStatus('annulé');
            });
            
            function updateReservationStatus(newStatus) {
                // In a real app, this would make an API call to update the status
                console.log(`Updating reservation ${reservation.id} status to: ${newStatus}`);
                
                // For demo purposes, we'll just update the UI
                reservation.statut = newStatus;
                
                // Update status badge
                const statutBadge = document.getElementById('statutBadge');
                statutBadge.className = 'px-3 py-1 rounded inline-block text-white';
                
                if (newStatus === 'confirmé') {
                    statutBadge.classList.add('bg-green-600');
                    statutBadge.textContent = 'Confirmé';
                    
                    // Show contact button
                    if (isPassenger) {
                        document.getElementById('btnContacter').classList.remove('hidden');
                    }
                    
                    // Hide driver actions, show passenger actions
                    document.getElementById('driverActions').classList.add('hidden');
                    if (isPassenger) {
                        document.getElementById('passengerActions').classList.remove('hidden');
                    }
                } else if (newStatus === 'annulé') {
                    statutBadge.classList.add('bg-red-600');
                    statutBadge.textContent = 'Annulé';
                    
                    // Hide all action buttons
                    document.getElementById('driverActions').classList.add('hidden');
                    document.getElementById('passengerActions').classList.add('hidden');
                    document.getElementById('btnContacter').classList.add('hidden');
                }
            }
        });
    </script>
</x-app-layout>