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
            <div class='fila'>
                <div class='inline-block w-24'><img src='public/img/Producto/${resultado.img}' width='100' /></div>
                    <div class='inline-block p-3 w-64'>
                        <input type='hidden' name='id-${resultado.id }' value='${resultado.id }' />
                    <div class='nombre'>${resultado.nombre+ resultado.img}</div>
                    <div>${resultado.stock} items de $${resultado.precio}</div>
                    <div>Subtotal: $${resultado.precio}</div>
                    <div class='botones'><button class='btn-remove'>Quitar 1 del carrito</button></div>
                    <input type="number" name="cantida-producto-${resultado.id }">
                </div>
            </div>




            ` 
            carritoP.appendChild(nuevoDiv);
        }
    });
});
