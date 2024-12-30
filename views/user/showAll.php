<!-- Main content -->
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-blue-900">Liste des utilisateurs</h1>

    <!-- Search and Add User -->
    <div class="mb-6 flex justify-between items-center">
        <div class="w-1/3">
            <input type="text" placeholder="Rechercher un utilisateur" class="w-full p-2 border rounded focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($users as $user): ?>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider"><?=$user->getId()?></th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider user-firstname"><?=$user->getFirstName()?></th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider user-lastname"><?=$user->getLastName()?></th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider user-login"><?=$user->getLogin()?></th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider user-role"><?=$user->getLabel()?></th>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="?ctrl=user&action=edit&id=<?=$user->getId()?>" class="text-blue-600 hover:text-blue-900 mr-3">Modifier</a>
                        <a href="?ctrl=user&action=remove&id=<?=$user->getId()?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                Précédent
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-blue-600 hover:bg-blue-50">
                1
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                2
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                3
            </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                Suivant
            </a>
        </nav>
    </div>
</main>



