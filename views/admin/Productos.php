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

                  foreach ($data['producto'] as $key => $value) {?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <?php
                            $imgURL = "defaul/Producto.png";
                           
                            if (isset($data['img'])) {
                              foreach ($data['img'] as $imagen => $resultado) {
                                if ($resultado->img_id === $value->id) {
                                  $imgURL = $resultado->img_id . "/" . $resultado->url;
                                  break;
                                }
                              }
                            }
                            ?>
                            <img class="h-10 w-10 rounded-full" src="public/img/Producto/<?php echo $imgURL; ?>" alt="<?php echo $imgURL; ?>">
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
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        <?php
                        if ($value->stock <= 25) { ?>
                            bg-red-200 text-red-600
                           <?php
                        } else{ ?>

                          bg-green-100 text-green-800
                         
                         <?php

                        }
                        ?> ">

                          <?php echo $value->stock; ?>

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
                        <div class="flex item-center justify-center m-1">
                          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="#">
                            <i class="far fa-eye"></i>
                            </a>
                          </div>

                          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="index.php?controllers=Producto&a=getByID&id=<?php echo $value->id ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>

                          </div>

                          <form class="Delete" location="index.php?controllers=Producto&a=ViewProducto" action="index.php?controllers=Producto&a=destroy&id=<?php echo $value->id ?>" method="post">
                            <div class="transform hover:text-purple-500 hover:scale-110">

                              <input type="hidden" name="Eliminar-Producto" value="Eliminar">
                              <button type="submit">
                                <i class="fas fa-trash-alt"></i>
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