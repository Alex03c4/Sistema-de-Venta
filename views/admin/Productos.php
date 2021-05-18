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


<div class="ml-16 mt-4 mr-3 lg:ml-64 ">
  <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table id="Table" class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Precio
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Stock
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estatus
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">

                <?php
                if (isset($data['producto'])) {

                  foreach ($data['producto'] as $key => $value) {

                    echo $value->id;
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <?php
                            $img = "Producto.png";
                            $file = "defaul/";
                            if (isset($data['img'])) {

                            foreach ($data['img'] as $imagen => $resultado) {                             
                              if ($resultado->img_id === $value->id) {                              
                                $imgURL = $resultado->img_id."/".$resultado->url;                             
                                break;
                              }

                            }
                            }
                            ?>
                            <img class="h-10 w-10 rounded-full" src="public/img/Producto/<?php echo $imgURL; ?>" alt="">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              <?php echo $value->nombre ?>
                            </div>
                            <!-- <div class="text-sm text-gray-500">
                              jane.cooper@example.com
                            </div> -->
                          </div>
                        </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"> <i class="fas fa-dollar-sign"></i> <?php echo $value->precio ?> </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-green-100 text-green-800">
                          <?php echo $value->stock ?>
                        </span>
                      </td>

                      <?php
                      if ($value->estatus === '1') { ?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                        </td>
                      <?php
                      } else { ?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Inactivo</span>
                        </td>
                      <?php
                      }
                      ?>


                      <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                          </div>
                          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                          </div>

                          <form class="Delete" location="index.php?controllers=Producto&a=ViewProducto" action="index.php?controllers=Producto&a=destroy&id=<?php echo $value->id ?>" method="post">
                            <div class="transform hover:text-purple-500 hover:scale-110">

                              <input type="hidden" name="Eliminar-Producto" value="Eliminar">
                              <button type="submit">
                                <i class="far fa-copyright"></i>
                              </button>

                            </div>
                          </form>

                        </div>
                      </td>


                    </tr>
                 <?php }
                } ?>
                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>