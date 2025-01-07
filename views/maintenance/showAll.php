<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Historique des Maintenances</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-blue-900 text-white">
            <tr>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Véhicule</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Kilométrage</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($maintenances) :?>
            <?php foreach ($maintenances as $maintenance): ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2">
                        <a href="?ctrl=maintenance&action=showOne&id=<?= $maintenance->getId()?>" class="text-blue-600 hover:text-blue-800">
                            <?= $maintenance->getName(); ?>
                        </a>
                    </td>
                    <td class="px-4 py-2">
                        <a href="?ctrl=car&action=showOne&id=<?=$maintenance->getCarId()?>" class="text-gray-600 hover:text-gray-800">
                            <?= $maintenance->getBrand() . ' ' . $maintenance->getModel(); ?>
                        </a>
                    </td>
                    <td class="px-4 py-2"><?= $maintenance->getDate(); ?></td>
                    <td class="px-4 py-2"><?= number_format($maintenance->getKilometers(), 0, ',', ' '); ?> km</td>
                    <td class="px-4 py-2"><?= number_format($maintenance->getPrice(), 2, ',', ' '); ?> €</td>
                    <td class="px-4 py-2">
                        <a href="?ctrl=maintenance&action=showOne&id=<?= $maintenance->getId()?>" class="text-blue-600 hover:text-blue-800 mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else :?>
            <tr class="border-b hover:bg-gray-100">
                <td class="px-4 py-2">
                    Aucun entretien enregistré
                </td>
            </tr>
            <?php endif;?>
            </tbody>
        </table>
    </div>
</main>