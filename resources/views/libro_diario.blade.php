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

REGISTRO DE LIBRO DIARIO

================================== -->


<div class="container-fluid">




  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-book mr-3"></span>Registro de libro diario</h3>

      <div class="pull-right">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAgregarRegistroLibroDiario">
          <span class="fa fa-book fa-fw"></span>
          Crear registro diario
        </button> &nbsp;
      </div>


    </div>


    <div class="card-body">



      <!-- ==================================

DATATABLE REGISTRO LIBRO DIARIO

====================================== -->


      <div class="row">
        <div class="col-lg-12">

          <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%">
            <thead>
              <tr>

                <th>Descripción</th>
                <th>Responsable</th>
                <th>Valor</th>
                <th>Fecha</th>

                <th></th>

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




    <!--=====================================

    MODAL AGREGAR REGISTRO LIBRO DIARIO

======================================-->

    <div class="modal fade" id="modalAgregarRegistroLibroDiario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



      <div class="modal-dialog modal-lg">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-book mr-3"></span>Agregar registro diario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" id="form_agregar_registro" action="{{ url('libro_diario') }}">

              <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


              <div class="row">

                <div class="col-md-6">

                  <div class="form-group">

                    <label for="descripcion" class="control-label">Descripción</label>


                    <div class="form-group">

                      <input type="text" name="descripcion" class="form-control " id="descripcion" required autocomplete="off">

                      <span id="error_descripcion"></span>


                    </div>


                    <div class="alert-message" id="descripcionError"></div>



                  </div>
                </div>


                <div class="col-md-6">

                  <div class="form-group">

                    <label for="Responsable" class="control-label">Responsable</label>

                    <input type="text" name="responsable" class="form-control text-capitalize" id="responsable" required autocomplete="off">

                    <div class="alert-message" id="responsableError"></div>

                  </div>
                </div>




                <div class="col-md-3">
                  <div class="form-group">

                    <label for="valor" class="control-label">Valor</label>

                    <input type="number" name="valor" class="form-control" id="valor" required autocomplete="off">

                    <div class="alert-message" id="valorError"></div>

                  </div>
                </div>





                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>
                <input type="hidden" name="id_diario" id="id_diario" class="form-control">



              </div>


              <div class="modal-footer">

                <button type="submit" id="agregar_registro" name="agregar_registro" class="btn btn-primary loader">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>

          </div>
        </div>
      </div>

      </form>
    </div>


</div>



<!--=====================================

    MODAL VER DATOS DE REGISTRO

======================================-->

<div class="modal fade" id="modalVerRegistro" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user-md mr-3"></span>Ver datos de registro diario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_ver_registro" action="{{ url('libro_diario') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-8">

              <div class="form-group">

                <label for="descripcion" class="control-label">Descripcion</label>


                <div class="form-group">

                  <input type="text" name="descripcion" class="form-control  border-0" id="descripcion" autocomplete="off">

                </div>


                <div class="alert-message" id="descripcionError"></div>



              </div>
            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="valor" class="control-label">Valor</label>

                <input type="text" name="valor" class="form-control  border-0" id="valor" required autocomplete="off">

                <div class="alert-message" id="celularError"></div>

              </div>
            </div>


            <div class="col-md-8">

              <div class="form-group">

                <label for="responsable" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control  border-0" id="responsable" required autocomplete="off">

                <div class="alert-message" id="responsaleError"></div>

              </div>
            </div>


            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>
            <input type="hidden" name="id_diario" id="id_diario" class="form-control">


          </div>



          <div class="modal-footer">

            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>





<!--=====================================

    MODAL EDITAR DATOS DE PROFESIONAL

======================================-->

<div class="modal fade" id="modalEditarRegistro" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user-md mr-3"></span>Editar registro diario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_editar_registro" action="{{ url('libro_diario') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="descripcion" class="control-label">Descripcion</label>


                <div class="form-group">

                  <input type="text" name="descripcion" class="form-control " id="descripcion" required autocomplete="off">

                </div>


                <div class="alert-message" id="descripcionError"></div>

              </div>
            </div>



            
            <div class="col-md-3">
              <div class="form-group">

                <label for="valor" class="control-label">Valor</label>

                <input type="number" name="valor" class="form-control" id="valor" required autocomplete="off">

                <div class="alert-message" id="valorError"></div>

              </div>
            </div>





            <div class="col-md-6">

              <div class="form-group">

                <label for="responsable" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control text-capitalize" id="responsable" required autocomplete="off">

                <div class="alert-message" id="nombreError"></div>

              </div>
            </div>






            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

            <input type="hidden" name="id_diario" id="id_diario" class="form-control">



          </div>


          <div class="modal-footer">

            <button type="submit" id="editar_registro" name="editar_registro" class="btn btn-primary loader">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>





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




<!-- ==============================

// VERIFICAR SI EXISTE PROFESIONAL

===================================  -->

<script>
  $(document).ready(function() {

    $('#cedula').blur(function() {
      var error_cedula = '';
      var cedula = $('#cedula').val();
      var _token = $('input[name="_token"]').val();
      var filter = /([0-9])/;
      if (!filter.test(cedula)) {
        $('#error_cedula').html('<label class="text-danger">Debe escribir número de cédula.</label>');
        $('#cedula').addClass('has-error');
        $('#agregar_profesional').attr('disabled', 'disabled');
      } else {
        $.ajax({
          url: 'verificar_profesional',
          method: "POST",
          data: {
            cedula: cedula
          },
          success: function(result) {
            if (result == 'unique') {

              $('#error_cedula').html('<label class="text-danger">El profesional ya existe.</label>');
              $('#cedula').addClass('has-error');
              $('#agregar_profesional').attr('disabled', 'disabled');

            } else {

              $('#error_cedula').html('<label class="text-success">Disponible.</label>');
              $('#cedula').removeClass('has-error');
              $('#agregar_profesional').attr('disabled', false);


            }
          }
        })
      }
    });

  });
</script>




<!-- ===================================================

 DATATABLE PROFESIONALES

======================================================= --->

<script type="text/javascript">
  $(document).ready(function() {


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    let table = $('#table_registros_contables').DataTable({


      processing: true,
      serverSide: true,
      paging: true,
      info: true,
      filter: true,
      responsive: true,


      type: "GET",
      ajax: 'libro_diario',




      dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


      buttons: [

        {
          extend: 'excelHtml5',
          footer: true,
          text: 'Excel',
          title: 'Listado libro diario',

          exportOptions: {
            columns: [0, 1, 2, 3]

          }
        },

        {
          extend: 'pdfHtml5',
          footer: true,
          text: 'PDF',
          title: 'Listado libro diario',

          exportOptions: {
            columns: [0, 1, 2, 3]


          }
        },

      ],







      columns: [

        {
          data: 'descripcion',
          name: 'descripcion'
        },
        {
          data: 'responsable',
          name: 'responsable'
        },
        {
          data: 'valor',
          name: 'valor'
        },
        {
          data: 'created_at',
          name: 'created_at'
        },



        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
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