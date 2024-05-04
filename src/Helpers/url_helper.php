<?php
if (!function_exists('baseUrl')) {
    /**
     * Retorna a URL base do sistema
     */
    function baseUrl(string $url = null)
    {
        return BASE_URL . $url;
    }
}

if (!function_exists('currentUrl')) {
    /**
     * Retorna a URL atual do sistema
     */
    function currentUrl(): string
    {
        return BASE_URL . $_SERVER['REQUEST_URI'];
    }
}
