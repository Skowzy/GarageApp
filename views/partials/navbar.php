<header class="bg-blue-900 text-white">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <a href="?ctrl=home&action=index" class="<?= isset($_SESSION['user']) && $_SESSION['user']['power'] >= 100  ? "hidden" : "" ?>">AutoCare</a>
            </div>

            <!-- Bouton Burger -->
            <button id="burger-btn" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Menu de Navigation -->
            <nav id="nav-menu" class="hidden md:flex md:items-center space-x-4">
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php if ($_SESSION['user']['power'] >= 100) : ?>
                        <a href="?ctrl=type&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des entretiens</a>
                        <a href="?ctrl=brand&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des marques</a>
                        <a href="?ctrl=user&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des utilisateurs</a>
                        <a href="?ctrl=user&action=logout" class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">Déconnexion</a>
                    <?php else : ?>
                        <a href="?ctrl=car&action=showall&id=<?= $_SESSION['user']['id'] ?>" class="px-3 py-2 rounded hover:bg-blue-800">Mon Garage</a>
                        <a href="?ctrl=maintenance&action=showall&id=<?= $_SESSION['user']['id'] ?>" class="px-3 py-2 rounded hover:bg-blue-800">Entretiens</a>
                        <a href="?ctrl=user&action=profile&id=<?= $_SESSION['user']['id'] ?>" class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">
                            <i class="fas fa-user mr-2"></i>Mon compte
                        </a>
                        <a href="?ctrl=user&action=logout" class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">Déconnexion</a>
                    <?php endif; ?>
                <?php elseif (isset($_GET['action']) && ($_GET['action']) !== "login") : ?>
                    <a href="?ctrl=user&action=login" class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">Connexion</a>
                <?php endif; ?>
            </nav>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden hidden mt-4 bg-blue-800 rounded-lg">
            <nav class="flex flex-col space-y-2 py-2">
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php if ($_SESSION['user']['power'] >= 100) : ?>
                        <a href="?ctrl=type&action=showall" class="block px-4 py-2 hover:bg-blue-700">Liste des entretiens</a>
                        <a href="?ctrl=brand&action=showall" class="block px-4 py-2 hover:bg-blue-700">Liste des marques</a>
                        <a href="?ctrl=user&action=showall" class="block px-4 py-2 hover:bg-blue-700">Liste des utilisateurs</a>
                        <a href="?ctrl=user&action=logout" class="block px-4 py-2 bg-white text-blue-900 rounded hover:bg-gray-200">Déconnexion</a>
                    <?php else : ?>
                        <a href="?ctrl=car&action=showall&id=<?= $_SESSION['user']['id'] ?>" class="block px-4 py-2 hover:bg-blue-700">Mon Garage</a>
                        <a href="?ctrl=maintenance&action=showall&id=<?= $_SESSION['user']['id'] ?>" class="block px-4 py-2 hover:bg-blue-700">Entretiens</a>
                        <a href="?ctrl=user&action=profile&id=<?= $_SESSION['user']['id'] ?>" class="block px-4 py-2 bg-white text-blue-900 rounded hover:bg-gray-200">Mon compte</a>
                        <a href="?ctrl=user&action=logout" class="block px-4 py-2 bg-white text-blue-900 rounded hover:bg-gray-200">Déconnexion</a>
                    <?php endif; ?>
                <?php elseif (isset($_GET['action']) && ($_GET['action']) !== "login") : ?>
                    <a href="?ctrl=user&action=login" class="block px-4 py-2 bg-white text-blue-900 rounded hover:bg-gray-200">Connexion</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<!-- JavaScript pour le menu burger -->
<script>
    const burgerBtn = document.getElementById('burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
