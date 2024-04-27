<nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <?php include_once __DIR__ . '/../partials/breadmain.php'; ?>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <a href="javascript:void(0)" hx-get="<?=APP_URL?>/caixas" hx-target="#content_main_page" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Caixas de atendimento</a>
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
<form class="max-w-xl mx-auto py-5 px-5 mx-auto bg-gray-50 rounded-lg dark:bg-gray-800" hx-post="<?=APP_URL?>/caixas" hx-target="#content_main_page">
  <input type="hidden" name="id" value="<?= $caixa['id'] ?? '' ?>">
  <div class="mb-5">
    <label for="caixa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IP</label>
    <input type="text" name="caixa" value="<?= $caixa['caixa'] ?? '' ?>" id="caixa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Caixa para expandir" required />
  </div>
  <div class="mb-5">
    <label for="caixa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Porta</label>
    <input type="text" name="caixa" value="<?= $caixa['caixa'] ?? '' ?>" id="caixa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Caixa para expandir" required />
  </div>
  <div class="mb-5">
    <label for="caixa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Secret</label>
    <input type="text" name="caixa" value="<?= $caixa['caixa'] ?? '' ?>" id="caixa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Caixa para expandir" required />
  </div>
  <div class="mb-5">
    <label for="observacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observação</label>
    <input type="text" name="observacao" value="<?= $caixa['observacao'] ?? '' ?>" id="observacao" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Observação" required />
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adicionar</button>
</form>