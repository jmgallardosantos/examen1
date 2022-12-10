<?php

namespace App\Tablas;

use PDO;

class Articulo
{
    public $id;
    public $codigo;
    public $descripicion;
    public $precio;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->codigo = $campos['codigo'];
        $this->descripcion = $campos['descripcion'];
        $this->precio = $campos['precio'];
    }

    public static function insertar($codigo, $descripcion, $precio, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO articulos (codigo, descripcion, precio)
                                    VALUES (:codigo, :descripcion, :precio)');
        $sent->execute([':codigo' => $codigo, ':descripcion' => $descripcion, ':precio' => $precio]);
    }

    public static function modificar($id, $codigo, $descripcion, $precio,  ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("UPDATE articulos 
                                  SET precio= :precio, descripcion= :descripcion, codigo= :codigo
                                WHERE id = :id");
        $sent->execute([':id' => $id, ':precio' => $precio, ':descripcion' => $descripcion, ':codigo' => $codigo] );
    }

    public static function borrar($id, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("DELETE FROM articulos
                                     WHERE id = :id");
        $sent->execute([':id' => $id]);
    }

}
