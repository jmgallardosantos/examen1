<?php
require '../../vendor/autoload.php';
use App\Tablas\Articulo;
session_start();

$id = obtener_post('id');


if (!isset($id)) {
    return volver();
}
$pdo = conectar();

$sent = $pdo->prepare("SELECT count(id) 
                       FROM articulos
                       WHERE id = :id");
$sent->execute([':id' => $id]);
$existe = $sent->fetchColumn();
if ($existe != 1) {
    $_SESSION['error'] = 'No existe el departamento.';
    return volver_admin();
}


Articulo::borrar($id);
$_SESSION['exito'] = 'El artículo se ha borrado correctamente.';

volver_logueado();