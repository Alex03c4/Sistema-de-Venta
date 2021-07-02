<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Fecha emisión :</label>
    <div class="flex justify-between">
        <i class="fas fa-signature mt-3 mr-1"></i>
        <input readonly="readonly" value="<?php echo $data['Venta']['fecha'] ; ?>" type="text" name="nombre" autocomplete="off" id="nombre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Monto total del Credito:</label>
    <div class="flex justify-between">
    <i class="fas fa-dollar-sign mt-3 mr-1"> </i>
        <input readonly="readonly" value="<?php echo $data['Venta']['total']; ?>" type="text" name="marca" autocomplete="off" id="marca" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>
