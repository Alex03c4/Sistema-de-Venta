<div class="container mx-auto mt-20">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Información del Usuario.</h3>
        <p class="mt-1 text-sm text-gray-600">
          Actualice la información de Usuario
        </p>
      </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
      <form name="login-User-form" id="Updates-user" class="Updates" method="post" action="index.php?controllers=Auth&a=update">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">

                <div class="col-span-6 sm:col-span-4">
                  <label for="last_name" class="block text-base font-bold text-gray-700">Email</label>
                  <input type="email" name="email" id="email" value="<?php echo $data["user"]['email']; ?>" class="capitalize mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>

          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="hidden" name="Update-User" value="actualizar">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Guardar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>