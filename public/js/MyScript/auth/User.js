$(document).ready(function () {
    // ***************************** #login-admin **********************************************
    $("#login-User").on("submit", function (e) {
        e.preventDefault();
    
        var datos = $(this).serializeArray(); // obtener datos  del submit(this)
        // console.log(datos);            
        $.ajax({
          type: $(this).attr("method"), // obtener  método de envió(post O get)
          data: datos, // datos que se van a enviar
          url: $(this).attr("action"), // donde se van a enviar
          dataType: "json", //tipo de datos
          success: function (data) {
              	console.log(data);
            var resultado = data;
            if (resultado.respuesta == "exito") {
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido...',
                    showConfirmButton: false,
                    text: resultado.User,                    
                  })              
                setTimeout(function(){
                  window.location.href = 'index.php?controllers=Perfil&a=ViewDashboard'
                },2000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Usuario o Password Incorrecto',                    
                  })
            }
          },
        });
    }); 


    /* Registro */

    $("#Registro-User").on("submit", function (e) {
      e.preventDefault();
  
      var datos = $(this).serializeArray(); // obtener datos  del submit(this)
      // console.log(datos);            
      $.ajax({
        type: $(this).attr("method"), // obtener  método de envió(post O get)
        data: datos, // datos que se van a enviar
        url: $(this).attr("action"), // donde se van a enviar
        dataType: "json", //tipo de datos
        success: function (data) {
              console.log(data);
          var resultado = data;
          if (resultado.respuesta == "exito") {
              Swal.fire({
                  icon: 'success',
                  showConfirmButton: false,
                  title: 'Registro Exitoso',
                  text: resultado.User,                    
                })              
              setTimeout(function(){
                window.location.href = 'index.php?controllers=Perfil&a=edit'
              },2000);
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'A Ocurrido Un Error',                    
                })
          }
        },
      });
  }); 
    
    
});
