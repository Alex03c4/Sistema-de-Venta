<div class="container mx-auto mt-20">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Contraseña.</h3>
        <p class="mt-1 text-sm text-gray-600">
          Actualice la Contraseña
        </p>
      </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
      <form name="login-User-form" id="Updates-Pass" class="Updates" method="post" action="index.php?controllers=Perfil&a=updatePass">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">

                <div class="col-span-6 sm:col-span-4">
                  <label for="last_name" class="block text-base font-bold text-gray-700">Contraseña Antigua</label>
                    <input autocomplete="off" type="text" name="pass" id="pass"  class=" capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md">
                </div>
               
                <div class="border border-t-2 border-gray-300 mb-2"></div>
               
                <div class="col-span-6 sm:col-span-4">
                  <label for="last_name" class="block text-base font-bold text-gray-700">Contraseña Nueva</label>
                    <input autocomplete="off" type="text" name="passNew" id="passNew"  class="passNew2 capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md">
                </div>

                <div class="border border-t-2 border-gray-300 mb-2"></div>

                <div class="col-span-6 sm:col-span-4">
                  <label for="last_name" class="block text-base font-bold text-gray-700">Confirmar Contraseña</label>
                    <input autocomplete="off" type="text" name="passNew2" id="passNew2"  class="passNew2 capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md">
                </div>

                <div id="border" class="mt-1border border-t-2 border-red-400 mb-2"></div>
               
              </div>
            </div>

          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="hidden" name="Update-User" value="actualizar">
            <button type="submit" id="butomPass" disabled class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:ring-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
              Guardar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>