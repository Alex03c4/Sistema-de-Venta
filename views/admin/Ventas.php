<?php
require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>
<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js" defer></script>

<script src="public\plugins\datateble\Tables.js" defer></script>
<script src="public\js\MyScript\ajax.js" defer></script>
<script src="public\js\MyScript\cliente\cliente.js" defer></script>

<!-- Carito -->
<script src="public\js\MyScript\ventas\ventas.js" defer></script>

<!-- <a href="index.php?controllers=Perfil&a=edit">Perfil</a> -->

<div class="ml-16 mt-4 mr-3  ">

  <form role="form" name="crear-ventas" id="Guardar-Actualizar" pagina="crear-ventas.php" method="post" action="index.php?controllers=Venta&a=GenerarVentas" enctype="multipart/form-data">
    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full  grid grid-cols-4 gap-2 ">
      <div class="col-span-4 lg:col-span-3">
        
        <?php require_once 'views\admin\component\ventas\info-carrito.php'; ?>
        
      </div>
      

      <div x-data="{ open: true }" class="col-span-4 lg:col-span-1">

        <?php require_once 'views\admin\component\ventas\info-clente.php'; ?>

      </div>

      <div class="col-span-4">

        <?php require_once 'views\admin\component\ventas\info-lista.php'; ?>

      </div>
    </div>
  </form>
</div>
