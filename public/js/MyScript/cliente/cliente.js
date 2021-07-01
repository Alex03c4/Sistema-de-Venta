/**
 * función para mostrá los datos del cliente ya registrado 
 * en la venta.
 */
//clientes
$("#Cedula-cliente").on("blur", function (e) {
  e.preventDefault();
  var datos = $(this).serializeArray();   
   console.log(datos);
  $.ajax({
    type: 'post',
    data: datos,
    url: 'index.php?controllers=Cliente&a=getById',
    dataType: "json", 
    success: function (data) {
      var resultado = data;
      console.log(resultado);     
      if (resultado.respuesta == "exito") {
        $("#Nuevo-cliente").removeClass("visible");
        $("#Nuevo-cliente").addClass("hidden");        
          $("#remove").remove();
          
          var datoCliente = document.querySelector('#ajax');
          var nuevoDiv = document.createElement('div');
          var Credito = resultado.credito.Creditos;
          if (resultado.credito.Creditos == null) {
              var Credito = 0
          }

          nuevoDiv.id = 'remove';
          nuevoDiv.innerHTML = `           
           <div class="m-2">
                <label for="last_name" class="block text-base font-bold text-gray-700">Nombre y Apellido:</label>
                <div class="flex justify-between">
                    <i class="far fa-id-card mt-3 mr-1"></i>
                    <input readonly="readonly" value="${resultado.data.nombre + " " + resultado.data.apellido} " type="text"  autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="m-2">
                <label for="last_name" class="block text-base font-bold text-gray-700">Teléfono:</label>
                <div class="flex justify-between">
                    <i class="far fa-id-card mt-3 mr-1"></i>
                    <input readonly="readonly" value="${resultado.data.telefono} " type="text"  autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="m-2">
                <label for="last_name" class="block text-base font-bold text-gray-700">Dirección:</label>
                <div class="flex justify-between">
                    <i class="far fa-id-card mt-3 mr-1"></i>
                    <input readonly="readonly" value="${resultado.data.direccion} " type="text"  autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="m-2">
                <label for="last_name" class="block text-base font-bold text-gray-700">Email:</label>
                <div class="flex justify-between">
                    <i class="far fa-id-card mt-3 mr-1"></i>
                    <input readonly="readonly" value="${resultado.data.email} " type="text"  autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="m-2">
                <label for="last_name" class="block text-base font-bold text-gray-700">Crédito:</label>
                <div class="flex justify-between">
                    <i class="far fa-id-card mt-3 mr-1"></i>
                    <input readonly="readonly" value="${"$ "+Credito}" type="text" name="credito" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <input type="hidden" name="Cliente" value="${resultado.data.id}">
          `         
        datoCliente.appendChild(nuevoDiv); 
      } else {          
        $("#Nuevo-cliente").removeClass("hidden");
        $("#Nuevo-cliente").addClass("visible"); 
        var p= $("#remove").remove();
           
           
      }
    },error : function(xhr, status) {
      $("#remove").remove();
      $("#Nuevo-cliente").removeClass("hidden");
      $("#Nuevo-cliente").addClass("visible");
  },
    
  });
  });