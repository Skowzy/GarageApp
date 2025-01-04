<main class="container mx-auto px-4 py-8 min-h-screen">
    <section class="mb-12">
        <h1 class="text-4xl font-bold text-center mb-8">Gérez l'entretien de vos véhicules en toute simplicité</h1>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <i class="fas fa-car text-5xl text-blue-900 mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Ajoutez vos véhicules</h2>
                <p>Enregistrez les informations de vos véhicules pour un suivi personnalisé.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <i class="fas fa-tools text-5xl text-blue-900 mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Planifiez vos entretiens</h2>
                <p>Programmez et suivez les opérations de maintenance de vos véhicules.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <i class="fas fa-bell text-5xl text-blue-900 mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Recevez des rappels</h2>
                <p>Soyez notifié des entretiens à venir pour ne rien oublier.</p>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Commencez dès maintenant</h2>
        <div class="bg-white p-6 rounded-lg shadow">
            <form class="grid md:grid-cols-4 gap-4" action="?<?= isset($_SESSION['user']) ? "ctrl=car&action=store" : "ctrl=user&action=login" ?>" method="post">
                <div>
                    <label for="brand" class="block mb-2">Marque</label>
                    <input id="brand" name="brand" class="w-full p-2 border rounded" required>

                </div>
                <div>
                    <label for="model" class="block mb-2">Modèle</label>
                    <input id="model" name="model" class="w-full p-2 border rounded" required>

                </div>
                <div>
                    <label for="year" class="block mb-2">Année</label>
                    <input type="number" id="year" name="year" class="w-full p-2 border rounded" placeholder="Ex: 2023" min="1900" max="2100" required>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>">
                <?php endif; ?>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-900 text-white text-center py-2 px-4 rounded hover:bg-blue-800 cursor-pointer">
                        Ajouter mon véhicule
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section>
        <h2 class="text-3xl font-bold mb-6">Derniers entretiens populaires</h2>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://via.placeholder.com/300x200" alt="Vidange" class="w-full h-40 object-cover rounded mb-4">
                <h3 class="font-semibold mb-2">Vidange</h3>
                <p class="text-sm text-gray-600">Changez l'huile de votre moteur régulièrement pour prolonger sa durée de vie.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://via.placeholder.com/300x200" alt="Freins" class="w-full h-40 object-cover rounded mb-4">
                <h3 class="font-semibold mb-2">Contrôle des freins</h3>
                <p class="text-sm text-gray-600">Assurez-vous que vos freins sont en bon état pour votre sécurité.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://via.placeholder.com/300x200" alt="Pneus" class="w-full h-40 object-cover rounded mb-4">
                <h3 class="font-semibold mb-2">Changement de pneus</h3>
                <p class="text-sm text-gray-600">Remplacez vos pneus usés pour une meilleure adhérence sur la route.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://via.placeholder.com/300x200" alt="Batterie" class="w-full h-40 object-cover rounded mb-4">
                <h3 class="font-semibold mb-2">Vérification de la batterie</h3>
                <p class="text-sm text-gray-600">Testez et remplacez votre batterie si nécessaire pour éviter les pannes.</p>
            </div>
        </div>
    </section>
</main>