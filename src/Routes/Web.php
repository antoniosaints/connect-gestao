<?php

use App\Http\Route;

Route::group(function () {
    Route::middleware("AuthMiddleware");
    // Usuários
    Route::get("/user", "Usuarios/UsuariosController::listaUsers");
    Route::get("/user/editar", "Usuarios/UsuariosController::editarUser");
    Route::get("/user/detalhe", "Usuarios/UsuariosController::detalheUser");
    Route::post("/user", "Usuarios/UsuariosController::Create");
    Route::put("/user", "Usuarios/UsuariosController::updateUser");
    Route::delete("/user", "Usuarios/UsuariosController::deleteUser");
    // Lojas
    Route::get("/rifas/editar", "Rifas/RifasController::editarRifa");
    Route::get("/rifas", "Rifas/RifasController::index");
    Route::post("/rifas", "Rifas/RifasController::save");
    // Main
    Route::get("/dashboard", "MainController::dashboard");
    // Pages
    Route::get("/pages/caixas", "Pages/PagesController::caixas");
    // Caixas
    Route::get("/caixas", "Caixas/CaixasController::ListaCaixas");
    Route::put("/caixas", "Caixas/CaixasController::FormCaixas");
    Route::get("/caixas/efetivar", "Caixas/CaixasController::EfetivarCaixa");
    Route::post("/caixas", "Caixas/CaixasController::Create");
    Route::delete("/caixas", "Caixas/CaixasController::Delete");
});
// Rotas auth
Route::get("/", "MainController::index");
Route::get("/isMenu", "MainController::isMenu");
Route::get("/login", "MainController::login");
Route::post("/auth", "MainController::auth");
Route::get("/logout", "MainController::logout");