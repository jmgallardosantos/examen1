<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/output.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <?php
  require '../../vendor/autoload.php';

  $codigo = obtener_post('codigo');
  $descripcion = obtener_post('descripcion');
  $precio = obtener_post('precio');
 

    if (isset($codigo) && $codigo != '') {
        \App\Tablas\Articulo::insertar($codigo, $descripcion, $precio);
        return volver_logueado();
    } 
  ?>


  <form class="mt-5 mr-96 ml-96" action="" method="POST">
    <div class="mb-6">
      <label for="departamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Código</label>
      <input type="text" id="codigo" name="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      <label for="departamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descripcion</label>
      <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      <label for="departamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Precio</label>
      <input type="text" id="precio" name="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
    </div>


    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
  </form>
  <script src="../js/flowbite/flowbite.js"></script>

</body>

</html>