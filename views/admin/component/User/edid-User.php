<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Nombre:</label>
    <div class="flex justify-between">
        <i class="fas fa-signature mt-3 mr-1"></i>
        <input value="<?php echo $data['profiles']['nombre']; ?>" type="text" name="nombre" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Apellido:</label>
    <div class="flex justify-between">
    <i class="fas fa-signature mt-3 mr-1"></i>
        <input value="<?php echo $data['profiles']['apellido']; ?>" step="any" type="text" name="apellido" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Cedula:</label>
    <div class="flex justify-between">
        <i class="fas fa-id-card mt-3 mr-1"></i>
        <input value="<?php echo $data['profiles']['cedula']; ?>" type="text" name="cedula" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>
<label for="country" class="  m-5  block text-base font-bold text-gray-700">Sexo</label>
<div class="col-span-6 sm:col-span-4 m-5 flex -mt-3 ">
    
    <i class="fas fa-venus-mars mt-3 mr-1"></i>
    <select id="Proveedor" name="sexo" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
       
        <?php
       

            if ($data['profiles']['sexo'] == "Masculino") { ?>                
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <?php
            }else {
              ?> 
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <?php
              
            }
        

        ?>
    </select>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Telefono:</label>
    <div class="flex justify-between">
        <i class="fas fa-phone mt-3 mr-1"></i>
        <input value="<?php echo $data['profiles']['telefono']; ?>" type="text" name="telefono" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Direccion:</label>
    <div class="flex justify-between">
        <i class="fas fa-route mt-3 mr-1"></i>
        <input value="<?php echo $data['profiles']['direccion']; ?>" type="text" name="dire" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

