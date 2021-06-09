<div class="bg-gray-100  rounded-2xl gap-y-5">
    <div class="bg-blue-500 text-white text-lg font-semibold transition-colors  shadow-lg rounded-2xl flex justify-between p-2">
        <div>
            <h2>Información del Cliente</h2>
        </div>
        <div class="cursor-pointer mx-4">
            <i x-on:click="open= !open" class="fas fa-window-minimize"></i>
        </div>
    </div>

    <div x-show="open">
        <div id="ajax" class="m-2 ">
            <label for="last_name" class="block text-base font-bold text-gray-700">Cedula del Cliente:</label>
            <div class="flex justify-between">
                <i class="far fa-id-card mt-3 mr-1"></i>
                <input type="number" id="Cedula-cliente" name="Cedula-cliente" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>




        <div id="Nuevo-cliente" class="Nuevo-cliente hidden ">
            <div class="grid grid-cols-2">
                <div class="m-2">
                    <label for="last_name" class="block text-base font-bold text-gray-700">Nombre:</label>
                    <div class="flex justify-between">
                        <i class="far fa-id-card mt-3 mr-1"></i>
                        <input type="text" name="nombre" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="m-2">
                    <label for="last_name" class="block text-base font-bold text-gray-700">Apellido:</label>
                    <div class="flex justify-between">
                        <i class="far fa-id-card mt-3 mr-1"></i>
                        <input type="text" name="apellido" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="m-2">
                    <label for="last_name" class="block text-base font-bold text-gray-700">teléfono:</label>
                    <div class="flex justify-between">
                        <i class="far fa-id-card mt-3 mr-1"></i>
                        <input type="text" name="telefono" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="m-2">
                    <label for="last_name" class="block text-base font-bold text-gray-700">Dirección:</label>
                    <div class="flex justify-between">
                        <i class="far fa-id-card mt-3 mr-1"></i>
                        <input type="text" name="direccion" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="m-2 col-span-2">
                    <label for="last_name" class="block text-base font-bold text-gray-700">Correo:</label>
                    <div class="flex justify-between">
                        <i class="far fa-id-card mt-3 mr-1"></i>
                        <input type="email" name="email" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

            </div>

        </div>


        <div class="px-4 py-3  text-right sm:px-6">
            <input type="hidden" name="Ventas" value="actualizar">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</div>