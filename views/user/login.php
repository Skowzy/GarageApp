<main class="container mx-auto px-4 py-8 min-h-screen">
    <section class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-900">Connexion</h1>
        <div class="bg-white p-6 rounded-lg shadow">
            <form class="space-y-4" method="post" action="?ctrl=user&action=connexion">
                <div>
                    <label for="login" class="block mb-2 text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input type="email" id="login" name="login" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border rounded focus:border-blue-900 focus:ring focus:ring-blue-200">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-900 focus:ring-blue-900 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="text-blue-900 hover:underline">Mot de passe oublié ?</a>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center mt-4 text-sm text-gray-600">
            Pas encore de compte ? <a href="?ctrl=user&action=register" class="text-blue-900 hover:underline">Inscrivez-vous ici</a>
        </p>
    </section>
</main>
