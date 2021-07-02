<div class="  rounded-2xl gap-y-5 mb-7">
  <div class="bg-green-500 text-white text-lg font-semibold transition-colors  shadow-lg rounded-2xl flex justify-between p-2">
    <div>
      <h2>Lista de Producto</h2>
    </div>
    <div class="cursor-pointer mx-4">
      <i class="fas fa-window-minimize"></i>
    </div>
  </div>
  <div class="mt-5">
    <table id="Table" class=" min-w-full divide-y divide-gray-200">
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
          <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
            Cantidad Comprada
          </th>

          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Sub-Total
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
                          } else { ?>

                          bg-green-100 text-green-800
                         
                         <?php

                          }
                          ?> ">

                    <?php echo $value->stock; ?>

                  </span>
                </td>


                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 text-center">  <?php echo $value->can ?> </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900"> <i class="fas fa-dollar-sign"></i> <?php echo $value->Total ?> </div>
                </td>




              </tr>


            <?php 
          }                  
        } 
        ?>
        <!-- More people... -->
      </tbody>
    </table>
  </div>
</div>