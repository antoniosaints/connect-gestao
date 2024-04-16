<?php

use App\Http\Route;

//Rota main
Route::get("/", "MainController::index");

// Rotas Lojas
Route::get("/lista_lojas", "Lojas/Listagens::index");
// Rotas usuarios
Route::get("/user", "Usuarios/UsuariosController::getJson");
Route::get("/editar-usuario", "Usuarios/UsuariosController::editarUser");
Route::post("/user", "Usuarios/UsuariosController::Create");
Route::put("/user", "Usuarios/UsuariosController::updateUser");
Route::delete("/user", "Usuarios/UsuariosController::deleteUser");