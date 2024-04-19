<?php

use App\Http\Route;
//Rota main
Route::get("/", "MainController::index");
Route::get("/login", "MainController::login");
Route::get("/dashboard", "MainController::dashboard");
// Lojas
Route::get("/rifas", "Rifas/RifasController::index");
Route::post("/rifas", "Rifas/RifasController::save");
Route::get("/rifas/editar", "Rifas/RifasController::editarRifa");
// Usuários
Route::get("/user/editar", "Usuarios/UsuariosController::editarUser");
Route::get("/user/detalhe", "Usuarios/UsuariosController::detalheUser");
Route::get("/user", "Usuarios/UsuariosController::getJson");
Route::post("/user", "Usuarios/UsuariosController::Create");
Route::put("/user", "Usuarios/UsuariosController::updateUser");
Route::delete("/user", "Usuarios/UsuariosController::deleteUser");