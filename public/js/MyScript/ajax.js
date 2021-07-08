$(document).ready(function () {
    $(".Updates").on("submit", function (e) {        
        e.preventDefault();
        var datos = new FormData(this);
        console.log(datos);
        $.ajax({
          type: $(this).attr("method"),
          data: datos,
          url: $(this).attr("action"),
          dataType: "json",
          contentType: false,
          processData: false,
          async: true,
          cache: false,
          success: function (data) {
            var resultado = data;
            console.log(resultado);
      
            if (resultado.respuesta == "exito") {
              
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Operación Exitosa',
                    showConfirmButton: false,
                    timer: 1500,
                    backdrop: `
                    rgba(0,0,123,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                    `
                  })
                  document.getElementById("insert").reset();//limpiar el formulario
                  $('.box').css('background-image', 'url( public/img/Producto/defaul/Producto.png )');  
                  
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Disculpe, existió un problema',
                    showConfirmButton: false,
                    timer: 1500,
                    backdrop: `
                    rgba(231, 76, 60,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                    `
                  })
            }
          },
        });
    });

    $("#insert").on("submit", function (e) { 

    });


    $('.Delete').on("submit", function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = $(this).attr("action");
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            window.location.href = $(this).attr("location");
          }
          
        })
      });

      $('.Ventas').on("submit", function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Seguro que quieres',
          text: "Genera Ventas?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!'
        }).then((result) => {
          if (result.isConfirmed) {
            e.preventDefault();
            var datos = $(this).serializeArray();   
           /*  console.log(datos); */
            $.ajax({
              type: 'post',
              data: datos,
              url: 'index.php?controllers=Venta&a=GenerarVentas',
              dataType: "json",
              success: function (data) {
                var resultado = data;
                console.log(resultado);
                if (resultado.respuesta=="exito") {

                   Swal.fire(
                  'Venta',
                  'Generada con Éxito.',
                  'success'
                  ) 

                 setTimeout(redire,4000); 
                } else {
                  Swal.fire(
                    'Venta',
                    'Disculpe, existió un problema. ' . resultado.Exception,
                    'error'
                    )
                }
                console.log(resultado); 
                
                
              },error : function(xhr, status) {
                Swal.fire(
                  'Venta',
                  'Disculpe, existió un problema.',
                  'error'
                  )
                  
                  
            },
              
            });

            /* window.location.href = $(this).attr("action");
            
            window.location.href = $(this).attr("location"); */
          }
          
        })
      });
    
      function redire(){
        window.location.href = 'index.php?controllers=Venta&a=ViewVentas'
      }
    

}); // fin $(document).ready(function ()