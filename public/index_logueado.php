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


    $pdo = conectar();
    $sent = $pdo->query("SELECT * FROM articulos ORDER BY id");

    
    //$filas = $sent->fetchAll();

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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td></td>
                            <td class="py-4 px-6 text-center">
                                <a href="mma.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Modificar mis artículos</a>
                            </tr>
                </tbody>
            </table>
        </div>
        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    </div>

    <script src="/js/flowbite/flowbite.js"></script>

</body>

</html> 

