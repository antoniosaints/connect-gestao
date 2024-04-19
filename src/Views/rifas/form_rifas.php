<nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <?php include_once __DIR__ . '/../partials/breadmain.php'; ?>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="javascript:void(0)" hx-get="/api/rifas" hx-target="#content_swap_output" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Rifas</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Formulario</span>
            </div>
        </li>
    </ol>
</nav>
<form class="max-w-xl mx-auto py-5 px-5 mx-auto bg-gray-50 rounded-lg dark:bg-gray-800" hx-post="/api/rifas" hx-target="#content_swap_output" hx-swap="outerHTML">
    <input type="hidden" name="id" value="<?= $rifa['id'] ?? '' ?>">
    <div class="mb-5">
        <label for="rifa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rifa</label>
        <input type="text" name="rifa" value="<?= $rifa['rifa'] ?? '' ?>" id="rifa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nome completo" required />
    </div>
    <div class="mb-5">
        <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsável</label>
        <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Selecione</option>
            <option value="US">Antonio Costa dos Santos</option>
            <option value="CA">Teste</option>
        </select>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="mb-5">
            <label for="objetivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta</label>
            <input type="number" min="0" step="0.01" name="objetivo" value="<?= $rifa['objetivo'] ?? '' ?>" id="objetivo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nome completo" required />
        </div>
        <div class="mb-5">
            <label for="contato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contato</label>
            <input type="text" name="contato" value="<?= $rifa['contato'] ?? '' ?>" id="contato" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nome completo" required />
        </div>
    </div>
    <div class="mb-5">
        <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rifa ..."><?= $rifa['descricao'] ?? '' ?></textarea>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
</form>
<script>
    $(document).ready(function() {

    });
</script>