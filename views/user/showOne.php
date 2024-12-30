<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-blue-900">Mon Profil</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4 text-blue-900">Informations personnelles</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Prénom</p>
                    <p class="font-medium"><?= $user->getFirstName(); ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Nom</p>
                    <p class="font-medium"><?= $user->getLastName(); ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium"><?= $user->getLogin(); ?></p>
                </div>
            </div>
            <button onclick="openEditModal()" class="mt-6 bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                Modifier mes informations
            </button>
            <button onclick="openPasswordModal()" class="mt-6 bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
                Modifier mon mot de passe
            </button>
        </div>
    </div>

</main>

<div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Modifier mes informations
                </h3>
                <div class="mt-2">
                    <form id="editForm" class="space-y-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" id="firstName" name="firstName" value="<?php echo $user->getFirstName(); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="lastName" name="lastName" value="<?php echo $user->getLastName(); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo $user->getLogin(); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="submitEditForm()">
                    Sauvegarder
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeEditModal()">
                    Annuler
                </button>
            </div>
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

    function submitEditForm() {
        // Ici, vous devriez ajouter la logique pour envoyer les données du formulaire au serveur
        // Pour cet exemple, nous allons simplement fermer la modale
        closeEditModal();
    }
</script>