$(document).ready(function() {
   /*  $('#Table').DataTable(); */
    $("#Table").DataTable({
    paging: true,
    pageLength: 5,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    language: {
      paginate: {
        next: "Siguiente",
        previous: "Anterior",
        last: "Ultimo",
        first: "Primero",
      },
      info: "Mostrando _START_ a _END_ de _TOTAL_ resultados",
      emptyTable: "No hay registros",
      infoEmpty: "0 Registros",
      search: " Buscar",
    },
  });

});

