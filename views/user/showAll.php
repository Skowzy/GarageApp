<!-- Main content -->
<main class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-blue-900">Liste des utilisateurs</h1>

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
                        <a href="?ctrl=user&action=profile&id=<?=$user->getId()?>"><i class="fa-regular fa-eye text-blue-600 hover:text-blue-900"></i></a>
                        <a href="?ctrl=user&action=remove&id=<?=$user->getId()?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>



