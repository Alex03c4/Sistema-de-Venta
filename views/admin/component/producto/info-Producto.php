<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Nombre:</label>
    <div class="flex justify-between">
        <i class="fas fa-signature mt-3 mr-1"></i>
        <input type="text" name="nombre" autocomplete="off" id="nombre" class="Limite limpiar mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Precio:</label>
    <div class="flex justify-between">
        <i class="fas fa-dollar-sign mt-3 mr-1"> </i>
        <input step="any" type="number" name="precio" autocomplete="off" id="precio" class="limpiar space-y-0mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Marca:</label>
    <div class="flex justify-between">
        <i class="far fa-copyright mt-3 mr-1"></i>
        <input type="text" name="marca" autocomplete="off" id="marca" class="limpiar mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>

<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Stock:</label>
    <div class="flex justify-between">
        <i class="fas fa-truck-loading mt-3 mr-1"></i>
        <input type="number" name="stock" autocomplete="off" id="stock" class="limpiar mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
</div>


<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Unidad de conversion:</label>
    <div class="flex justify-between font-bold">
        <div class="mt-1">
            <input checked type="radio" id="KG" name="radio" value="1">
            <label for="Tarjeta">Kg</label>
        </div>
        <div class="mt-1">
            <input  type="radio" id="v" name="radio" value="2">
            <label for="Tarjeta">L</label>
        </div>
        <div class="mt-1">
            <input type="radio" id="M" name="radio" value="3">
            <label for="Efectivo">M</label>
        </div>
        <div class="mt-1">
            <input type="radio" id="Otros" name="radio" value="4">
            <label for="Efectivo">Otros</label>
        </div>
        <div>
            <input step="any" type="number" name="Total_unidad" autocomplete="off" class="limpiar mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">     
        </div>

    </div>
</div>


<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="last_name" class="block text-base font-bold text-gray-700">Descripcion:</label>
    <div class="flex justify-between">
        <textarea rows="10" cols="50"  id="editor" name="descripcion" class="limpiar">
        </textarea>
    </div>
</div>