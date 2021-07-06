<?php
require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";
?>

<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js" defer></script>
<script src="public\plugins\datateble\Tables.js" defer></script>
<script src="public\js\MyScript\ajax.js" defer></script>

<div class="ml-16 mt-4 mr-3 lg:ml-64 ">
  <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
  </div>
</div>
  <div class="mb-20">

    <?php require_once 'views\admin\component\producto\lista-producto.php'; ?>
  
    <?php /* require_once 'views\admin\component\producto\lista-xUnidad.php'; */ ?>
  </div>



