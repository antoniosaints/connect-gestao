<button type="button" hx-get="/api/user" hx-target="#content_main_page" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Novo usuário</button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    CPF
                </th>
                <th scope="col" class="px-6 py-3">
                    Data
                </th>
                <th scope="col" class="px-6 py-3">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $user["nome"] ?>
                </th>
                <td class="px-6 py-4">
                    <?= $user["bairro"] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $user["datanasc"] ?>
                </td>
                <td class="px-6 py-4">
                    <a href="javascript:void(0)" hx-get="/api/editar-usuario?id=<?= $user["id"] ?>" hx-target="#content_main_page" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
