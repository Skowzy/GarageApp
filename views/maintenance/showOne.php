<main class="container mx-auto px-4 py-8 min-h-screen">
    <div class="mb-4">
        <a href="?ctrl=maintenance&action=showall&id=<?=$_SESSION['user']['id']?>" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste des maintenances
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4 text-blue-900"><?= $maintenance->getName() ?></h1>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-car mr-2"></i>
                        <a href="?ctrl=car&action=showOne&id=<?= $maintenance->getCarId() ?>" class="text-blue-600 hover:text-blue-800">
                            <?= $maintenance->getBrand() . ' ' . $maintenance->getModel() ?>
                        </a>
                    </p>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <?= $maintenance->getDate() ?>
                    </p>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <?= number_format($maintenance->getKilometers(), 0, ',', ' ') ?> km
                    </p>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-tools mr-2"></i>
                        <?= $maintenance->getDescription() ?>
                    </p>
                    <p class="text-blue-900 font-semibold text-xl mt-4">
                        <?= number_format($maintenance->getPrice(), 2, ',', ' ') ?> €
                    </p>
                </div>
                <div>
                    <?php if ($maintenance->getPhoto()): ?>
                        <img src="<?= $maintenance->getPhoto() ?>" alt="Photo de la maintenance" class="w-full h-auto rounded-lg shadow-md">
                    <?php else: ?>
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg">
                            <i class="fas fa-image text-5xl text-gray-400"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <button onclick="openEditModal()" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-edit mr-2"></i>Modifier
                </button>
                <button onclick="openDeleteModal()" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition duration-300">
                    <i class="fas fa-trash-alt mr-2"></i>Supprimer
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Edit Maintenance Modal -->
<div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Modifier la maintenance
                </h3>
                <div class="mt-2">
                    <form id="editForm" class="space-y-4" method="post" action="?ctrl=maintenance&action=update">
                        <input type="hidden" id="maintenanceId" name="id" value="<?= $maintenance->getId() ?>">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="name" name="name" value="<?= $maintenance->getName() ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" name="date" value="<?= $maintenance->getDate() ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?= $maintenance->getDescription() ?></textarea>
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                            <input type="number" id="price" name="price" step="0.01" value="<?= $maintenance->getPrice() ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" id="photo" name="photo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="submitEditForm()">
                                Sauvegarder
                            </button>
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeEditModal()">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Supprimer la maintenance
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Êtes-vous sûr de vouloir supprimer cette maintenance ? Cette action est irréversible.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse" method="post" action="?ctrl=maintenance&action=remove&">
                <input type="hidden" name="id" value="<?=$maintenance->getId()?>">
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Supprimer
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeDeleteModal()">
                    Annuler
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }


    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

</script>
