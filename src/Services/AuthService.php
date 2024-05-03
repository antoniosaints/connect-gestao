<?php
session_start();
class AuthService
{
    public static function destroySession()
    {
        if (isset($_SESSION)) {
            session_unset();
        }
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }
}