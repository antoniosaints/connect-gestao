<?php
include_once __DIR__ . '/../partials/contents_top.php'; ?>
<div class="w-screen">
    <?php include_once __DIR__ . '/../partials/header.php'; ?>

    <!-- Conteúdo -->
    <div class="mt-14 sm:ml-64">
        <div class="content p-4 slide-it" id="content_main_page" hx-get="" hx-trigger="load">
        </div>
    </div>
</div>
<script>
    var path = localStorage.getItem('path') || "/api/dashboard";
    document.getElementById('content_main_page').setAttribute('hx-get', path);
</script>
<?php include_once __DIR__ . '/../partials/contents_end.php';
