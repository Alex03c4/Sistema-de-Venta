$(".carrito").on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();   
     console.log(datos); 
    
     $.ajax({
        type: 'post',
        data: datos,
        url: 'index.php?controllers=Venta&a=Carrito',
        dataType: "json", 
        success: function (data) {
            var resultado = data;
            var carritoP = document.querySelector('#producto');   
            var nuevoDiv = document.createElement('div');        
    
            nuevoDiv.id = resultado.id;
            nuevoDiv.innerHTML = `
            <div class="flex flex-col">
            <div class="bg-white shadow-md  rounded-3xl p-4 m-1">
                <div class="grid grid-cols-2 gap-2 h-40">
                    <div class="">
                        <img class="rounded-3xl h-40 object-contain" src='public/img/Producto/${resultado.imgURL}' />
                    </div>
                    <div>  
                                 
                        <div class="w-full text-xs text-blue-700 font-medium ">
                            Nombre:
                        </div>
                        <h2 class="text-base font-medium">${resultado.nombre}</h2>
                        
                        <div class="w-full text-sm text-blue-700 font-medium ">
                            Marca: <samp class="text-black font-bold">${resultado.marca}</samp>
                        </div>
                        

                        <div class="w-full text-sm text-blue-700 font-medium ">
                            Stock: <samp class="text-black font-bold">${resultado.stock}</samp>
                        </div>

                        <div class="w-full text-sm text-blue-700 font-medium ">
                            Precio :  <samp class="text-black font-bold">$${resultado.precio}</samp>
                        </div>
                        
                        <div >                        
                            <div class="w-full text-sm text-blue-700 font-medium ">
                                Cantida : 
                                <input autocomplete="false"
                                min="1" max="${resultado.stock}" 
                                value="${resultado.can}"
                                name="${resultado.id}"                              
                                type="number"
                                class="cantidad mt-1 block w-full font-bold text-black px-3 border border-gray-300 bg-white 
                                rounded-md shadow-sm focus:outline-none 
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                
                            </div>

                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>           
        ` 
        carritoP.appendChild(nuevoDiv);
        }
        });
});

$("cantidad").on("blur", function (e) {
    e.preventDefault();

    var datos = $(this).serializeArray();   
    console.log(datos);
        $.ajax({
            type: 'post',
            data: datos,
            url: 'index.php?controllers=Venta&a=Producto',
            dataType: "json",
            success: function (data) {
                var resultado = data;
                console.log(resultado); 




            },error : function(xhr, status) {
                $("#remove").remove();
                $("#Nuevo-cliente").removeClass("hidden");
                $("#Nuevo-cliente").addClass("visible");
            },  
        });
});
 