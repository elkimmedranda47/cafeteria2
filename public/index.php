<?php
require_once '../App/Config/database.php';
require_once '../App/Config/PobladorBd.php';

//require_once 'app/Controller/LoginController.php';
require_once('../App/Controller/ProductoController.php');
$controlador = new ProductoController();
$controlador->listarProductos();
//require_once('../App/Controller/LoginController.php');
//LoginController::index();
?>