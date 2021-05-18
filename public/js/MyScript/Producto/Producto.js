$(document).ready(function () {
/* 
*   Se utiliza para ocultar o mostrás los elementos del 
*   Nuevo producto
*/
    $(document).ready(function () {
        $("#select-Producto").on("input", function(e) {
          // input , click
          var Producto = document.querySelector("#select-Producto").value;
          if (Producto == "0") {
            //remove
            $("#Producto-Nuevo").removeClass("hidden");
          } else {
            //add
            $("#Producto-Nuevo").addClass("hidden");

          }
        });
      });
    

/* Función para agregar la ediciones de las descripciones  */
      ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });


}); // fin $(document).ready(function ()