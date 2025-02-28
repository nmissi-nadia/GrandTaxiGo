<x-app-layout>
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <a href="/passager/dashboard" class="text-lg font-semibold text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition">
            Home/
        </a>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 my-4">Trajets Disponibles</h1>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">Départ</th>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">Arrivée</th>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">Heure de Départ</th>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">Places Disponibles</th>
                        <th class="px-6 py-3 text-left text-gray-800 dark:text-gray-200 font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trajets as $trajet)
                    <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $trajet->id }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $trajet->rue_depart }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $trajet->rue_arrivee }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $trajet->heure_depart }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $trajet->places_disponibles }}</td>
                        <td class="px-6 py-4">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="trajet_id" value="{{ $trajet->id }}">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 transition">
                                    Réserver
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
