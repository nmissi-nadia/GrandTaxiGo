<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo - Tableau de bord Chauffeur</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/fr.js"></script>
</head>
<body class="bg-gray-100" x-data="dashboardData()">
    <nav class="bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="font-bold text-xl">GrandTaxiGo</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#" class="bg-blue-900 text-white px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                            <a href="chauffeur-disponibilites.html" class="text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mes disponibilités</a>
                            <a href="chauffeur-reservations.html" class="text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Réservations</a>
                            <a href="chauffeur-historique.html" class="text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Historique</a>
                            <a href="chauffeur-profil.html" class="text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mon profil</a>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full" :src="user.profilePhoto" alt="Photo de profil">
                                <span class="ml-2" x-text="user.name"></span>
                                <button @click="logout" class="ml-4 text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Déconnexion</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Menu mobile -->
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="bg-blue-900 text-white block px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="chauffeur-disponibilites.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Mes disponibilités</a>
                <a href="chauffeur-reservations.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Réservations</a>
                <a href="chauffeur-historique.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Historique</a>
                <a href="chauffeur-profil.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Mon profil</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de bord</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Statistiques -->
            <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Réservations en attente
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900" x-text="stats.pendingReservations"></div>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="chauffeur-reservations.html" class="text-sm font-medium text-blue-600 hover:text-blue-500">Voir toutes les réservations →</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Trajets du mois
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900" x-text="stats.monthTrips"></div>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="chauffeur-historique.html" class="text-sm font-medium text-blue-600 hover:text-blue-500">Voir l'historique →</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Revenue du mois
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900" x-text="stats.monthRevenue + ' DH'"></div>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="text-sm font-medium text-green-600">
                        +<span x-text="stats.revenueIncrease"></span>% par rapport au mois dernier
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservations récentes -->
        <div class="mt-8">
            <h2 class="text-lg font-medium text-gray-900">Réservations récentes</h2>
            <div class="mt-4 bg-white shadow overflow-hidden rounded-lg">
                <template x-if="reservations.length > 0">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Passager
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Départ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Destination
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date et heure
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template x-for="(reservation, index) in reservations" :key="index">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" :src="reservation.passengerPhoto" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900" x-text="reservation.passengerName"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900" x-text="reservation.departure"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900" x-text="reservation.destination"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900" x-text="formatDateTime(reservation.dateTime)"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span :class="getStatusClass(reservation.status)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" x-text="getStatusText(reservation.status)"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <template x-if="reservation.status === 'pending'">
                                            <div class="flex space-x-2">
                                                <button @click="acceptReservation(reservation.id)" class="text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded">Accepter</button>
                                                <button @click="rejectReservation(reservation.id)" class="text-white bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Refuser</button>
                                            </div>
                                        </template>
                                        <template x-if="reservation.status !== 'pending'">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">Détails</a>
                                        </template>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </template>
                <template x-if="reservations.length === 0">
                    <div class="text-center py-6">
                        <p class="text-gray-500">Aucune réservation récente</p>
                    </div>
                </template>
            </div>
        </div>

        <!-- Disponibilités -->
        <div class="mt-8">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900">Mes disponibilités</h2>
                <a href="chauffeur-disponibilites.html" class="text-sm font-medium text-blue-600 hover:text-blue-500">Gérer mes disponibilités →</a>
            </div>
            <div class="mt-4 bg-white shadow overflow-hidden rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-7 gap-4">
                        <template x-for="(day, index) in availability" :key="index">
                            <div class="text-center">
                                <div class="font-medium text-gray-900" x-text="day.name"></div>
                                <div :class="day.available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'" class="mt-2 px-2 py-1 rounded-full text-xs">
                                    <span x-text="day.available ? 'Disponible' : 'Non disponible'"></span>
                                </div>
                                <div class="mt-2 text-sm text-gray-500" x-show="day.available">
                                    <span x-text="day.startTime"></span> - <span x-text="day.endTime"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function dashboardData() {
            return {
                user: {
                    name: 'Mohammed Alami',
                    profilePhoto: '/api/placeholder/40/40'
                },
                stats: {
                    pendingReservations: 5,
                    monthTrips: 28,
                    monthRevenue: 4650,
                    revenueIncrease: 12
                },
                reservations: [
                    {
                        id: 1,
                        passengerName: 'Fatima Benali',
                        passengerPhoto: '/api/placeholder/40/40',
                        departure: 'Casablanca, Maarif',
                        destination: 'Rabat, Centre ville',
                        dateTime: '2025-02-25T09:30:00',
                        status: 'pending'
                    },
                    {
                        id: 2,
                        passengerName: 'Ahmed Tazi',
                        passengerPhoto: '/api/placeholder/40/40',
                        departure: 'Casablanca, Ain Diab',
                        destination: 'El Jadida, Centre',
                        dateTime: '2025-02-25T14:00:00',
                        status: 'pending'
                    },
                    {
                        id: 3,
                        passengerName: 'Sara Khalil',
                        passengerPhoto: '/api/placeholder/40/40',
                        departure: 'Casablanca, Anfa',
                        destination: 'Mohammedia, Centre',
                        dateTime: '2025-02-24T18:00:00',
                        status: 'accepted'
                    },
                    {
                        id: 4,
                        passengerName: 'Youssef Bennis',
                        passengerPhoto: '/api/placeholder/40/40',
                        departure: 'Casablanca, Gauthier',
                        destination: 'Berrechid, Centre',
                        dateTime: '2025-02-24T10:15:00',
                        status: 'completed'
                    }
                ],
                availability: [
                    { name: 'Lundi', available: true, startTime: '08:00', endTime: '18:00' },
                    { name: 'Mardi', available: true, startTime: '08:00', endTime: '18:00' },
                    { name: 'Mercredi', available: true, startTime: '08:00', endTime: '18:00' },
                    { name: 'Jeudi', available: true, startTime: '08:00', endTime: '18:00' },
                    { name: 'Vendredi', available: true, startTime: '08:00', endTime: '18:00' },
                    { name: 'Samedi', available: false, startTime: '', endTime: '' },
                    { name: 'Dimanche', available: false, startTime: '', endTime: '' }
                ],
                
                formatDateTime(dateTime) {
                    return moment(dateTime).locale('fr').format('DD MMM YYYY, HH:mm');
                },
                
                getStatusText(status) {
                    switch(status) {
                        case 'pending': return 'En attente';
                        case 'accepted': return 'Acceptée';
                        case 'rejected': return 'Refusée';
                        case 'completed': return 'Terminée';
                        case 'cancelled': return 'Annulée';
                        default: return status;
                    }
                },
                
                getStatusClass(status) {
                    switch(status) {
                        case 'pending': return 'bg-yellow-100 text-yellow-800';
                        case 'accepted': return 'bg-green-100 text-green-800';
                        case 'rejected': return 'bg-red-100 text-red-800';
                        case 'completed': return 'bg-blue-100 text-blue-800';
                        case 'cancelled': return 'bg-gray-100 text-gray-800';
                        default: return '';
                    }
                },
                
                acceptReservation(id) {
                    // Logique pour accepter une réservation
                    const index = this.reservations.findIndex(r => r.id === id);
                    if (index !== -1) {
                        this.reservations[index].status = 'accepted';
                        alert('Réservation acceptée !');
                    }
                },
                
                rejectReservation(id) {
                    // Logique pour refuser une réservation
                    const index = this.reservations.findIndex(r => r.id === id);
                    if (index !== -1) {
                        this.reservations[index].status = 'rejected';
                        alert('Réservation refusée.');
                    }
                },
                
                logout() {
                    if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                        window.location.href = 'login.html';
                    }
                }
            }
        }
    </script>
</body>
</html>