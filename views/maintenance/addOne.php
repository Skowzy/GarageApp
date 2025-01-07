<main class="container mx-auto px-4 py-8 min-h-screen">
    <div class="mb-4">
        <a href="?ctrl=car&action=showall&id=<?=$_SESSION['user']['id']?>" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste des véhicules
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-6 text-blue-900">Ajouter une Maintenance</h1>
            <h2 class="text-3xl font-bold mb-6 text-blue-900"><?= $car->getBrand() . ' ' . $car->getModel() . ' (' . $car->getYear() . ')' ?></h2>

            <form action="?ctrl=maintenance&action=store" method="POST" enctype="multipart/form-data" class="space-y-6">

                <div>
                    <input type="hidden" name="id" value="<?= $car->getId() ?>">
                </div>

                <div>
                    <label for="type" class="block mb-2">Type de maintenance</label>
                    <select name="type" id="type" class="w-full p-2 border rounded" required>
                        <option selected disabled>Sélectionner une maintenance</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type->getId() ?>"><?= $type->getLabel() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date de la maintenance</label>
                    <input type="date" id="date" name="date" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-plus-circle mr-2"></i>Ajouter la maintenance
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
