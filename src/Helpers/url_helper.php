<?php
if (!function_exists('baseUrl')) {
    function baseurl(string $url = null)
    {
        return BASE_URL . $url;
    }
}
