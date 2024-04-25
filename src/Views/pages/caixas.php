<section class="bg-white dark:bg-gray-900">
    <div class=" mx-auto max-w-screen-xl">
        <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
            <a href="javascript:void(0)" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                <i class="fa-solid fa-code-merge text-blue-400 text-xs"></i> Expansão
            </a>
            <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Expansão da CTO: <?= $caixa['caixa'] ?? '' ?></h1>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6"><?= $caixa['observacao'] ?? '' ?></p>
            <a href="javascript:void(0)" hx-confirm="Confirmar expansão?" hx-get="/api/caixas/efetivar?id=<?= $caixa["id"] ?>" hx-target="#content_main_page" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 dark:focus:ring-emerald-900">
                Expandir
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
</section>
