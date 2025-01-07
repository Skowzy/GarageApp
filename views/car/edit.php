<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Modifier les informations du véhicule</h1>

    <form action="?ctrl=car&action=update" method="POST" class="space-y-6">
        <input type="hidden" name="id" value="<?= $car->getId(); ?>">

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                <input type="text" id="brand" value="<?= $car->getBrand() ?>" disabled class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Modèle</label>
                <input type="text" id="model" value="<?= $car->getModel() ?>" disabled class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Année</label>
                <input type="number" id="year" name="year" value="<?= $car->getYear() ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="kilometers" class="block text-sm font-medium text-gray-700 mb-1">Kilométrage</label>
                <input type="number" id="kilometers" name="kilometers" value="<?= $car->getKilometers() ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="licensePlate" class="block text-sm font-medium text-gray-700 mb-1">Immatriculation</label>
                <input type="text" id="licensePlate" name="licensePlate" value="<?= $car->getLicensePlate() ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="fuelType" class="block text-sm font-medium text-gray-700 mb-1">Type de carburant</label>
                <select id="fuelType" name="fuelType" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="essence" <?= $car->getFuelType() == 'essence' ? 'selected' : '' ?>>Essence</option>
                    <option value="diesel" <?= $car->getFuelType() == 'diesel' ? 'selected' : ''?>>Diesel</option>
                    <option value="electrique" <?= $car->getFuelType() == 'electrique' ? 'selected' : ''?>>Électrique</option>
                    <option value="hybride" <?= $car->getFuelType() == 'hybride' ? 'selected' : '' ?>>Hybride</option>
                </select>
            </div>
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes supplémentaires</label>
            <textarea id="notes" name="notes" placeholder="Jusqu'à 500 caractères" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"><?= $car->getNotes(); ?></textarea>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                <i class="fas fa-save mr-2"></i>Enregistrer les modifications
            </button>
            <a href="?ctrl=car&action=showOne&id=<?= $car->getId(); ?>" class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 transition duration-300">
                <i class="fas fa-times mr-2"></i>Annuler
            </a>
        </div>
    </form>
</main>
