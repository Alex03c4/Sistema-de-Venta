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
  <div class="bg-green-500 text-white text-lg font-semibold transition-colors  shadow-lg rounded-2xl flex justify-between p-2">
    <div>
      <h2>Lista de Crédito</h2>
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
            <table id="Table" class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre Cliente
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cedula
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Teléfono
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Monto
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Numero de factura
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">

                <?php
                if (isset($data['Credito'])) {

                  foreach ($data['Credito'] as $key => $value) { ?>
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
                              <?php echo $value->nombre . " " . $value->apellido ?>
                            </div>
                            <!-- <div class="text-sm text-gray-500">
                              jane.cooper@example.com
                            </div> -->
                          </div>
                        </div>
                      </td>


                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">  <?php echo $value->cedula ?> </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">  <?php echo $value->telefono ?> </div>
                      </td>

                      
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900"> <i class="fas fa-dollar-sign"></i> <?php echo $value->monto ?> </div>
                      </td>


                      
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900"> <i class="fas fa-file-invoice-dollar"></i> <?php echo $value->id_venta ?> </div>
                      </td>
                      


                      <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center m-1">
                          

                          <div class="w-4 mr-2 transform   hover:text-purple-500 hover:scale-110">
                            <a href="index.php?controllers=Credito&a=getByID&id=<?php echo $value->idCredito ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>

                          </div>

                          

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