<main class="container mx-auto px-4 py-8">
    <section class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-900">Inscription</h1>
        <div class="bg-white p-6 rounded-lg shadow">
            <form class="space-y-4" action="?ctrl=user&action=store" method="post">
                <div>
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="lastname" name="lastname" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="firstname" name="firstname" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label for="login" class="block mb-2 text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input type="email" id="login" name="login" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label for="passwordConfirm" class="block mb-2 text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" id="passwordConfirm" name="passwordConfirm" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center mt-4 text-sm text-gray-600">
            Déjà inscrit ? <a href="?ctrl=user&action=login" class="text-blue-900 hover:underline">Connectez-vous ici</a>
        </p>
    </section>
</main>