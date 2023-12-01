@extends('layouts.app')


@section('content')

<style>
  .calendar {

    max-width: auto;
    margin: 0, 0;
    padding: 0, 0;
    cursor: pointer;

  }

  .calendar {
    cursor: pointer;
  }

  .has-error {
    border-color: #cc0000;
    background-color: #ffff99;
  }


  .alert-message {
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1000;
  }


  .mostrar_inputs {
    display: none;
  }

  #loading2 {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1100;
  }

  .listado_citas {
    height: 300px;
    overflow-y: scroll;
    overflow-x: hidden;
  }


  .popover {
    pointer-events: none;
  }
</style>


<br>




<!-- =============================

REGISTRO DE DEUDORES

================================== -->


<div class="container-fluid">




  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-tags mr-3"></span>Listado de deudores</h3>
    
    </div>



    <div class="card-body">



<!-- ==================================

DATATABLE LISTADO DE DEUDORES

====================================== -->


      <div class="row">
        <div class="col-lg-12">

          <table id="table_listado_deudores" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">
            <thead>
              <tr>

                <th>Nombre</th>
                <th>Teléfono</th>
                <th>saldo</th>
                <th>tiempo trascurrido último abono</th>
              
                
               
              </tr>
            </thead>

         
          </table>


        </div>
      </div>

    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->

  <!-- /.card -->
  </section>
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">






<!-- ========================================

MOSTRAR SPINNER AL CARGAR PAGINA

========================================== -->


<script type="text/javascript">
  $(window).on('load', function() {
    setTimeout(function() {
      $(".loader-page").css({
        visibility: "hidden",
        opacity: "0"
      })
    }, 1000);

  });
</script>





<!-- =======================================

DESHABILITAR CLICK DERECHO

============================================ -->

<script>
  $(document).ready(function() {
    $("body").on("contextmenu", function(e) {
      return false;
    });
  });
</script>





<!-- ===================================================

 DATATABLE LISTADO DEUDORES

======================================================= --->

<script type="text/javascript">
  $(document).ready(function() {


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    let table = $('#table_listado_deudores').DataTable({


      processing: true,
      serverSide: true,
      paging: true,
      info: true,
      filter: true,
      responsive: true,


      type: "GET",
      ajax: 'deudores',




      dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


      buttons: [

        {
          extend: 'excelHtml5',
          footer: true,
          text: 'Excel',
          title: 'Listado de deudores',

          exportOptions: {
            columns: [0, 1, 2, 3]

          }
        },

        {
          extend: 'pdfHtml5',
          footer: true,
          text: 'PDF',
          title: 'Listado de deudores',

          exportOptions: {
            columns: [0, 1, 2, 3]


          }
        },

      ],







      columns: [

        {
          data: 'nombre',
          name: 'nombre'
        },
        {
          data: 'celular',
          name: 'celular'
        },
        {
          data: 'saldo',
          name: 'saldo'
        },
        {
          data: 'updated_at',
          name: 'updated_at'
        },

       

       
      ],

      order: [
        [1, 'asc']
      ],


      "columnDefs": [{
        "orderable": false,
        "render": $.fn.dataTable.render.number('.'),
        "targets": [2],
        className: 'dt-body-left',
      }],



      "language": {


        "emptyTable": "No hay registros para mostrar.",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }

      },



    });





    // =========================================

    /// GUARDAR REGISTROS DE LIBRO DIARIO

    // =========================================

    $('#form_agregar_registro').off('submit').on('submit', function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /* Configurar botón submit con spinner */
      let btn = $('#agregar_registro')
      let existingHTML = btn.html() //store exiting button HTML
      //Add loading message and spinner
      $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
      setTimeout(function() {
        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
      }, 5000) //5 seconds
      $('#agregar_registro').attr('disabled', true);

      event.preventDefault();

      try {

        $.ajax({
          url: "crear_registro_diario",
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {
            table.ajax.reload();
            $('#agregar_registro').prop("required", true);
            // $('#selectBuscarCliente').html("");

            $('#form_agregar_registro')[0].reset();
            $('#modalAgregarRegistroLibroDiario').modal('hide');

            //   table.ajax.reload();
            //   location.reload(true);
            toastr["success"]("registro creado correctamente.");

          }
        });
      } catch (e) {
        toastr["danger"]("Se ha presentado un error.", "Información");
      }
    });




    // =========================================

    /// VER REGISTROS DEL PROFESIONAL

    // =========================================


    $('body').on('click', '.verLibroDiario', function(e) {


      let id = $(this).data('id');

      $('#form_ver_registro')[0].reset();

      $.ajax({
        url: 'ver_libro_diario/' + id,
        method: 'GET',
        data: {
          id: id
        },

        success: function(data) {


          $('#modalVerRegistro').modal('show');
          $('#modalVerRegistro input[name="id_diario"]').val(data.id)
          $('#modalVerRegistro input[name="descripcion"]').val(data.descripcion);
          $('#modalVerRegistro input[name="responsable"]').val(data.responsable);
          $('#modalVerRegistro input[name="valor"]').val(data.valor);



        }

      });


    });




    // =========================================

    /// EDITAR REGISTROS DEL PROFESIONAL

    // =========================================

    $('body').on('click', '.editarLibroDiario', function(e) {

      e.preventDefault();

      $('#form_editar_registro')[0].reset();
      let id = $(this).data('id');

      $.ajax({
        url: 'editar_libro_diario/' + id,
        method: 'GET',
        data: {
          id: id
        },


        success: function(data) {




          $('#modalEditarRegistro').modal('show');

          $('#modalEditarRegistro input[name="id_diario"]').val(data.id)
          $('#modalEditarRegistro input[name="descripcion"]').val(data.descripcion);
          $('#modalEditarRegistro input[name="responsable"]').val(data.responsable);
          $('#modalEditarRegistro input[name="valor"]').val(data.valor);
         
          

        }
      });
    });




    // =========================================

    // ACTUALIZAR DATOS DEL PROFESIONAL

    // =========================================


    $('#form_editar_registro').off('submit').on('submit', function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /* Configurar botón submit con spinner */
      let btn = $('#editar_registro')
      let existingHTML = btn.html() //store exiting button HTML
      //Add loading message and spinner
      $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
      setTimeout(function() {
        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
      }, 5000) //5 seconds
      $('#editar_registro').attr('disabled', true);

      event.preventDefault();

      try {

        let id = $(this).data('id');

        $.ajax({

          url: 'actualizar_libro_diario/' + id,
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {

            $('#editar_registro').prop("required", true);
            // $('#selectBuscarCliente').html("");

            $('#form_editar_registro')[0].reset();
            $('#modalEditarRegistro').modal('hide');

            table.ajax.reload();
            //   location.reload(true);
            toastr["success"]("datos actualizados correctamente.");

          }
        });
      } catch (e) {
        toastr["danger"]("Se ha presentado un error.", "Información");
      }
    });





    // =========================================

    /// ELIMINAR REGISTROS DEL PROFESIONAL

    // =========================================   



    $(document).on('click', '.eliminarLibroDiario', function(event) {

      event.preventDefault();
      let id = $(this).data('id');
      swal({
        title: "Esta seguro de eliminar?",
        text: "La acción es permanente!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Si, Eliminar",
        cancelButtonText: "No, cancelar",
        reverseButtons: !0

      }).then(function(e) {

        if (e.value === true) {
          let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: 'delete',
            url: 'eliminar_libro_diario/' + id,
            data: {
              id: id
            },
            dataType: 'JSON',
            success: function(data) {

              //   if (data.success === true) {

              swal("Datos del profesional eliminados correctamente!", data.message, "success");

              table.ajax.reload();
              //  $('#table_mascotas').html(data);


              //  } else {
              //       swal("Error!", data.message, "error");
              //   }
            }
          });

        } else {
          e.dismiss;
        }

      }, function(dismiss) {
        return false;
      })
    });



  });
</script>





@endsection