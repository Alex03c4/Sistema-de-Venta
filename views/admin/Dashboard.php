<?php
    require_once "views\components\admin\header.php";
    require_once "views\admin\component\layouts\sidebarTW.php";
    $Dolar = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'), true);
    $_SESSION['dolar'] =$Dolar['USD']['promedio_real'];
?>




        <div class="ml-16 mt-4 mr-3 lg:ml-64 grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            <a href="https://www.bancodevenezuela.com/" target="_blank">
                <div id="ventas" class="h-28  cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

                    <div class=" my-auto text-3xl p-4 rounded-full bg-blue-600 bg-opacity-75 text-gray-100">
                        <i class="mx-3 fas fa-dollar-sign"></i>
                    </div>
                    <div class="w-2/3 px-3 text-center ">
                        <h2 class="text-center font-bold text-lg">Precio</h2>
                        <p ><?php echo number_format($Dolar['USD']['promedio_real'], 2, ",", ".");  ?></p>
                        <p><?php echo $Dolar['_timestamp']['fecha_corta'];  ?></p>     
                        
                    </div>

                </div>
            </a>
            <a href="index.php?controllers=Venta&a=getVentas">
                <div id="ventas" class="h-28 cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

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


        <div class="ml-16 mt-4 mr-3 lg:ml-64 ">
    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
        <pre>
            <?php
            var_dump($_SESSION);
            ?>
        </pre>
    </div>
</div>