<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Nombre de la Empresa:</label>
    <div class="flex justify-between">
    <i class="far fa-building  mt-3 mr-1"></i>
        <input value="<?php echo $data['empresa']['nombre']; ?>"  type="text" name="nombre" autocomplete="off" id="nombre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Documento:</label>
    <div class="flex justify-between">
        <i class="fas fa-dollar-sign mt-3 mr-1"> </i>
        <input value="<?php echo $data['empresa']['documento']; ?>" type="text" name="documento" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Movil:</label>
    <div class="flex justify-between">
    <i class="fas fa-mobile-alt  mt-3 mr-1  "></i>
        <input value="<?php echo $data['empresa']['telefono']; ?>" type="number" name="telefono" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Movil:</label>
    <div class="flex justify-between">
    <i class="fas fa-mobile-alt  mt-3 mr-1  "></i>
        <input value="<?php echo $data['empresa']['telefono2']; ?>" type="number" name="movil" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Email:</label>
    <div class="flex justify-between">
    <i class="fas fa-at  mt-3 mr-1 "></i>
        <input value="<?php echo $data['empresa']['email']; ?>" type="email" name="email" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Dirección:</label>
    <div class="flex justify-between">
    <i class="fas fa-route mt-3 mr-1"></i>
    
        <input value="<?php echo $data['empresa']['direccion']; ?>" type="text" name="direccion" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>
    