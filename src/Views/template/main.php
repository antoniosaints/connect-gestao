<?php
include_once __DIR__ . '/../partials/contents_top.php'; 
?>
<div class="w-auto">
    <?php include_once __DIR__ . '/../partials/header.php'; ?>
    <div class="mt-14 sm:ml-64">
        <div class="content p-4 slide-it" id="content_main_page" hx-get="https://<?=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]?>" hx-trigger="load delay:1s">
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/../partials/contents_end.php';
