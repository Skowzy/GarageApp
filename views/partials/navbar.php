<header class="bg-blue-900 text-white">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">
                <a href="?ctrl=home&action=index" class="<?= isset($_SESSION['user']) && $_SESSION['user']['power'] >= 100  ? "hidden" : "" ?>" >AutoCare</a>
            </div>
            <nav>
                <?php if (isset($_SESSION['user'])) : ?>

                    <?php if ($_SESSION['user']['power'] >= 100) : ?>
                        <a href="?ctrl=type&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des
                            entretiens</a>
                        <a href="?ctrl=brand&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des
                            marques de véhicules</a>
                        <a href="?ctrl=user&action=showall" class="px-3 py-2 rounded hover:bg-blue-800">Liste des
                            utilisateurs</a>
                        <a href="?ctrl=user&action=logout"
                           class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">
                            Deconnexion
                        </a>
                    <?php else : ?>
                        <a href="?ctrl=car&action=showall&id=<?= $_SESSION['user']['id'] ?>"
                           class="px-3 py-2 rounded hover:bg-blue-800">Mon Garage</a>
                        <a href="?ctrl=maintenance&action=showall&id=<?= $_SESSION['user']['id'] ?>"
                           class="px-3 py-2 rounded hover:bg-blue-800">Entretiens</a>
                        <!--                <a href="#" class="px-3 py-2 rounded hover:bg-blue-800">Notifications</a>-->
                        <a href="?ctrl=user&action=profile&id=<?= $_SESSION['user']['id'] ?>"
                           class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">
                            <i class="fas fa-user mr-2"></i>Mon compte
                        </a>
                        <a href="?ctrl=user&action=logout"
                           class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">
                            Deconnexion
                        </a>
                    <?php endif; ?>
                <?php elseif (isset($_GET['action']) && ($_GET['action']) !== "login") : ?>

                    <a href="?ctrl=user&action=login"
                       class="px-3 py-2 bg-white text-blue-900 rounded ml-2 hover:bg-gray-200">
                        Connexion
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>