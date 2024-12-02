<header class="bg-red-600 text-white">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">
                <a href="?ctrl=home&action=index">AutoCare</a>
            </div>
            <nav>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['power'] == 100) : ?>
                <a href="#" class="px-3 py-2 rounded hover:bg-red-700">Liste des utilisateurs</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['power'] >= 50) : ?>
                <a href="#" class="px-3 py-2 rounded hover:bg-red-700">Mon Garage</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-red-700">Entretiens</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-red-700">Notifications</a>
                <a href="?ctrl=user&action=profile" class="px-3 py-2 bg-white text-red-600 rounded ml-2 hover:bg-gray-200">
                    <i class="fas fa-user mr-2"></i>Mon compte
                </a>
                <a href="?ctrl=user&action=logout" class="px-3 py-2 bg-white text-red-600 rounded ml-2 hover:bg-gray-200">
                    <i class="fas fa-user mr-2"></i>Deconnexion
                </a>
                <?php else : ?>
                <a href="?ctrl=user&action=login" class="px-3 py-2 bg-white text-red-600 rounded ml-2 hover:bg-gray-200">
                    <i class="fas fa-user mr-2"></i>Connexion
                </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>