<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo Chauffeurs - Gérez vos trajets interurbains</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'taxi-yellow': '#f9d71c',
                        'taxi-dark': '#282c34',
                        'taxi-gray': '#4b5563',
                        'taxi-blue': '#4a77c5',
                        'taxi-light': '#e5e7de'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navigation -->
    <nav class="bg-taxi-dark text-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <span class="text-taxi-yellow text-2xl font-bold mr-2">
                        <i class="fas fa-taxi"></i>
                    </span>
                    <span class="text-2xl font-bold">GrandTaxiGo</span>
                    <span class="ml-2 bg-taxi-yellow text-taxi-dark px-2 py-1 rounded text-xs font-medium">ESPACE CHAUFFEUR</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="hover:text-taxi-yellow transition duration-300">Tableau de bord</a>
                    <a href="#avantages" class="hover:text-taxi-yellow transition duration-300">Avantages</a>
                    <a href="#fonctionnement" class="hover:text-taxi-yellow transition duration-300">Comment ça marche</a>
                    <a href="#temoignages" class="hover:text-taxi-yellow transition duration-300">Témoignages</a>
                    <a href="#faq" class="hover:text-taxi-yellow transition duration-300">FAQ</a>
                </div>
                
                <div class="flex space-x-4">
                    <a href="#" class="bg-transparent border border-taxi-yellow text-taxi-yellow px-4 py-2 rounded-lg hover:bg-taxi-yellow hover:text-taxi-dark transition duration-300">Connexion</a>
                    <a href="#" class="bg-taxi-yellow text-taxi-dark px-4 py-2 rounded-lg hover:bg-yellow-400 transition duration-300">Inscription</a>
                </div>
                
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <a href="#" class="block py-2 hover:text-taxi-yellow transition duration-300">Tableau de bord</a>
                <a href="#avantages" class="block py-2 hover:text-taxi-yellow transition duration-300">Avantages</a>
                <a href="#fonctionnement" class="block py-2 hover:text-taxi-yellow transition duration-300">Comment ça marche</a>
                <a href="#temoignages" class="block py-2 hover:text-taxi-yellow transition duration-300">Témoignages</a>
                <a href="#faq" class="block py-2 hover:text-taxi-yellow transition duration-300">FAQ</a>
                <div class="flex flex-col space-y-2 mt-4">
                    <a href="#" class="bg-transparent border border-taxi-yellow text-taxi-yellow px-4 py-2 rounded-lg hover:bg-taxi-yellow hover:text-taxi-dark transition duration-300 text-center">Connexion</a>
                    <a href="#" class="bg-taxi-yellow text-taxi-dark px-4 py-2 rounded-lg hover:bg-yellow-400 transition duration-300 text-center">Inscription</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-taxi-dark to-taxi-gray pt-24 pb-16 md:pt-32 md:pb-24">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-white mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Augmentez vos revenus avec <span class="text-taxi-yellow">GrandTaxiGo</span></h1>
                <p class="text-lg mb-8">Rejoignez notre plateforme de réservation de grands taxis et gérez facilement vos trajets interurbains. Plus de clients, moins d'attente.</p>
                
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                    <a href="#" class="bg-taxi-yellow text-taxi-dark font-bold py-3 px-8 rounded-lg hover:bg-yellow-400 transition duration-300 text-center">Devenir chauffeur</a>
                    <a href="#fonctionnement" class="bg-transparent border border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-taxi-dark transition duration-300 text-center">En savoir plus</a>
                </div>
            </div>
            
            <div class="md:w-1/2 md:pl-12">
                <img src="/api/placeholder/600/400" alt="Chauffeur de Grand Taxi" class="rounded-lg shadow-xl">
            </div>
        </div>
    </header>

    <!-- Stats Section -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md">
                    <div class="text-3xl font-bold text-taxi-blue mb-2">2500+</div>
                    <div class="text-taxi-gray">Chauffeurs actifs</div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md">
                    <div class="text-3xl font-bold text-taxi-blue mb-2">15000+</div>
                    <div class="text-taxi-gray">Réservations par mois</div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md">
                    <div class="text-3xl font-bold text-taxi-blue mb-2">40+</div>
                    <div class="text-taxi-gray">Villes desservies</div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 text-center shadow-md">
                    <div class="text-3xl font-bold text-taxi-blue mb-2">25%</div>
                    <div class="text-taxi-gray">Augmentation de revenus*</div>
                </div>
            </div>
            <div class="text-center text-xs text-taxi-gray mt-4">*Moyenne constatée chez nos chauffeurs après 3 mois d'utilisation</div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-taxi-dark">Votre tableau de bord personnalisé</h2>
                <p class="text-taxi-gray mt-4 text-lg">Gérez facilement vos trajets et maximisez vos revenus</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <div class="bg-taxi-dark text-white p-4 md:w-64">
                        <div class="flex items-center mb-8 p-2">
                            <img src="/api/placeholder/50/50" alt="Profile" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <div class="font-bold">Ahmed Benjelloun</div>
                                <div class="text-xs text-gray-400">Chauffeur depuis 2024</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="bg-taxi-gray bg-opacity-30 p-2 rounded">
                                <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-route mr-2"></i> Mes trajets
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-calendar-alt mr-2"></i> Disponibilités
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-money-bill-wave mr-2"></i> Paiements
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-star mr-2"></i> Évaluations
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-cog mr-2"></i> Paramètres
                            </div>
                            <div class="p-2 hover:bg-taxi-gray hover:bg-opacity-30 rounded transition">
                                <i class="fas fa-question-circle mr-2"></i> Aide
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 flex-1">
                        <div class="flex flex-col md:flex-row items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-taxi-dark mb-4 md:mb-0">Aperçu de l'activité</h3>
                            <div class="flex space-x-2">
                                <button class="bg-taxi-blue text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    <i class="fas fa-bell mr-2"></i> 3
                                </button>
                                <button class="bg-taxi-yellow text-taxi-dark px-4 py-2 rounded hover:bg-yellow-400 transition">
                                    Nouvelle disponibilité
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-gray-50 rounded p-4 border-l-4 border-taxi-yellow">
                                <div class="text-taxi-gray text-sm">Réservations aujourd'hui</div>
                                <div class="text-2xl font-bold text-taxi-dark">3</div>
                            </div>
                            <div class="bg-gray-50 rounded p-4 border-l-4 border-taxi-blue">
                                <div class="text-taxi-gray text-sm">Revenus cette semaine</div>
                                <div class="text-2xl font-bold text-taxi-dark">2 450 MAD</div>
                            </div>
                            <div class="bg-gray-50 rounded p-4 border-l-4 border-green-500">
                                <div class="text-taxi-gray text-sm">Évaluation moyenne</div>
                                <div class="text-2xl font-bold text-taxi-dark">4.8/5</div>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="font-bold text-taxi-dark mb-3">Prochains trajets</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr class="bg-gray-100 text-taxi-dark">
                                            <th class="py-2 px-4 text-left">Date</th>
                                            <th class="py-2 px-4 text-left">Départ</th>
                                            <th class="py-2 px-4 text-left">Destination</th>
                                            <th class="py-2 px-4 text-left">Passagers</th>
                                            <th class="py-2 px-4 text-left">Statut</th>
                                            <th class="py-2 px-4 text-left">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b">
                                            <td class="py-2 px-4">25/02/2025 14:30</td>
                                            <td class="py-2 px-4">Casablanca</td>
                                            <td class="py-2 px-4">Rabat</td>
                                            <td class="py-2 px-4">4/6</td>
                                            <td class="py-2 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">En attente</span></td>
                                            <td class="py-2 px-4">
                                                <button class="text-taxi-blue hover:underline">Détails</button>
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="py-2 px-4">25/02/2025 18:00</td>
                                            <td class="py-2 px-4">Rabat</td>
                                            <td class="py-2 px-4">Casablanca</td>
                                            <td class="py-2 px-4">6/6</td>
                                            <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Confirmé</span></td>
                                            <td class="py-2 px-4">
                                                <button class="text-taxi-blue hover:underline">Détails</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4">26/02/2025 09:15</td>
                                            <td class="py-2 px-4">Casablanca</td>
                                            <td class="py-2 px-4">Marrakech</td>
                                            <td class="py-2 px-4">2/6</td>
                                            <td class="py-2 px-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Nouvelle demande</span></td>
                                            <td class="py-2 px-4">
                                                <button class="text-green-600 hover:underline mr-2">Accepter</button>
                                                <button class="text-red-600 hover:underline">Refuser</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-bold text-taxi-dark mb-3">Disponibilités</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <div class="flex flex-wrap gap-2">
                                    <div class="bg-white p-2 rounded border border-taxi-yellow">
                                        <div class="font-bold">Aujourd'hui</div>
                                        <div class="text-taxi-gray text-sm">14:30 - 20:00</div>
                                    </div>
                                    <div class="bg-white p-2 rounded border border-taxi-yellow">
                                        <div class="font-bold">Demain</div>
                                        <div class="text-taxi-gray text-sm">08:00 - 19:00</div>
                                    </div>
                                    <div class="bg-white p-2 rounded border border-taxi-yellow">
                                        <div class="font-bold">27/02/2025</div>
                                        <div class="text-taxi-gray text-sm">10:00 - 18:00</div>
                                    </div>
                                    <div class="bg-white p-2 rounded border border-taxi-yellow flex items-center justify-center">
                                        <button class="text-taxi-blue">
                                            <i class="fas fa-plus-circle mr-1"></i> Ajouter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="avantages" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-taxi-dark">Pourquoi rejoindre GrandTaxiGo?</h2>
                <p class="text-taxi-gray mt-4 text-lg">Les avantages d'être chauffeur partenaire</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Revenus garantis</h3>
                    <p class="text-taxi-gray">Augmentez vos revenus avec un taux d'occupation optimal de votre véhicule et moins de trajets à vide.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Flexibilité totale</h3>
                    <p class="text-taxi-gray">Vous restez maître de votre emploi du temps. Définissez vos propres horaires et trajets.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Plus de clients</h3>
                    <p class="text-taxi-gray">Accédez à une large base de clients qui recherchent des trajets interurbains sécurisés et fiables.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Application simple</h3>
                    <p class="text-taxi-gray">Une interface intuitive pour gérer vos réservations, disponibilités et paiements facilement.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Paiements rapides</h3>
                    <p class="text-taxi-gray">Recevez vos paiements de manière sécurisée et régulière, directement sur votre compte bancaire.</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-taxi-yellow text-4xl mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Support dédié</h3>
                    <p class="text-taxi-gray">Une équipe à votre écoute 7j/7 pour vous accompagner et répondre à toutes vos questions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works section -->
    <section id="fonctionnement" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-taxi-dark">Comment ça fonctionne?</h2>
                <p class="text-taxi-gray mt-4 text-lg">Devenir chauffeur partenaire en quelques étapes simples</p>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-start">
                <div class="flex flex-col items-center text-center mb-8 md:mb-0 md:w-1/4">
                    <div class="bg-taxi-yellow w-16 h-16 rounded-full flex items-center justify-center text-taxi-dark text-2xl font-bold mb-4">1</div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Inscription</h3>
                    <p class="text-taxi-gray">Créez votre compte chauffeur en fournissant vos informations personnelles et professionnelles.</p>
                </div>
                
                <div class="flex flex-col items-center text-center mb-8 md:mb-0 md:w-1/4">
                    <div class="bg-taxi-yellow w-16 h-16 rounded-full flex items-center justify-center text-taxi-dark text-2xl font-bold mb-4">2</div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Vérification</h3>
                    <p class="text-taxi-gray">Soumettez vos documents (permis, carte grise, assurance) pour la vérification.</p>
                </div>
                
                <div class="flex flex-col items-center text-center mb-8 md:mb-0 md:w-1/4">
                    <div class="bg-taxi-yellow w-16 h-16 rounded-full flex items-center justify-center text-taxi-dark text-2xl font-bold mb-4">3</div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Configuration</h3>
                    <p class="text-taxi-gray">Définissez vos trajets habituels, vos disponibilités et vos préférences de paiement.</p>
                </div>
                
                <div class="flex flex-col items-center text-center md:w-1/4">
                    <div class="bg-taxi-yellow w-16 h-16 rounded-full flex items-center justify-center text-taxi-dark text-2xl font-bold mb-4">4</div>
                    <h3 class="text-xl font-bold text-taxi-dark mb-2">Commencez à gagner</h3>
                    <p class="text-taxi-gray">Recevez des demandes de réservation et acceptez-les selon votre disponibilité.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section -->
    <section id="temoignages" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-taxi-dark">Nos chauffeurs témoignent</h2>
                <p class="text-taxi-gray mt-4 text-lg">Découvrez l'expérience de nos partenaires</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/60/60" alt="Chauffeur" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-taxi-dark">Hassan M.</h4>
                            <div class="text-taxi-gray text-sm">Chauffeur depuis 1 an</div>
                        </div>
                    </div>
                    <p class="text-taxi-gray mb-4">"Depuis que j'ai rejoint GrandTaxiGo, mes revenus ont augmenté de 30%. Je passe moins de temps à chercher des clients et plus de temps sur la route. L'application est très facile à utiliser."</p>
                    <div class="text-taxi-yellow">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/60/60" alt="Chauffeur" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-taxi-dark">Karim A.</h4>
                            <div class="text-taxi-gray text-sm">Chauffeur depuis 6 mois</div>
                        </div>
                    </div>
                    <p class="text-taxi-gray mb-4">"Ce qui me plaît le plus, c'est la flexibilité. Je peux définir mes propres horaires et trajets. Le système de notification est efficace et le support réactif en cas de besoin."</p>
                    <div class="text-taxi-yellow">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/60/60" alt="Chauffeur" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-taxi-dark">Rachid B.</h4>
                            <div class="text-taxi-gray text-sm">Chauffeur depuis 8 mois</div>
                        </div>
                    </div>
                    <p class="text-taxi-gray mb-4">"Avant, je perdais beaucoup de temps entre chaque course. Maintenant, mon taxi est presque toujours plein et je gagne bien mieux ma vie. Les paiements sont toujours à l'heure."</p>
                    <div class="text-taxi-yellow">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-taxi-dark">Questions fréquentes</h2>
                <p class="text-taxi-gray mt-4 text-lg">Tout ce que vous devez savoir pour commencer</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div id="accordion" class="space-y-4">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <button class="faq-question w-full flex justify-between items-center p-4 text-left font-bold text-taxi-dark hover:bg-gray-50 transition">