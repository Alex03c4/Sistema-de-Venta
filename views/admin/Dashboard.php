<?php
    require_once "views\components\admin\header.php";
    require_once "views\admin\component\layouts\sidebarTW.php";
    /* try {
       $Dolar = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'), true);
       $_SESSION['dolar'] =$Dolar['USD']['promedio_real'];
    } catch (Exception $e) {
      
    } */
     $_SESSION['dolar'] = 3600000; 
    
    $hora = (localtime(time(), true));
    $fecha =  "2021" . "-" . ($hora["tm_mon"] + 1) . "-" . ($hora["tm_mday"] + 1);
?>

<!-- Gráfica -->
<!-- http://morrisjs.github.io/morris.js/ -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



<div class="ml-16 mt-4 mr-3 lg:ml-64 grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    <a href="https://www.bancodevenezuela.com/" target="_blank">
        <div id="ventas" class="h-28  cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

            <div class=" my-auto text-3xl p-4 rounded-full bg-green-500 bg-opacity-75 text-gray-100">
                <i class="mx-3 fas fa-dollar-sign"></i>
            </div>
            <div class="w-2/3 px-3 text-center ">
                <h2 class="text-center font-bold text-lg">Precio</h2>
                <p class="font-bold"><?php echo number_format($_SESSION['dolar'], 2, ",", ".");  ?></p>
                <p><?php echo '19-07-2021' /* $Dolar['_timestamp']['fecha_corta'] */;  ?></p>

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
                <p class="font-bold"><span>Total : </span><?php echo $data2['Ventas'] ?></p>
                <p class="font-bold"><span> Del Dia : </span><?php echo $data2['VentaDia'] ?></p>
            </div>

        </div>
    </a>



    <a href="index.php?controllers=Producto&a=ViewProducto">
        <div id="ventas" class="h-28 cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
            <?php 
                if ($data2['estincion']['con'] > 0 ) {
                  ?> 
                    <span class="relative inline-flex rounded-md shadow-sm">
                        <span class="flex absolute h-4 w-4 -top-2 ml-52 ">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-400"></span>
                        </span>
                    </span>
                  <?php                    
                }

            ?>
            

            <div class=" my-auto text-3xl p-4 rounded-full bg-green-600 bg-opacity-75 text-gray-100">
                <i class=" fas fa-people-carry"></i>
            </div>
            <div class="w-2/3 px-3 ">
                <h2 class="text-center font-bold text-lg">Producto</h2>
                <p class="font-bold"><span>Total : </span><?php echo $data2['TotalProducto'] ?></p>
            </div>

        </div>
    </a>

    <a href="index.php?controllers=Credito&a=ViewCredito">
        <div id="ventas" class="h-28 cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
            <?php 
                if ($data2['ceditoActivos'] > 0 ) {
                  ?> 
                    <span class="relative inline-flex rounded-md shadow-sm">
                        <span class="flex absolute h-4 w-4 -top-2 ml-52 ">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-400"></span>
                        </span>
                    </span>
                  <?php                    
                }

            ?>
            

            <div class=" my-auto text-3xl p-4 rounded-full bg-red-600 bg-opacity-75 text-gray-100">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="w-2/3 px-3 ">
                <h2 class="text-center font-bold text-lg">Créditos</h2>
                <p class="font-bold"><span>Total : </span><?php echo $data2['cedito'] ?></p>
                <p class="font-bold"><span>Activos : </span><?php echo $data2['ceditoActivos'] ?></p>
            </div>

        </div>
    </a>

    <a href="#">
        <div id="ventas" class="h-28 cursor-pointer flex justify-around bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

            

            <div class=" my-auto text-3xl p-4 rounded-full bg-indigo-600 bg-opacity-75 text-gray-100">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="w-2/3 px-3 ">
                <h2 class="text-center font-bold text-lg">Monto total </h2>
                
                <p class="font-bold"><span>Del Dia : $ </span><?php echo $Total[0]+$Total2[0] ?></p>
               
            </div>

        </div>
    </a>


</div>


<div class=" ml-16 mt-4 mr-3 lg:ml-64 ">
    <div class="grid grid-cols-5 gap-3 ">
        <div class="bg-white mt-10  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full col-span-5 xl:col-span-5">
            <div class="" id="Gráfica1" style="height: 250px;"></div>
        </div>
      <!--   <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full col-span-5 xl:col-span-2">
            <div class="" id="graph" style="height: 250px;"></div>
        </div> -->
</div>


<?php   
    $fecha_actual = date("Y-m-d");  
    $d1 = date("Y-m-d",strtotime($fecha_actual."- 1 days"));
    $d2 = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
    $d3 = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
    $d4 = date("Y-m-d",strtotime($fecha_actual."- 4 days"));
    $d5 = date("Y-m-d",strtotime($fecha_actual."- 5 days"));
    $d6 = date("Y-d-m",strtotime($fecha_actual."- 6 days"));
    $d7 = date("Y-d-m",strtotime($fecha_actual."- 7 days"));
    $d8 = date("Y-d-m",strtotime($fecha_actual."- 9 days"));    
?>

</div>
<script>
    var day_data = [

        {"period": "<?php echo $d5 ." 12:00:00" ?>", "Total $": <?php echo  $Total[5]?>},
        {"period": "<?php echo $d5 ." 20:00:00" ?>", "Total $": <?php echo  $Total2[5]?>},

        {"period": "<?php echo $d4 ." 12:00:00" ?>", "Total $": <?php echo  $Total[4]?>},
        {"period": "<?php echo $d4 ." 20:00:00" ?>", "Total $": <?php echo  $Total2[4]?>},
        
        {"period": "<?php echo $d3 ." 12:00:00" ?>", "Total $": <?php echo  $Total[3]?>},
        {"period": "<?php echo $d3 ." 20:00:00" ?>", "Total $": <?php echo  $Total2[3]?>},

        {"period": "<?php echo $d2 ." 12:00:00" ?>", "Total $": <?php echo  $Total[2]?>},
        {"period": "<?php echo $d2 ." 20:00:00" ?>", "Total $": <?php echo  $Total2[2]?>},

        {"period": "<?php echo $d1 ." 12:00:00" ?>", "Total $": <?php echo  $Total[1]?>},
        {"period": "<?php echo $d1 ." 20:00:00" ?>", "Total $": <?php echo  $Total2[1]?>},

        {"period": "<?php echo $fecha_actual ." 12:00:00" ?>", "Total $": <?php echo  $Total[0]?>},
        {"period": "<?php echo $fecha_actual ." 20:00:00" ?>", "Total $": <?php echo  $Total2[0]?>},
    

        
    ];
    Morris.Line({
    element: 'Gráfica1',
    data: day_data,
    resize:true,
    xkey: 'period',
    ykeys: ['Total $' ],
    labels: ['Total $']
    });
</script>

<script>
/*     Morris.Donut({
    element: 'graph',
    data: [
        {value: 70, label: 'foo', formatted: 'at least 70%' },
        {value: 15, label: 'bar', formatted: 'approx. 15%' },
        {value: 10, label: 'baz', formatted: 'approx. 10%' },
        {value: 5, label: 'A really really long label', formatted: 'at most 5%' }
    ],
    resize:true,
    formatter: function (x, data) { return data.formatted; }
    }); */
</script>