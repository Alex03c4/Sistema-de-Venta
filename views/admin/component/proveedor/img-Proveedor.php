<form name="info-Proveedor-form" class="Updates" method="post" action="index.php?controllers=Proveedor&a=Insert" enctype="multipart/form-data">
    <div class="col-span-6 sm:col-span-4 m-5 ">
        <label for="country" class="block text-base font-bold text-gray-700">Country / Region</label>
        
        <select id="Proveedor" name="proveedorT" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <!-- <option value="-1" selected="" disabled="">Select one</option> -->
            <option  value="0">Nuevo Producto</option>
            <?php
            foreach ($data['proveedor'] as $key) { ?>
                <option value="<?php echo 1 ?>">
                    <?php echo $key->nombre ?>
                </option>
            <?php } ?>

        </select>

    </div>    
    
    <div id="ajax">
        <div class="col-span-6 sm:col-span-4 m-5 border-b">
            <label for="last_name" class="block text-base font-bold text-gray-700">Nombre:</label>
            <input type="text" name="nombreP" autocomplete="off" id="nombreP" class="p-2 capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 sm:col-span-4 m-5 border-b">
            <label for="last_name" class="block text-base font-bold text-gray-700">Teléfono:</label>
            <div class="flex justify-between">
                <i class="fas fa-phone mt-3 mr-1"></i>

                <input type="number" name="telefono" autocomplete="off" id="telefono" class="p-2 capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

        </div>

        <div class="col-span-6 sm:col-span-4 m-5 border-b">
            <label for="last_name" class="block text-base font-bold text-gray-700">dirección:</label>
            <div class="flex justify-between">
                <i class="fas fa-route mt-3 mr-1"></i>
                <input type="text" name="direccion" autocomplete="off" id="direccion" class="p-2 capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 m-5 border-b">
            <label for="last_name" class="block text-base font-bold text-gray-700">Descripcion:</label>
            <div class="flex justify-between">
                <textarea id="descripcion2" name="descripcionPro">

                </textarea>
            </div>
        </div>
        <div class="px-4 py-3  text-right sm:px-6">
            <input type="hidden" name="Update" value="actualizar">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>    
    
    </div>



</form>