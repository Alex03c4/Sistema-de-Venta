<div class="  rounded-2xl gap-y-5">
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
            .....
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Stock
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Etiquetas
          </th>
          <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Carrito</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">

        <?php
        if (isset($data['producto'])) {

          foreach ($data['producto'] as $key => $value) {
            if ($value->estatus == 1 && $value->stock > 0) { ?>

              <tr class="border-b border-gray-200 hover:bg-gray-100">

                <td class="px-6 py-4 whitespace-nowrap ">
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

                <td class="px-6 py-4 whitespace-nowrap font-bold">
                  <div class="text-sm text-gray-900"> <i class="fas fa-dollar-sign"></i> <?php echo $value->precio ?> </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap flex font-bold">
                  <div class="text-sm text-gray-900"> <?php echo $value->Total_unidad  ?> </div>
                  <div><?php
                        if ($value->id_unidad == 1) {
                          echo 'Kg';
                        } else if ($value->id_unidad == 2) {
                          echo 'L';
                        } else if ($value->id_unidad == 3) {
                          echo 'M';
                        } else {
                          echo 'Otros';
                        }
                        ?>
                  </div>
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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 grid grid-cols-1 lg:grid-cols-5 gap-2">
                  <?php
                  foreach ($data['tags'] as $llave => $resultado2) {

                    if ($resultado2->taggable_id ==  $value->id) { ?>
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        
                        <?php
                        echo " bg-" . $resultado2->color . "-200 " . " text-" . $resultado2->color . "-800 ";
                        ?>
                          "><?php echo $resultado2->nombre ?></span>
                  <?php
                    }
                  } ?>
                </td>


                <td class="py-3 px-6 text-center">
                  <div x-data="{ btm: true }" class="flex item-center justify-center m-1">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                      <form class="carrito" action="index.php?controllers=Venta&a=Carrito" method="post">
                        <input type="hidden" name="img" value="<?php echo $imgURL ?>">
                        <input type="hidden" name="id" value="<?php echo $value->id ?>">
                        <input type="hidden" name="nombre" value="<?php echo $value->nombre ?>">
                        <input type="hidden" name="precio" value="<?php echo $value->precio ?>">
                        <input type="hidden" name="marca" value="<?php echo $value->marca ?>">
                        <input type="hidden" name="stock" value="<?php echo $value->stock ?>">
                        <input type="hidden" name="imgURL" value="<?php echo $imgURL ?>">
                        <input type="hidden" name="descrip" value="<?php echo $value->descripcion ?>">

                        <button type="submit" x-on:click="btm=!btm" x-show="btm">
                          <i class="fas fa-shopping-cart"></i>
                        </button>
                      </form>

                    </div>
                  </div>
                </td>
              </tr>


        <?php }
          }
        }
        ?>
        <!-- More people... -->
      </tbody>
    </table>
  </div>
</div>