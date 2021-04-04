<div class="container mx-auto mt-20">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Eliminar cuenta.</h3>
        <p class="mt-1 text-sm text-gray-600">
            Elimina permanentemente tu cuenta.
        </p>
      </div>
    </div>
    
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form name="login-User-form" id="Delete" method="post" action="index.php?controllers=Perfil&a=destroy">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <p>Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.</p>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="hidden" name="Eliminar-User" value="Eliminar">     
            <button type="submit" 
              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Eliminar cuenta
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>  