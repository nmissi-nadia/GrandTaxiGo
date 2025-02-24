<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo - Gestion des disponibilités</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js"></script>
</head>
<body class="bg-gray-100" x-data="disponibilitesData()">
    <nav class="bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="font-bold text-xl">GrandTaxiGo</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="chauffeur-dashboard.html" class="text-gray-300 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                            <a href="#" class="bg-blue-900 text-white px-3 py-2 rounded-md text-sm font-medium">Mes disponibilités</a>
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
                <a href="chauffeur-dashboard.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="#" class="bg-blue-900 text-white block px-3 py-2 rounded-md text-base font-medium">Mes disponibilités</a>
                <a href="chauffeur-reservations.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Réservations</a>
                <a href="chauffeur-historique.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Historique</a>
                <a href="chauffeur-profil.html" class="text-gray-300 hover:bg-blue-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Mon profil</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Gestion des disponibilités</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-medium text-gray-900">Mes disponibilités hebdomadaires</h2>
                    <div>
                        <button @click="applyToAllDays" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Appliquer à tous les jours
                        </button>
                    </div>
                </div>
                
                <div class="space-y-8">
                    <template x-for="(day, dayIndex) in availability" :key="dayIndex">
                        <div class="border rounded-lg p-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900" x-text="day.name"></h3>
                                <div class="flex items-center">
                                    <span class="mr-2">Disponible</span>
                                    <label class="switch">
                                        <input type="checkbox" x-model="day.available">
                                        <span class="relative inline-block w-12 h-6 rounded-full bg-gray-300 transition-all duration-200 ease-in-out">
                                            <span :class="day.available ? 'translate-x-6 bg-blue-600' : 'translate-x-0 bg-white'" class="absolute left-0 top-0.5 mx-0.5 w-5 h-5 rounded-full transition-all duration-200 ease-in-out"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div x-show="day.available" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label for="startTime" class="block text-sm font-medium text-gray-700">Heure de début</label>
                                        <select x-model="day.startTime" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                            <option value="">Sélectionner</option>
                                            <template x-for="hour in generateHourOptions()" :key="hour">
                                                <option :value="hour" x-text="hour"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="endTime" class="block text-sm font-medium text-gray-700">Heure de fin</label>
                                        <select x-model="day.endTime" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                            <option value="">Sélectionner</option>
                                            <template x-for="hour in generateHourOptions(day.startTime)" :key="hour">
                                                <option :value="hour" x-text="hour"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>

                                <div class="space