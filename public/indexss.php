<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php

    require '../vendor/autoload.php';
    $desde_codigo = obtener_get('desde_codigo');
    $hasta_codigo = obtener_get('hasta_codigo');
    $denominacion = obtener_get('denominacion');



    if (isset($_SESSION['mensaje'])) {
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }

    $pdo = conectar();
    $pdo->beginTransaction();
    $pdo->exec('LOCK TABLE articulos IN SHARE MODE');
    $where = [];
    $execute = [];
    if (isset($desde_codigo) && $desde_codigo != '') {
        $where[] = 'codigo >= :desde_codigo';
        $execute[':desde_codigo'] = $desde_codigo;
    }
    if (isset($hasta_codigo) && $hasta_codigo != '') {
        $where[] = 'codigo <= :hasta_codigo';
        $execute[':hasta_codigo'] = $hasta_codigo;
    }
    $where = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
    $sent = $pdo->prepare("SELECT COUNT(*) FROM articulos $where");
    $sent->execute($execute);
    $total = $sent->fetchColumn();
    $sent = $pdo->prepare("SELECT * FROM articulos $where ORDER BY codigo");
    $sent->execute($execute);
    $pdo->commit();
    ?>


    <div class="overflow-x-auto relative mt-4 ">
    <?php require '../src/_menu.php' ?>
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="py-3 px-6">Codigo</th>
                    <th scope="col" class="py-3 px-6">Descripción</th>
                    <th scope="col" class="py-3 px-6">Precio</th>
                </thead>
                <tbody>
                    <?php foreach ($sent as $fila) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6"><?= hh($fila['codigo']) ?></td>
                            <td class="py-4 px-6"><?= hh($fila['descripcion']) ?></td>
                            <td class="py-4 px-6"><?= hh($fila['precio']) ?></td>
                            <td class="py-4 px-6 text-center">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    
    
    </div>
    </br>

<div>
<form action="" method="get">
<label  class="block mb-4 text-sl font-medium text-blue-900 dark:text-red align text-center">Buscar por Códigos</label>
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desde Código</label>
    <input type="text" name="desde_codigo" value ="<?= hh($desde_codigo) ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasta Código</label>
    <input type="text" name="hasta_codigo" value ="<?= hh($hasta_codigo) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </br>
    <button type="submit" class="content-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>

</form>
</div>
    


    <script src="/js/flowbite/flowbite.js"></script>

</body>

</html>