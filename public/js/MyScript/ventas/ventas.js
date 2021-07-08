var Total = 0;

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
            console.log(resultado);
            var carritoP = document.querySelector('#producto');   
            var nuevoDiv = document.createElement('div');        
            
            nuevoDiv.id = resultado.id;
            Total = resultado.Total;
            bsf = resultado.bsf
            nuevoDiv.innerHTML = `
            <div  x-data="{ Open : false  }" class="flex flex-col">

                <div class="bg-white shadow-md  rounded-3xl p-4 m-1">
                    <div class="grid grid-cols-2 gap-2 h-48">

                        <div x-on:click="Open = !Open" class=" ">
                            <img class="cursor-pointer rounded-3xl h-40 object-contain" src='public/img/Producto/${resultado.imgURL}' />
                        </div>
                        <div>  
                                    
                            <div class="w-full text-xs text-blue-700 font-medium ">
                                Nombre:
                            </div>
                            <h2 class="text-base font-medium">${resultado.nombre}</h2>
                            
                            <div class="w-full text-sm text-blue-700 font-medium ">
                                Marca: <samp class="text-black font-bold">${resultado.marca}</samp>
                            </div>                           

                           
                            <div class="" >                        
                                <div class="w-full text-sm font-bold ">
                                    ${resultado.Tipo_unidad} : 
                                    <input autocomplete="false"
                                    onchange="sumar(this.value, ${resultado.Posicion}, ${resultado.stock} ,${resultado.precio});"
                                    min="0" max="${resultado.stock}" 
                                    value="${resultado.can}"
                                    name="${resultado.id}"                              
                                    type="number"
                                    class="cantidad mt-1 block w-full font-bold text-black px-3 border border-gray-300 bg-white 
                                    rounded-md shadow-sm focus:outline-none 
                                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                    
                            </div>   

                            <div class="w-full text-sm text-blue-700 font-medium ">
                                SubTotal :  <samp id="spTotal${resultado.Posicion}" class="text-black font-bold">$${resultado.precio}</samp>
                            </div>          
                        </div>
                    </div>               
                    <div x-show.transition="Open" class="bg-white ">
                        <div 
                        x-transition:enter="transition-all ease-in-out duration-300" 
                        x-transition:enter-start="opacity-25 max-h-0" 
                        x-transition:enter-end="opacity-100 max-h-xl" 
                        x-transition:leave="transition-all ease-in-out duration-300" 
                        x-transition:leave-start="opacity-100 max-h-xl" 
                        x-transition:leave-end="opacity-0 max-h-0" >
                            <div class="overflow-auto grid grid-cols-2 gap-2 h-48 w-full  ">
                                ${resultado.descrip}
                            </div>
                        </div>
                    </div>
                </div>
                
                



            </div>

               
        ` 
            carritoP.appendChild(nuevoDiv);
            document.getElementById('Totalust').innerHTML = Total;
            document.getElementById('bsf').innerHTML = bsf;
        }
        });



});


function sumar (cantidada, Posicion, stock , precio) {
    /* 
        para obtener en valor de radio 
        alert($('input:radio[name=radio]:checked').val());
    
    */
    $.ajax({       
        url : 'index.php?controllers=Venta&a=addCarito',          
        data : { Posicion : Posicion , Precio : precio, Cantidad :  cantidada },          
        type : 'POST',        
        dataType : 'json',         
        success : function(data) {
            var resultado = data;
            console.log(resultado); 
              document.getElementById('Totalust').innerHTML = resultado.dolar;
              document.getElementById('bsf').innerHTML = resultado.bsf;            
        },           
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },    
        
    });

  Sub = cantidada*precio;
  SubTotal=  "spTotal"+Posicion; 

  document.getElementById(SubTotal).innerHTML = "$"+ Sub.toFixed(2); 
 /*  alert(valor + " " + id + " " + stock); */
}


function descrip(data) {
   
    Swal.fire({
        icon: 'error',
        title: data,
        text: 'Something went wrong!',
        footer: '<a href="">Why do I have this issue?</a>'
      })
   
}

/* 

     <div class="w-full text-sm text-blue-700 font-medium ">
                                Stock: <samp class="text-black font-bold">${resultado.stock}</samp>
                            </div>

                            <div class="w-full text-sm text-blue-700 font-medium ">
                                Precio :  <samp class="text-black font-bold">$${resultado.precio}</samp>
                            </div>            
    
} */

 