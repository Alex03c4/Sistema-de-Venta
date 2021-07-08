<?php

require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>

<!-- <a href="index.php?controllers=Perfil&a=edit">Perfil</a> -->

<div class="ml-16 mt-4 mr-3 lg:ml-64 ">
    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
        <pre>
            <?php
            var_dump($_SESSION);
            ?>
        </pre>
    </div>
</div>














<?php

require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>



<div class="ml-16 mt-4 mr-3 lg:ml-64 grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    <a href="index.php?controllers=Venta&a=getVentas">
        <div id="ventas" class="cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

            <div class=" my-auto text-3xl p-4 rounded-full bg-blue-600 bg-opacity-75 text-gray-100">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="w-2/3 px-3 ">
                <h2 class="text-center font-bold text-lg">Ventas</h2>

            </div>

        </div>
    </a>
    <a href="index.php?controllers=Producto&a=ViewProducto">
        <div id="ventas" class="relative cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
            <div class=" my-auto text-3xl p-4 rounded-full bg-green-600 bg-opacity-75 text-gray-100">
                <i class=" fas fa-people-carry"></i>
            </div>
            <div class="w-2/3 px-3 ">
                <h2 class="text-center font-bold text-lg">Producto</h2>

            </div>

        </div>
    </a>

    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

    </div>

    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

    </div>


    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

    </div>
</div>