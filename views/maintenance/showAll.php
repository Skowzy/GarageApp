
<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Historique des Maintenances</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($maintenances as $maintenance): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="mb-4">
                        <?php if ($maintenance->getPhoto()): ?>
                            <img src="<?= $maintenance->getPhoto(); ?>" alt="Photo de la maintenance" class="w-full h-48 object-cover rounded">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded">
                                <i class="fas fa-wrench text-5xl text-gray-400"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h2 class="text-xl font-semibold mb-2 text-blue-900"><?= $maintenance->getName(); ?></h2>
                    <a href="?ctrl=car&action=showOne&id=<?=$maintenance->getCarId()?>" class="text-gray-600 mb-2">
                        <i class="fas fa-car mr-2"></i>
                        <?= $maintenance->getBrand() . ' ' . $maintenance->getModel(); ?>
                    </a>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <?= $maintenance->getDate(); ?>
                    </p>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <?= number_format($maintenance->getKilometers(), 0, ',', ' '); ?> km
                    </p>
                    <p class="text-gray-600 mb-4">
                        <i class="fas fa-tools mr-2"></i>
                        <?= $maintenance->getDescription(); ?>
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-900 font-semibold">
                            <?= number_format($maintenance->getPrice(), 2, ',', ' '); ?> €
                        </span>
                        <a href="?ctrl=actions&action=edit&id=<?= $maintenance->getId(); ?>" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit mr-1"></i> Modifier
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-8 text-center">
        <a href="?ctrl=actions&action=create" class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
            <i class="fas fa-plus-circle mr-2"></i>Ajouter une maintenance
        </a>
    </div>
</main>