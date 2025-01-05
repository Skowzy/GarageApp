<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Mon Garage</h1>
    <?php if (isset($cars)) : ?>

    <div class="grid md:grid-cols-3 gap-6">
        <?php foreach ($cars as $car): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2 text-blue-900"><?= ucfirst($car->getBrand()) . ' ' . ucfirst($car->getModel()) ?></h2>
                    <p class="text-gray-600 mb-4">Année : <?= $car->getYear() ?></p>
                    <div class="flex justify-between items-center">
                        <a href="?ctrl=car&action=showOne&id=<?= $car->getId() ?>"
                           class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-info-circle mr-1"></i> Détails
                        </a>
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-wrench mr-1"></i> Dernier entretien :
                            <?php if (isset($lastMaintenances[$car->getId()])) {
                                echo $lastMaintenances[$car->getId()]->getName();
                            } else {
                                echo "Aucun entretien";
                            }
                            ?>
                        </span>
                    </div>
                    <div class="mt-4">
                        <p>Propriétaire du véhicule : <a
                                    href="?ctrl=user&action=profile&id=<?= $user->getId() ?>"><?= $car->getFullname() ?></a>
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 px-6 py-4">
                    <a href="?ctrl=actions&action=create&car_id=" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-plus-circle mr-1"></i> Planifier un entretien
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <!-- Card pour ajouter un nouveau véhicule -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden border-2 border-dashed border-gray-300">
            <a href="?ctrl=car&action=create" class="block p-6 text-center">
                <i class="fas fa-plus-circle text-5xl text-blue-900 mb-4"></i>
                <p class="text-xl font-semibold text-blue-900">Ajouter un véhicule</p>
            </a>
        </div>
    </div>
</main>