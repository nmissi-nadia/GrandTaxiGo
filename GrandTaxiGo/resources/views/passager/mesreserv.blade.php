<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations - GrandTaxiGo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f6d463',       /* Jaune */
                        secondary: '#272b36',     /* Bleu foncé presque noir */
                        tertiary: '#4f5565',      /* Gris bleuté */
                        accent: '#4d80c9',        /* Bleu */
                        light: '#dfe0da'          /* Gris clair */
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-light min-h-screen" x-data="{ showMobileMenu: false, showCancelModal: false, reservationToCancel: null }">
    <!-- Navigation -->
    <nav class="bg-secondary text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="bg-primary px-3 py-1 rounded-md text-secondary font-bold text-xl">
                            GrandTaxiGo
                        </div>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#" class="border-transparent hover:border-primary hover:text-primary border-b-2 px-1 pt-1 text-sm font-medium">Accueil</a>
                        <a href="#" class="border-primary text-white border-b-2 px-1 pt-1 text-sm font-medium">Mes réservations</a>
                        <a href="#" class="border-transparent hover:border-primary hover:text-primary border-b-2 px-1 pt-1 text-sm font-medium">Chauffeurs</a>
                        <a href="#" class="border-transparent hover:border-primary hover:text-primary border-b-2 px-1 pt-1 text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex md:items-center">
                        <button class="bg-accent hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            Nouvelle réservation
                        </button>
                        <div class="ml-4 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none">
                                    <img class="h-8 w-8 rounded-full border-2 border-primary" src="/api/placeholder/50/50" alt="Photo de profil">
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" style="display: none;">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon profil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button @click="showMobileMenu = !showMobileMenu" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-primary focus:outline-none">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showMobileMenu, 'inline-flex': !showMobileMenu }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !showMobileMenu, 'inline-flex': showMobileMenu }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div :class="{'block': showMobileMenu, 'hidden': !showMobileMenu}" class="md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="text-white hover:bg-tertiary hover:text-white block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-primary text-base font-medium">Accueil</a>
                <a href="#" class="bg-tertiary text-white block pl-3 pr-4 py-2 border-l-4 border-primary text-base font-medium">Mes réservations</a>
                <a href="#" class="text-white hover:bg-tertiary hover:text-white block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-primary text-base font-medium">Chauffeurs</a>
                <a href="#" class="text-white hover:bg-tertiary hover:text-white block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-primary text-base font-medium">Contact</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full border-2 border-primary" src="/api/placeholder/50/50" alt="Photo de profil">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Karim Amrani</div>
                        <div class="text-sm font-medium leading-none text-gray-400">karim@example.com</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Mon profil</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Paramètres</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="bg-secondary text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">Mes Réservations</h1>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <a href="#" class="border-accent text-accent font-medium py-4 px-1 border-b-2">À venir <span class="ml-2 px-2 py-0.5 text-xs font-medium rounded-full bg-accent text-white">2</span></a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 border-b-2">Passées</a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 border-b-2">Annulées</a>
            </nav>
        </div>
    </div>

    <!-- Reservations List -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="space-y-6">
            <!-- Reservation Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center mb-2">
                                <div class="h-10 w-10 rounded-full bg-accent flex items-center justify-center text-white font-bold mr-3">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-secondary">Réservation confirmée</h3>
                                    <p class="text-sm text-gray-500">Référence: #REF78954</p>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row md:space-x-8">
                                <div class="mb-2 md:mb-0">
                                    <div class="text-sm text-gray-500">Trajet</div>
                                    <div class="font-medium">Casablanca → Rabat</div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="text-sm text-gray-500">Date et heure</div>
                                    <div class="font-medium">25 Feb 2025 - 14:00</div>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Prix</div>
                                    <div class="font-medium">150 DH</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:items-end space-y-2">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full mr-2" src="/api/placeholder/50/50" alt="Photo du chauffeur">
                                <span class="text-gray-800">Hassan Alaoui</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-accent text-accent rounded-md hover:bg-accent hover:text-white transition-colors">
                                    Contacter
                                </button>
                                <button @click="reservationToCancel = {id: 'REF78954', route: 'Casablanca → Rabat', date: '25 Feb 2025 - 14:00'}; showCancelModal = true" class="px-3 py-1 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition-colors">
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservation Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center mb-2">
                                <div class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold mr-3">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-secondary">En attente de confirmation</h3>
                                    <p class="text-sm text-gray-500">Référence: #REF78960</p>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row md:space-x-8">
                                <div class="mb-2 md:mb-0">
                                    <div class="text-sm text-gray-500">Trajet</div>
                                    <div class="font-medium">Marrakech → Casablanca</div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="text-sm text-gray-500">Date et heure</div>
                                    <div class="font-medium">27 Feb 2025 - 08:30</div>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Prix</div>
                                    <div class="font-medium">200 DH</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:items-end space-y-2">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full mr-2" src="/api/placeholder/50/50" alt="Photo du chauffeur">
                                <span class="text-gray-800">Fatima Zohra</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-accent text-accent rounded-md hover:bg-accent hover:text-white transition-colors">
                                    Contacter
                                </button>
                                <button @click="reservationToCancel = {id: 'REF78960', route: 'Marrakech → Casablanca', date: '27 Feb 2025 - 08:30'}; showCancelModal = true" class="px-3 py-1 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition-colors">
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancellation Modal -->
    <div x-show="showCancelModal" class="fixed inset-0 overflow-y-auto z-50" style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
            <div x-show="showCancelModal" class="fixed inset-0 transition-opacity" style="display: none;">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Annuler la réservation
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Êtes-vous sûr de vouloir annuler votre réservation <span x-text="reservationToCancel?.id" class="font-medium"></span> ?
                            </p>
                            <div class="mt-4 p-4 bg-gray-50 rounded-md">
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Trajet:</span>
                                    <span x-text="reservationToCancel?.route" class="text-sm text-gray-700"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-700">Date:</span>
                                    <span x-text="reservationToCancel?.date" class="text-sm text-gray-700"></span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-red-600">
                                Attention: vous pouvez annuler gratuitement jusqu'à 1 heure avant le départ. Après ce délai, des frais peuvent s'appliquer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button @click="showCancelModal = false" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:col-start-2 sm:text-sm">
                        Confirmer l'annulation
                    </button>
                    <button @click="showCancelModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:col-start-1 sm:text-sm">
                        Retour
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-secondary text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="bg-primary px-3 py-1 rounded-md text-secondary font-bold text-xl">
                            GrandTaxiGo
                        </div>
                    </div>
                    <p class="text-light text-sm">
                        Votre plateforme de réservation de grands taxis pour des trajets interurbains au Maroc.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-light hover:text-primary">Accueil</a></li>
                        <li><a href="#" class="text-light hover:text-primary">Mes réservations</a></li>
                        <li><a href="#" class="text-light hover:text-primary">Chauffeurs</a></li>
                        <li><a href="#" class="text-light hover:text-primary">FAQ</a></li>
                        <li><a href="#" class="text-light hover:text-primary">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+212 522 123 456</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>contact@grandtaxigo.ma</span>
                        </li>
                    </ul>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-light hover:text-primary">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-light hover:text-primary">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.108 10.108 0 01-3.127 1.184A4.92 4.92 0 0016.5 2.5a4.923 4.923 0 00-4.923 4.923c0 .39.044.765.127 1.124A13.986 13.986 0 011.64 3.16a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-light hover:text-primary">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8">
                <p class="text-sm text-light text-center">
                    &copy; 2025 GrandTaxiGo. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>