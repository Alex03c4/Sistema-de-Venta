<div class="container mx-auto mt-20">
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-extrabold  leading-6 text-gray-900">información del perfil</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Actualice la información de perfil
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form name="login-perfil-form" id="Updates-perfil" class="Updates" method="post" action="index.php?controllers=Perfil&a=update">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6 ">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4 border-black">
                                    <label for="first_name" class="block text-base font-bold text-gray-700 ">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" value="<?php echo $data["profiles"]["nombre"]; ?>"
                                        class="capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="last_name" class="block text-base font-bold text-gray-700">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" value="<?php echo$data["profiles"]['apellido']; ?>"
                                        class="capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email_address" class="block text-base font-bold text-gray-700">Cedula</label>
                                    <input type="text" name="cedula" id="cedula" value="<?php echo $data["profiles"]['cedula']; ?>"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-base font-bold text-gray-700">Sexo</label>
                                    <select id="country" name="sexo" autocomplete="country" 
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>Masculino</option>
                                        <option>Femenino</option>                                        
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="street_address" class="block text-base font-bold text-gray-700">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" value="<?php echo $data["profiles"]['telefono']; ?>"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="street_address" class="block text-base font-bold text-gray-700">dirección</label>
                                    <input type="text" name="dire" id="dire"  value="<?php echo $data["profiles"]['direccion']; ?>"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>                                
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <input type="hidden" name="Update" value="actualizar"> 
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

