<div id="content_main_page" hx-boost="true" hx-target="#content_main_page">
    <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <?php include_once __DIR__ . '/../partials/breadmain.php'; ?>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Caixas de atendimento - <?= $total ?></span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="flex items-baseline gap-3">
        <button type="button" hx-put="<?=APP_URL?>/caixas" hx-push-url="true" hx-target="#content_main_page" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nova expansão</button>
        <input type="search" placeholder="Buscar CTO" hx-get="<?=APP_URL?>/caixas" name="busca" hx-target="#content_main_page" name="busca" class="w-1/4 px-2 py-1 border border-gray-300 rounded-md shadow-sm bg-gray-900 focus:border-blue-500 focus:ring-blue-500 text-gray-200 rounded-lg">
        <div class="text-red-500 cursor-pointer px-3 py-1 rounded bg-gray-700" hx-get="<?=APP_URL?>/caixas" hx-target="#content_main_page"><i class="fa-solid fa-filter-circle-xmark"></i></div>
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <?php for ($i = 0; $i < $pages; $i++) {
                    if ($i + 1 == $page) { ?>
                        <li>
                            <a href="<?=APP_URL?>/caixas?page=<?= $i + 1 ?>" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"><?= $i + 1 ?></a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?=APP_URL?>/caixas?page=<?= $i + 1 ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i + 1 ?></a>
                        </li>
                <?php } } ?>
            </ul>
        </nav>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Caixa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Portas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Observação
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($caixas)) : foreach ($caixas as $caixa) : ?>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $caixa["caixa"] ?>
                            </th>
                            <td class="px-6 py-4">
                                <div hx-get="<?=APP_URL?>/caixas/portas?id=<?= $caixa["id"] ?>" hx-target="this" hx-swap="outerHTML" hx-trigger="click">
                                    <?= $caixa["portas"] ?>
                                </div>
                            </td>
                            <td class="<?php if ($caixa["status"] == "pendente") : ?>text-red-500<?php else : ?>text-emerald-500<?php endif; ?> px-6 py-4">
                                <?= $caixa["status"] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $caixa["observacao"] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($caixa["status"] == "pendente") : ?>
                                    <a href="javascript:void(0)" hx-confirm="Confirmar expansão?" hx-get="<?=APP_URL?>/caixas/efetivar?id=<?= $caixa["id"] ?>&to=caixas" hx-target="#content_main_page" class="font-medium text-emerald-600 dark:text-emerald-500 hover:underline py-2 px-3 dark:bg-gray-800 rounded-lg"><i class="fa-solid fa-circle-check"></i></a>
                                <?php endif; ?>
                                <a href="javascript:void(0)" hx-push-url="true" hx-put="<?=APP_URL?>/caixas?id=<?= $caixa["id"] ?>" hx-target="#content_main_page" class="font-medium text-blue-600 dark:text-blue-500 hover:underline py-2 px-3 dark:bg-gray-800 rounded-lg"><i class="fa-solid fa-pen"></i></a>
                                <a href="javascript:void(0)" hx-confirm="Tem certeza?" hx-delete="<?=APP_URL?>/caixas?id=<?= $caixa["id"] ?>" hx-target="#content_main_page" class="font-medium text-red-600 dark:text-red-500 hover:underline dark:bg-gray-800 rounded-lg px-3 py-2"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-700 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700"></tr>
                    <th scope="row" colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        Nenhuma caixa para expandir
                    </th>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>