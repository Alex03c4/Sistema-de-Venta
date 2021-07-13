<?php

require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js" defer></script>

<script src="public\plugins\datateble\Tables.js" defer></script>





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
                <h2 class="text-center font-bold text-lg">Ventas Pausadas</h2>

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

<div class="ml-16 mt-4 mr-3 lg:ml-64 mb-20">
  <div class="bg-green-500 text-white text-lg font-semibold transition-colors  shadow-lg rounded-2xl flex justify-between p-2">
    <div>
      <h2>Lista de las Ventas realizada</h2>
    </div>
    <div class="cursor-pointer mx-4">
      <i class="fas fa-window-minimize"></i>
    </div>
  </div>
  <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table id="Table2" class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="text-center px-6 py-3 font-bold text-xs  text-gray-500 uppercase tracking-wider">
                    #
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CLIENTE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    VENDEDOR
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  FECHA
                  </th>

                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  TOTAL
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tipo de pagoS
                  </th>

                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody id="tbody" class="bg-white divide-y divide-gray-200">
                <?php
                if (isset($data['ventas'])) {
                  foreach ($data['ventas'] as $key => $value) { ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                      
                      <td class="px-6 py-4 whitespace-nowrap font-bold text-center">
                        <div class="text-sm text-gray-900">  <?php echo $value->id_venta ?> </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap font-bold">
                        <div class="text-sm font-medium text-gray-900">  <?php  echo $value->Nc . " " . $value->Ac ?> </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap font-bold">
                        <div class="text-sm font-medium text-gray-900">  <?php echo $value->Np . " " . $value->Ap ?> </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap font-bold">
                        <div class="text-sm text-gray-900">  <?php echo $value->fecha ?> </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap font-bold">
                        <div class="text-sm text-gray-900"> <i class="fas fa-dollar-sign"></i> <?php echo $value->total ?> </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap font-bold">
                        <div class="text-sm text-gray-900">  <?php echo $value->tipo_pago ?> </div>
                      </td>

                      <td x-date class="flex px-6 py-4 whitespace-nowrap font-bold">
                        <form class="carrito" action="index.php?controllers=Venta&a=IDVentas" method="post">   
                          <input type="hidden" name="id_venta" value="<?php echo $value->id_venta ?>">
                          <button x-on:click.prevent type="submit" x-on:click="btm=!btm" x-show="btm">

                            <i class="hover:text-purple-600 animate-bounce far fa-arrow-alt-circle-down"></i>
                    
                          </button>                                             
                        </form>
                        
                       
                      </td>

                    </tr>



                <?php

                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>