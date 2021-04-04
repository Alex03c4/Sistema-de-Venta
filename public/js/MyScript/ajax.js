$(document).ready(function () {
    $("#Updates").on("submit", function (e) {
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
                    title: 'Actualización Exitosa',
                    showConfirmButton: false,
                    timer: 1500,
                    backdrop: `
                    rgba(0,0,123,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                    `
                  })
                  /* Usado para redirigir a una pagina  */
                  /* .then((resultado) => {
                    if (resultado.value) {
                  var pagina = $("#Guardar-Actualizar").attr("pagina");
                  window.location.href = pagina;
                }
                }); */
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Actualización Exitosa',
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



      $("#Delete").on("submit", function (e) {
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
            window.location.href = "index.php?controllers=Perfil&a=destroy";
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            window.location.href = "index.php";
          }
          
        })
      });

}); // fin $(document).ready(function ()