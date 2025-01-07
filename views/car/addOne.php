<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Ajouter un véhicule</h1>

    <form action="?ctrl=car&action=store" method="POST" class="space-y-6">
        <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="brand" class="block mb-2">Marque</label>
                <select name="brand" id="brand" class="w-full p-2 border rounded" required>
                    <option selected disabled>Sélectionnez une marque</option>
                    <?php foreach ($brands as $brand) : ?>
                        <option value="<?= $brand->getId() ?>"><?= $brand->getLabel() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="model" class="block mb-2">Modèle</label>
                <select name="model" id="model" class="w-full p-2 border rounded" required>
                    <option selected disabled>Sélectionnez un modèle</option>
                    <?php foreach ($models as $model) : ?>
                        <option id="modelopt" data-brand="<?=$model->getBrandId()?>" value="<?= $model->getId() ?>"><?= $model->getLabel() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Année</label>
                <input type="number" id="year" name="year" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="kilometers" class="block text-sm font-medium text-gray-700 mb-1">Kilométrage</label>
                <input type="number" id="kilometers" name="kilometers"  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="licensePlate" class="block text-sm font-medium text-gray-700 mb-1">Immatriculation</label>
                <input type="text" id="licensePlate" name="licensePlate"  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="fuelType" class="block text-sm font-medium text-gray-700 mb-1">Type de carburant</label>
                <select id="fuelType" name="fuelType"  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sélectionnez un type de carburant</option>
                    <option value="essence">Essence</option>
                    <option value="diesel">Diesel</option>
                    <option value="electrique">Électrique</option>
                    <option value="hybride">Hybride</option>
                </select>
            </div>

        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                <i class="fas fa-plus-circle mr-2"></i>Ajouter le véhicule
            </button>
            <a href="?ctrl=car&action=showall&id=<?=$_SESSION['user']['id']?>" class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 transition duration-300">
                <i class="fas fa-times mr-2"></i>Annuler
            </a>
        </div>
    </form>
</main>

<script>
    const brandSelect = document.getElementById("brand");
    const modelOptions = document.querySelectorAll("#model option");

    brandSelect.addEventListener("change", (event) => {
        const selectedBrandId = event.target.value;

        modelOptions.forEach(option => {
            const brandId = option.getAttribute("data-brand");

            if (brandId === selectedBrandId) {
                option.style.display = ""; // Affiche l'option
            } else {
                option.style.display = "none"; // Cache l'option
            }
        });

        // Réinitialise la sélection du modèle
        document.getElementById("model").selectedIndex = 0;
    });
</script>