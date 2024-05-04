<?php

foreach (glob(APP_PATH . '/src/Helpers/*_helper.php') as $filename) {
    require_once $filename;
}