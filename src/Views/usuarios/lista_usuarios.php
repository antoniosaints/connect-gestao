<div id="content_main_page">
    <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <?php include_once __DIR__ . '/../partials/breadmain.php'; ?>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Usuários</span>
                </div>
            </li>
        </ol>
    </nav>
    <button type="button" hx-get="/api/user/editar" hx-target="#content_main_page" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Novo usuário</button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Senha
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
                            <?= $user["email"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $user["senha"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="javascript:void(0)" hx-get="/api/user/editar?id=<?= $user["id"] ?>" hx-target="#content_main_page" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <a href="javascript:void(0)" hx-confirm="Tem certeza?" hx-delete="/api/user?id=<?= $user["id"] ?>" hx-target="#content_main_page" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>