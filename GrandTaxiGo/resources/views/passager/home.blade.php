<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo - Votre plateforme de réservation de taxis interurbains</title>
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
<body class="bg-light min-h-screen" x-data="{ showMobileMenu: false, showReservationModal: false, showUserMenu: false, selectedTrip: null }">
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
                        <a href="#" class="border-primary text-white border-b-2 px-1 pt-1 text-sm font-medium">Accueil</a>
                        <a href="#" class="border-transparent hover:border-primary hover:text-primary border-b-2 px-1 pt-1 text-sm font-medium">Mes réservations</a>
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
                <a href="#" class="bg-tertiary text-white block pl-3 pr-4 py-2 border-l-4 border-primary text-base font-medium">Accueil</a>
                <a href="#" class="text-white hover:bg-tertiary hover:text-white block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-primary text-base font-medium">Mes réservations</a>
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
                    <button class="ml-auto bg-accent flex-shrink-0 p-1 rounded-full text-white hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Mon profil</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Paramètres</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-tertiary">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-secondary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="md:w-1/2">
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-6xl">
                        <span class="block">Voyagez facilement</span>
                        <span class="block text-primary">d'une ville à l'autre</span>
                    </h1>
                    <p class="mt-3 text-base text-light sm:mt-5 sm:text-lg md:mt-5 md:text-xl">
                        Réservez un Grand Taxi en quelques clics et voyagez entre les villes du Maroc en toute simplicité.
                    </p>
                    <div class="mt-8 sm:flex">
                        <div class="rounded-md shadow">
                            <button @click="showReservationModal = true" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-secondary bg-primary hover:bg-yellow-400 md:py-4 md:text-lg md:px-10">
                                Réserver maintenant
                            </button>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-tertiary hover:bg-gray-600 md:py-4 md:text-lg md:px-10">
                                Découvrir
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 md:w-1/2">
                    <img src="/api/placeholder/600/400" alt="Taxi" class="w-full h-auto rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Search Form -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form class="grid grid-cols-1 gap-6 md:grid-cols-4">
                <div>
                    <label for="departure" class="block text-sm font-medium text-gray-700">Ville de départ</label>
                    <select id="departure" name="departure" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-accent focus:border-accent sm:text-sm rounded-md">
                        <option value="">Sélectionnez une ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="fes">Fès</option>
                        <option value="tanger">Tanger</option>
                    </select>
                </div>
                <div>
                    <label for="arrival" class="block text-sm font-medium text-gray-700">Ville d'arrivée</label>
                    <select id="arrival" name="arrival" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-accent focus:border-accent sm:text-sm rounded-md">
                        <option value="">Sélectionnez une ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="fes">Fès</option>
                        <option value="tanger">Tanger</option>
                    </select>
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date de départ</label>
                    <input type="date" name="date" id="date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-accent focus:border-accent sm:text-sm rounded-md">
                </div>
                <div>
                    <label class="opacity-0 block text-sm font-medium text-gray-700">Rechercher</label>
                    <button type="submit" class="w-full bg-primary text-secondary font-bold py-2 px-4 rounded-md hover:bg-yellow-400 transition duration-300 ease-in-out transform hover:scale-105">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Available Drivers Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-extrabold text-secondary mb-6">Chauffeurs disponibles</h2>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Driver Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo du chauffeur">
                        <div>
                            <h3 class="text-lg font-semibold text-secondary">Hassan Alaoui</h3>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="ml-1 text-gray-600">4.8 (56 avis)</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Casablanca → Rabat</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Aujourd'hui à 14:00</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>150 DH par personne</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Places disponibles: 4</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button @click="selectedTrip = {driver: 'Hassan Alaoui', route: 'Casablanca → Rabat', date: 'Aujourd\'hui à 14:00', price: '150 DH', seats: 4}; showReservationModal = true" class="w-full bg-accent hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Driver Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo du chauffeur">
                        <div>
                            <h3 class="text-lg font-semibold text-secondary">Fatima Zohra</h3>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="ml-1 text-gray-600">4.9 (78 avis)</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Marrakech → Casablanca</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Demain à 08:30</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>200 DH par personne</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Places disponibles: 2</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button @click="selectedTrip = {driver: 'Fatima Zohra', route: 'Marrakech → Casablanca', date: 'Demain à 08:30', price: '200 DH', seats: 2}; showReservationModal = true" class="w-full bg-accent hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Driver Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo du chauffeur">
                        <div>
                            <h3 class="text-lg font-semibold text-secondary">Mohammed Tazi</h3>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="ml-1 text-gray-600">4.7 (43 avis)</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Fès → Meknès</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Aujourd'hui à 16:45</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>70 DH par personne</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Places disponibles: 3</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button @click="selectedTrip = {driver: 'Mohammed Tazi', route: 'Fès → Meknès', date: 'Aujourd\'hui à 16:45', price: '70 DH', seats: 3}; showReservationModal = true" class="w-full bg-accent hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-accent hover:bg-blue-700">
                Voir plus de chauffeurs
                <svg class="ml-2 -mr-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- How it Works Section -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-secondary mb-2">Comment ça marche</h2>
                <p class="text-lg text-gray-600 mb-8">Réservez votre trajet en 3 étapes simples</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">1. Recherchez</h3>
                    <p class="text-gray-600">Sélectionnez votre ville de départ, destination et date de voyage.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">2. Choisissez</h3>
                    <p class="text-gray-600">Sélectionnez un chauffeur parmi les options disponibles selon vos préférences.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">3. Réservez</h3>
                    <p class="text-gray-600">Confirmez votre réservation et payez en ligne ou en espèces au chauffeur.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-extrabold text-secondary mb-8 text-center">Ce que disent nos clients</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo de l'utilisateur">
                    <div>
                        <h3 class="text-lg font-semibold text-secondary">Salma Bennani</h3>
                        <div class="flex">
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">« Service impeccable ! Le chauffeur était ponctuel et très aimable. L'application est simple à utiliser et la réservation a été confirmée rapidement. Je recommande vivement ! »</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo de l'utilisateur">
                    <div>
                        <h3 class="text-lg font-semibold text-secondary">Omar Berrada</h3>
                        <div class="flex">
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">« Pratique et économique ! Beaucoup moins cher qu'un taxi traditionnel pour les longues distances et l'ambiance est conviviale. J'utilise GrandTaxiGo pour tous mes déplacements interurbains maintenant. »</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img class="h-12 w-12 rounded-full mr-4" src="/api/placeholder/150/150" alt="Photo de l'utilisateur">
                    <div>
                        <h3 class="text-lg font-semibold text-secondary">Nawal El Moutawakel</h3>
                        <div class="flex">
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">« Une innovation dont le Maroc avait besoin ! Fini l'attente interminable aux stations de grands taxis. Avec GrandTaxiGo, je réserve à l'avance et je voyage sans stress. »</p>
            </div>
        </div>
    </div>

    <!-- App Download Section -->
    <div class="bg-accent py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="md:w-1/2 text-white">
                    <h2 class="text-3xl font-extrabold mb-4">Téléchargez notre application</h2>
                    <p class="text-lg mb-6">Réservez, payez et suivez votre trajet depuis votre smartphone. Notre application est disponible sur iOS et Android.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-secondary bg-primary hover:bg-yellow-400">
                            <svg class="h-6 w-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.707,9.293l-5-5a.999.999,0,0,0-1.414,0l-5,5A1,1,0,0,0,7.707,10.707L12,6.414l4.293,4.293a1,1,0,0,0,1.414-1.414Z"/>
                                <path d="M12,7a1,1,0,0,0-1,1v9a1,1,0,0,0,2,0V8A1,1,0,0,0,12,7Z"/>
                            </svg>
                            App Store
                        </a>
                        <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-secondary bg-primary hover:bg-yellow-400">
                            <svg class="h-6 w-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.707,9.293l-5-5a.999.999,0,0,0-1.414,0l-5,5A1,1,0,0,0,7.707,10.707L12,6.414l4.293,4.293a1,1,0,0,0,1.414-1.414Z"/>
                                <path d="M12,7a1,1,0,0,0-1,1v9a1,1,0,0,0,2,0V8A1,1,0,0,0,12,7Z"/>
                            </svg>
                            Google Play
                        </a>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 md:w-1/2 flex justify-center">
                    <img src="/api/placeholder/300/600" alt="Application mobile" class="h-64 w-auto">
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div x-show="showReservationModal" class="fixed inset-0 overflow-y-auto z-50" style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-secondary mb-4">Réserver votre trajet</h3>
                            <div class="mt-2">
                                <template x-if="selectedTrip">
                                    <div class="bg-gray-100 p-4 rounded-md mb-4">
                                        <p class="text-sm text-gray-600 mb-1">Chauffeur:</p>
                                        <p class="font-semibold text-secondary mb-2" x-text="selectedTrip.driver"></p>
                                        <p class="text-sm text-gray-600 mb-1">Trajet:</p>
                                        <p class="font-semibold text-secondary mb-2" x-text="selectedTrip.route"></p>
                                        <p class="text-sm text-gray-600 mb-1">Date et heure:</p>
                                        <p class="font-semibold text-secondary mb-2" x-text="selectedTrip.date"></p>
                                        <p class="text-sm text-gray-600 mb-1">Prix:</p>
                                        <p class="font-semibold text-secondary mb-2" x-text="selectedTrip.price"></p>
                                    </div>
                                </template>
                                <div class="space-y-4">
                                    <div>
                                        <label for="seats" class="block text-sm font-medium text-gray-700">Nombre de places</label>
                                        <select id="seats" name="seats" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-accent focus:border-accent sm:text-sm rounded-md">
                                            <option value="1">1 place</option>
                                            <option value="2">2 places</option>
                                            <option value="3">3 places</option>
                                            <option value="4">4 places</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="pickup" class="block text-sm font-x²