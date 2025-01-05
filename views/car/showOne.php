<main class="container mx-auto px-4 py-8 min-h-screen">
    <div class="flex justify-between">

        <h1 class="text-3xl font-bold mb-8 text-blue-900">
            <?= $car->getBrand() . ' ' . $car->getModel(); ?> (<?= $car->getYear(); ?>)
        </h1>

        <a href="?ctrl=car&action=showall&id=<?= $_SESSION['user']['id'] ?>"
           class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300 max-h-[40px]">Retour
            à la
            liste</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-2xl font-semibold mb-4 text-blue-900">Informations du véhicule</h2>
                    <ul class="space-y-2">
                        <li><strong>Marque :</strong> <?= $car->getBrand(); ?></li>
                        <li><strong>Modèle :</strong> <?= $car->getModel(); ?></li>
                        <li><strong>Année :</strong> <?= $car->getYear(); ?></li>
                        <li><strong>Kilométrage :</strong> <?= $car->getKilometers() ?? 0 ?> km</li>
                        <li><strong>Immatriculation :</strong> <?= $car->getLicensePlate() ?? "Non renseigné" ?></li>
                        <li><strong>Carburant :</strong> <?= $car->getFuelType() ?? "Non renseigné" ?></li>
                    </ul>
                    <?php if (null !== $car->getNotes()) : ?>
                        <h2 class="text-2xl font-semibold mt-4 mb-4 text-blue-900">Informations supplémentaires</h2>
                        <p><?= $car->getNotes() ?></p>
                    <?php endif; ?>
                </div>
                <!--                <div>-->
                <!--                    <h2 class="text-2xl font-semibold mb-4 text-blue-900">Dernier entretien</h2>-->
                <!--                    <p class="mb-2"><strong>Date :</strong>-->
                <!--                        --><?php //= $car->getDate(); ?><!--</p>-->
                <!--                    <p class="mb-2"><strong>Type :</strong>-->
                <!--                        --><?php //= $car->getName(); ?><!--</p>-->
                <!--                    <p><strong>Kilométrage :</strong>-->
                <!--                        --><?php //= $car->getKilometers(); ?><!-- km</p>-->
                <!--                </div>-->
            </div>
        </div>
    </div>

    <!--        <div class="grid md:grid-cols-2 gap-6">-->
    <!--            <div class="bg-white shadow-md rounded-lg overflow-hidden">-->
    <!--                <div class="p-6">-->
    <!--                    <h2 class="text-2xl font-semibold mb-4 text-blue-900">Prochains entretiens</h2>-->
    <!--                    <ul class="space-y-4">-->
    <!--                        --><?php //foreach ($maintenances as $maintenance): ?>
    <!--                            <li class="flex justify-between items-center">-->
    <!--                                <span>--><?php //echo $maintenance->getType(); ?><!--</span>-->
    <!--                                <span class="text-gray-600">-->
    <!--    --><?php //echo $maintenance->getDueDate(); ?><!--</span>-->
    <!--                            </li>-->
    <!--                        --><?php //endforeach; ?>
    <!--                    </ul>-->
    <!--                    <a href="?ctrl=actions&action=create&car_id=-->
    <!--    -->
    <?php //echo $car->getId(); ?><!--" class="mt-4 inline-block bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">-->
    <!--                        Planifier un entretien-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4 text-blue-900">Historique des entretiens</h2>
            <?php if (isset($maintenances)) : ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nom</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Description</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Prix</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Détails</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($maintenances as $maintenance): ?>

                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2"><?= $maintenance->getName(); ?></td>
                                    <td class="px-4 py-2"><?= $maintenance->getDescription(); ?></td>
                                    <td class="px-4 py-2"><?= $maintenance->getPrice(); ?>€</td>
                                    <td class="px-4 py-2 text-gray-600"><?= $maintenance->getDate(); ?></td>
                                    <td class="px-4 py-2"><a href="?ctrl=maintenance&action=showOne&id=<?= $maintenance->getId()?>"><i class="fa-regular fa-eye text-blue-600 hover:text-blue-900"></i></a></td>
                                </tr>


                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="">Aucun entretien enregistré pour le moment</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-8 flex justify-between">
        <a href="?ctrl=car&action=edit&id=<?= $car->getId(); ?>"
           class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
            <i class="fas fa-edit mr-2"></i>Modifier/Compléter les informations
        </a>
        <button onclick="confirmDelete()"
                class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition duration-300">
            <i class="fas fa-trash-alt mr-2"></i>Supprimer le véhicule
        </button>
    </div>

    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
         aria-modal="true">
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
                                Supprimer le véhicule
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Êtes-vous sûr de vouloir supprimer ce véhicule ? Cette action est irréversible et
                                    supprimera toutes les données associées à ce véhicule.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="deleteVehicle(<?= $car->getId(); ?>)"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Supprimer
                    </button>
                    <button type="button" onclick="closeDeleteModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer remains unchanged -->

    <script>
        function confirmDelete() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function deleteVehicle(carId) {
            window.location.href = "?ctrl=car&action=remove&id=" + carId;
        }
    </script>
</main>
