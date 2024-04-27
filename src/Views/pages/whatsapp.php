<h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Whatsapp</h3>
<ul class="grid w-full gap-6 md:grid-cols-4">
    <?php if (!empty($caixas)) : foreach ($caixas as $caixa) : ?>
            <li hx-get="<?=APP_URL?>/pages/caixas?id=<?= $caixa["id"] ?>" hx-target="#content_main_page">
                <input type="checkbox" id="react-option" value="" class="hidden peer" required="">
                <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <i class="fa-brands fa-whatsapp mb-2 text-green-400 w-7 h-7"></i>
                        <div class="w-full text-lg font-semibold">
                            <div class="text-red-500"><i class="fa-solid fa-code-merge"></i> <?= $caixa['caixa'] ?? '' ?></div>
                        </div>
                        <div class="w-full text-sm"><?= $caixa['observacao'] ?? 'Sem observação' ?></div>
                    </div>
                </label>
            </li>
        <?php endforeach; endif; ?>
</ul>