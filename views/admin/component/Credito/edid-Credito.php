<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Nombre:</label>
    <div class="flex justify-between">
        <i class="fas fa-signature mt-3 mr-1"></i>
        <input readonly="readonly" value="<?php echo $data['Cliente']['nombre'] . " " . $data['Cliente']['apellido']; ?>" type="text"  autocomplete="off" id="nombre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Cedula:</label>
    <div class="flex justify-between">
        <i class="far fa-copyright mt-3 mr-1"></i>
        <input readonly="readonly" value="<?php echo $data['Cliente']['cedula']; ?>" type="text"  autocomplete="off" id="marca" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Teléfono:</label>
    <div class="flex justify-between">
        <i class="fas fa-truck-loading mt-3 mr-1"></i>
        <input readonly="readonly" value="<?php echo $data['Cliente']['telefono']; ?>" type="number" autocomplete="off" id="stock" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Monto a pagar :</label>
    <div class="flex justify-between">
        <i class="fas fa-dollar-sign mt-3 mr-1"> </i>
        <input  value="<?php echo $data['Credito']['monto']; ?>" min = "0" step="any" type="number" name="monto" autocomplete="off" id="precio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>


