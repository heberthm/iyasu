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

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">


  <!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de abonos de pacientes</h3>

      <div class="pull-right">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalACrearAbono"> <span class="fa fa-list fa-fw"></span>
          Crear abono
        </button> &nbsp;
      </div>


    </div>


    <div class="card-body">





      <!-- ===================================

DATAPICKER BOOTSTRAP

========================================  -->

      <!--

<div class="row input-daterange">
      <div class="col-md-3">
          <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Fecha inicial" readonly />
      </div>
      <div class="col-md-3">
          <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Fecha final" readonly />
      </div>
      <div class="col-md-3">
          <button type="button" name="filter" id="filter" class="btn btn-primary">Filtrar</button>
          <button type="button" name="refresh" id="refresh" class="btn btn-default">Refrescar</button>
      </div>
  </div>
  <br />

-->



      <!-- ==================================
DATATABLE LISTA DE ESPERA
====================================== -->


      <div class="row">
        <div class="col-lg-12">

          <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">
            <thead>
              <tr>

                <th>Paciente</th>
                <th>Fecha abono</th>
                <th>Saldo actual</th>
                <th>Vr. abono</th>
                <th>Saldo</th>
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

    MODAL AGREGAR ABONO

======================================-->

    <div class="modal fade" id="modalACrearAbono" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



      <div class="modal-dialog modal-lg">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar abono</h5>


            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form id="form_agregar_abono" method="POST" action="{{ url('abonos}') }}">

              <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


              <div class="row">

                <div class="col-md-4">

                  <div class="form-group">

                    <label for="cliente" class="control-label">Cliente</label>


                    <div class="form-group">
                      <select class="livesearch form-control" id="livesearch" name="livesearch" style="width: 100%;"></select>



                      <input type="hidden" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">



                    </div>

                    <div class="alert-message" id="nombreClienteError"></div>


                  </div>
                </div>



                <div class="col-md-4">

                  <div class="form-group">

                    <label for="Celular" class="control-label">Tel/Cel</label>

                    <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                    <div class="alert-message" id="responsableError"></div>

                  </div>
                </div>



                <div class="col-md-4">
                  <div class="form-group">

                    <label for="valor_abono" class="control-label">Vr. abono</label>

                    <input type="number" name="valor_abono" class="form-control" id="valor_abono" required autocomplete="off">

                    <div class="alert-message" id="valorAbonoError"></div>

                  </div>
                </div>



                <div class="col-md-4">
                  <div class="form-group">

                    <label for="saldo actual" class="control-label">Saldo actual</label>

                    <input type="number" name="valor_tratamiento" class="form-control" id="valor_tratamiento" readonly>


                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">

                    <label for="saldo" class="control-label">Nuevo saldo</label>

                    <input type="number" name="saldo" class="form-control" id="saldo" readonly>


                  </div>
                </div>




                <div class="col-md-10">
                  <div class="form-group">

                    <label for="tratamientos" class="control-label">Tratamientos</label>

                    <input type="text" name="tratamiento_1" class="form-control" id="tratamiento_1" readonly>


                  </div>
                </div>
         



                <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null}}">

                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null}}" readonly>

                <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

                <input type="hidden" name="id_tratamiento" id="id_tratamiento">

                <input type="hidden" name="valor_tratamiento2" id="valor_tratamiento2">

                <input type="hidden" name="estado" id="estado">




              </div>


              <div class="modal-footer">

                <button type="submit" id="agregar_abono" name="agregar_abono" class="btn btn-primary loader">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>

          </div>
        </div>
      </div>

      </form>
    </div>


</div>




<!--=====================================

    MODAL VER DATOS DE ABONO

======================================-->

<div class="modal fade" id="modalVerAbono" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Ver datos abono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_ver_abono" action="{{ url('abonos') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="nombreCliente" class="control-label">Nombre</label>

                <input type="text" name="nombreCliente" class="form-control  border-0" id="nombreCliente">

              </div>
            </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="celular" class="control-label">Celular</label>

                <input type="text" name="celular" class="form-control  border-0" id="celular">

              </div>
            </div>


            <div class="col-md-12">

              <div class="form-group">

                <label for="Descripcion" class="control-label">Descripción</label>

                <input type="text" name="descripcion" class="form-control  border-0" id="descripcion">

              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor tratamiento" class="control-label">Valor tratamiento</label>

                <input type="text" name="valor_tratamiento" class="form-control  border-0" id="valor_tratamiento">

              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="text" name="valor_abono" class="form-control  border-0" id="valor_abono">

              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Saldo</label>

                <input type="text" name="saldo" class="form-control  border-0" id="saldo">

              </div>
            </div>



            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control  border-0" id="responsable">

              </div>
            </div>







            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null }}" readonly>

            <input type="hidden" name="id_abono" id="id_abono">


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

    MODAL EDITAR ABONO

======================================-->

<div class="modal fade" id="modalEditarAbono" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">




  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Editar datos de abono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_editar_abono" action="{{ url('actualizar_abono/{id}') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">


            <div class="col-md-4">

              <div class="form-group">

                <label for="cliente" class="control-label">Cliente</label>

                <input type="text" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">

                <div class="alert-message" id="nombreClienteError"></div>

              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="Celular" class="control-label">Tel/Cel</label>

                <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                <div class="alert-message" id="responsableError"></div>

              </div>
            </div>



            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="number" name="valor_abono" class="form-control" id="valor_abono" required autocomplete="off">

                <div class="alert-message" id="valorAbonoError"></div>

              </div>
            </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="Descripcion" class="control-label">Descripción</label>

                <input type="text" name="descripcion" class="form-control " id="descripcion" required autocomplete="off">

                <div class="alert-message" id="descripcionError"></div>

              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control" id="responsable" readonly autocomplete="off">

                <div class="alert-message" id="responsableError"></div>

              </div>
            </div>



            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null }}" readonly>

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

            <input type="hidden" name="id_abono" id="id_abono" value="Pendiente">


          </div>

          <div class="modal-footer">

            <button type="submit" id="editar_abono" name="editar_abono" class="btn btn-primary loader">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>






<!--=====================================

    MODAL VER FACTURA ABONO 

======================================-->

<div class="modal fade" id="modalVerFactura" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Ver factura de abono</h5>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form id="form_ver_factura" method="GET" action="{{ url('factura/{id}') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->

          <div class="row">


            <div class="form-group ">

              <label for="Factura">Factura No.</label>

              <div class="col-sm-4">

                <input type="text" readonly class="form-control-plaintext" name="id_abono">

              </div>

            </div>



            <div class="form-group ">

              <label for="Feca">Fecha</label>

              <div class="col-sm-6">

                <input type="text" readonly class="form-control-plaintext" name="fecha">

              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="cliente" class="control-label">Cliente</label>

                <input type="text" name="nombreCliente" class="form-control-plaintext" required autocomplete="off">



              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="number" name="valor_abono" class="form-control-plaintext" required autocomplete="off">


              </div>

            </div>



            <div class="col-md-4">
              <div class="form-group">

                <label for="saldo actual" class="control-label">Saldo actual</label>

                <input type="number" name="valor_tratamiento" class="form-control-plaintext" readonly>


              </div>
            </div>


            <div class="col-md-4">

              <div class="form-group">

                <label for="saldo" class="control-label">Nuevo saldo</label>

                <input type="number" name="saldo" class="form-control-plaintext" readonly>


              </div>

            </div>




            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null}}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null}}" readonly>

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

            <input type="hidden" name="id_tratamiento" id="id_tratamiento">

            <input type="hidden" name="valor_tratamiento2" id="valor_tratamiento2">

            <input type="hidden" name="estado" id="estado">




          </div>




          <div class="modal-footer">

            <button type="submit" id="imprimir_factura" formtarget="_blank" class="btn btn-primary loader ">Imprimir</button>
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




<!-- ===============================================

MULTIPLICAR INPUTS PARA HALLAR SALDO DE TRATAMIENTO

===================================================== -->

<script>
  $(document).ready(function() {

    $("#valor_abono").on('blur', function() {

      let vr_abono = parseInt($("#valor_abono").val());

      let vr_tratamiento = parseInt($("#valor_tratamiento").val());

      if (vr_abono > vr_tratamiento) {

        alert('el valor abonado no puede ser mayor que el valor del tratamiento.')

        $("#valor_abono").val('');

        $("#valor_abono").focus();

        $("saldo").val('');

      } else {

        $("#saldo").val(parseInt($("#valor_tratamiento").val()) - parseInt($("#valor_abono").val()));

        $('#estado').val('');

      }


    });
  });
</script>



<script>
  /*

$(document).ready(function () {

      $('#valor_abono').on('change', function() {

             
        let input = document.getElementById('saldo');
      
        if(input.value.length === 0) {

        $('#estado').val('Pagado');
    
      } else if(input.value.length !== 0) {
     
        $('#estado').val('Pendiente');

    }
  
  })

})

*/
</script>




<!-- =======================================

SELECT2 - BUSQUEDAD DE CLIENTES

============================================ -->

<script type="text/javascript">
  $('.livesearch').select2({
    placeholder: 'Buscar cliente por nombre...',
    language: "es",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {


      url: 'buscar_tratamiento',

      dataType: 'json',
      delay: 250,
      processResults: function(data) {



        return {
          results: $.map(data, function(item) {
            return {
              text: item.nombre,
              id: item.id_cliente,
              id_tratamiento: item.id_tratamiento,

              celular: item.celular,
              valor_tratamiento: item.valor_tratamiento,
              saldo: item.saldo,
              estado: item.estado,

            }

          })



        };


      },

      cache: true,

    }



  });


  //================================================

  // SELECT2 - PASAR VALORES A VIEW BLADE - CLIENTE

  //================================================

  $('#livesearch').off('change').on('change', function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let id = $(this).val();

    $.ajax({

      url: 'buscar_tratamiento',

      method: "GET",
      data: $(this).serialize(),
      dataType: "json",

      success: function(data) {


      }

    });

    // window.location.href = 'cliente/' +id;

    $('#id_cliente').val('');
    $('#nombreCliente').val('');


    let cliente = '';
    let id_cliente = '';

    cliente = $(".livesearch").text();

    id_cliente = $(".livesearch").val();

    $('#id_cliente').val(id_cliente);

    $('#nombreCliente').val(cliente);



  });
</script>



<!-- ============================================

BORRAR CONTENIDO ESCRITO EN SELECT2: livesearch2

================================================= -->


<script>
  $('.livesearch').on('select2:opening', function(e) {

    $('.livesearch').html('');
    $('#celular').val('');
    $('#valor_tratamiento').val('');
    $('#valor_tratamiento2').val('');
    $('#descripcion').val('');
    $('#valor_abono').val('');
    $('#saldo').val('');
 


  });
</script>



<!-- =======================================================

PASAR DATOS DE CAMPOS A INPUT TEXT CON SELECT2: livesearch2

============================================================ -->


<script>
  $('#livesearch').on('select2:select', function(evt) {

    let celular = evt.params.data.celular;
    let tratamiento = evt.params.data.tratamiento;
    let valor_tratamiento2 = evt.params.data.valor_tratamiento;
    let valor_tratamiento = evt.params.data.saldo;
    let saldo_actual = evt.params.data.valor_tratamiento;
    let id_tratamiento = evt.params.data.id_tratamiento;
    let estado = evt.params.data.estado;

    var opt = "<option value='" + celular + "' selected ='selected'> </option>";
    $("#celular").html(opt);
    $("#celular").val(celular).trigger("change");

    var opt = "<option value='" + tratamiento + "' selected ='selected'> </option>";
    $("#descripcion").html(opt);
    $("#descripcion").val(tratamiento).trigger("change");

    var opt = "<option value='" + valor_tratamiento + "' selected ='selected'> </option>";
    $("#valor_tratamiento").html(opt);
    $("#valor_tratamiento").val(valor_tratamiento).trigger("change");

    var opt = "<option value='" + valor_tratamiento2 + "' selected ='selected'> </option>";
    $("#valor_tratamiento2").html(opt);
    $("#valor_tratamiento2").val(valor_tratamiento2).trigger("change");


    var opt = "<option value='" + id_tratamiento + "' selected ='selected'> </option>";
    $("#id_tratamiento").html(opt);
    $("#id_tratamiento").val(id_tratamiento).trigger("change");

    var opt = "<option value='" + estado + "' selected ='selected'> </option>";
    $("#estado").html(opt);
    $("#estado").val(estado).trigger("change");
  });
</script>





<!-- ===================================================

 DATATABLE TRATAMIENTO CLIENTES

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

      type: "GET",
      ajax: 'abonos',


      dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


      buttons: [

        {
          extend: 'excelHtml5',
          footer: true,
          text: 'Excel',
          title: 'Abonos de clientes',

          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]

          }
        },

        {
          extend: 'pdfHtml5',
          footer: true,
          text: 'PDF',
          title: 'Abonos de clientes',

          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]

          }
        },

      ],





      columns: [


        {
          data: 'nombre',
          name: 'nombre'
        },

        {
          data: 'created_at',
          name: 'created_at',
          orderable: true
        },
        {
          data: 'saldo_actual',
          name: 'saldo_actual'
        },
        {
          data: 'valor_abono',
          name: 'valor_Abono'
        },
        {
          data: 'saldo',
          name: 'saldo'
        },


        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },


      ],

      order: [2, 'desc'],

      "columnDefs": [{
        "orderable": false,
        "render": $.fn.dataTable.render.number('.'),
        "targets": [2, 3, 4],
        className: 'dt-body-left',
      }],


      "language": {


        "emptyTable": "No hay abonos registrados.",
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

    /// GUARDAR REGISTROS DE ABONOS DE CLIENTES

    // =========================================

    $('#form_agregar_abono').off('submit').on('submit', function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /* Configurar botón submit con spinner */
      let btn = $('#agregar_abono')
      let existingHTML = btn.html() //store exiting button HTML
      //Add loading message and spinner
      $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
      setTimeout(function() {
        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
      }, 5000) //5 seconds
      $('#agregar_abono').attr('disabled', true);

      event.preventDefault();

      try {

        $.ajax({
          url: "crear_abono",
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {
            table.ajax.reload();
            $('#agregar_tratamiento').prop("required", true);
            // $('#selectBuscarCliente').html("");

            $('#form_agregar_abono')[0].reset();
            $('#modalACrearAbono').modal('hide');

            //   table.ajax.reload();
            //   location.reload(true);
            toastr["success"]("Abono registrado correctamente.");

          }
        });
      } catch (e) {
        toastr["danger"]("Se ha presentado un error.", "Información");
      }
    });




    // =========================================

    /// VER REGISTROS DE ABONO DE CLIENTES

    // =========================================


    $('body').on('click', '.verAbono', function(e) {


      let id = $(this).data('id');
      $('#form_ver_abono')[0].reset();

      $.ajax({
        url: 'ver_abono/' + id,
        method: 'GET',
        data: {
          id: id
        },

        success: function(data) {



          $('#modalVerAbono').modal('show');
          $('#modalVerAbono input[name="id_abono"]').val(data.id)
          $('#modalVerAbono input[name="id_cliente"]').val(data.id_cliente);
          $('#modalVerAbono input[name="nombreCliente"]').val(data.nombre);
          $('#modalVerAbono input[name="celular"]').val(data.celular);
          $('#modalVerAbono input[name="valor_abono"]').val(data.valor_abono);
          $('#modalVerAbono input[name="valor_tratamiento"]').val(data.valor_tratamiento);
          $('#modalVerAbono input[name="saldo"]').val(data.saldo);
          $('#modalVerAbono input[name="descripcion"]').val(data.descripcion);
          $('#modalVerAbono input[name="responsable"]').val(data.responsable);


        }

      });


    });





    // =========================================

    /// MOSTRAR FACTURA DE ABONO DE CLIENTES

    // =========================================


    $('body').on('click', '.verFactura', function(e) {

      let Fecha = '';

      let id = $(this).data('id');
      $('#form_ver_factura')[0].reset();

      $.ajax({
        url: 'mostrar_abonos/' + id,
        method: 'GET',
        data: {
          id: id
        },

        success: function(data) {



          $('#modalVerFactura').modal('show');
          $('#modalVerFactura input[name="id_abono"]').val(data.id);
          $('#modalVerFactura input[name="fecha"]').val(data.created_at);
          $('#modalVerFactura input[name="id_cliente"]').val(data.id_cliente);
          $('#modalVerFactura input[name="nombreCliente"]').val(data.nombre);
          $('#modalVerFactura input[name="celular"]').val(data.celular);
          $('#modalVerFactura input[name="valor_abono"]').val(data.valor_abono);
          $('#modalVerFactura input[name="valor_tratamiento"]').val(data.valor_tratamiento);
          $('#modalVerFactura input[name="saldo"]').val(data.saldo);
          $('#modalVerFactura input[name="descripcion"]').val(data.descripcion);
          $('#modalVerFactura input[name="responsable"]').val(data.responsable);


        }


      });


    });






    // =========================================

    /// MOSTRAR TRATAMIENTOS DE CLIENTES

    // =========================================



    $('#form_agregar_abono').on('focus', '#valor_abono', function(e) {


      e.preventDefault();


      let id = $('#id_tratamiento').val();

      $.ajax({
        url: 'mostrar_tratamiento/' + id,
        method: 'GET',
        data: {
          id: id
        },


        success: function(data) {


          let json = JSON.parse(data.tratamientos);

          let itemsArray = [];

          for (let i = 0; i < json.length; i++) {

            let items = json[i].tratamiento;

            itemsArray.push(items);

            let tratamientos = itemsArray.join();

            $('#tratamiento_1').val(tratamientos);

          }
        
        }

      });


    });





    // =========================================

    /// IMPRIMIR FACTURA DE ABONO DE CLIENTE

    // =========================================


    $('#form_ver_factura').on('submit', '#imprimir_factura', function(e) {


      let id = $(this).data('id');

      $.ajax({
        url: 'factura/' + id,
        method: 'GET',
        data: {
          id: id
        },

        success: function(data) {

          /*

              $('#modalVerAbono').modal('show');
              $('#modalVerAbono input[name="id_abono"]').val(data.id)
              $('#modalVerAbono input[name="id_cliente"]').val(data.id_cliente);
              $('#modalVerAbono input[name="nombreCliente"]').val(data.nombre);
              $('#modalVerAbono input[name="celular"]').val(data.celular);
              $('#modalVerAbono input[name="valor_abono"]').val(data.valor_abono);
              $('#modalVerAbono input[name="valor_tratamiento"]').val(data.valor_tratamiento);
              $('#modalVerAbono input[name="saldo"]').val(data.saldo);
              $('#modalVerAbono input[name="descripcion"]').val(data.descripcion);
              $('#modalVerAbono input[name="responsable"]').val(data.responsable);

           */

        }

      });


    });








    // =========================================

    /// EDITAR REGISTROS DE TRATAMIENTO DE CLIENTES

    // =========================================

    $('body').on('click', '.editarAbono', function(e) {

      e.preventDefault();

      $('#form_editar_abono')[0].reset();
      let id = $(this).data('id');

      $.ajax({
        url: '/editar_abono/' + id,
        method: 'GET',
        data: {
          id: id
        },


        success: function(data) {



          $('#modalEditarAbono').modal('show');
          $('#modalEditarAbono input[name="id_abono"]').val(data.id)
          $('#modalEditarAbono input[name="id_cliente"]').val(data.id_cliente);
          $('#modalEditarAbono input[name="nombreCliente"]').val(data.nombre);
          $('#modalEditarAbono input[name="celular"]').val(data.celular);
          $('#modalEditarAbono input[name="valor_abono"]').val(data.valor_abono);
          $('#modalEditarAbono input[name="descripcion"]').val(data.descripcion);
          $('#modalEditarAbono input[name="responsable"]').val(data.responsable);

        }
      });
    });




    // =========================================

    // ACTUALIZAR DATOS DE ABONO

    // =========================================


    $('#form_editar_abono').off('submit').on('submit', function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /* Configurar botón submit con spinner */
      let btn = $('#editar_abono')
      let existingHTML = btn.html() //store exiting button HTML
      //Add loading message and spinner
      $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
      setTimeout(function() {
        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
      }, 5000) //5 seconds
      $('#editar_abono').attr('disabled', true);

      event.preventDefault();

      try {

        let id = $(this).data('id');

        $.ajax({

          url: 'actualizar_abono/' + id,
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {

            $('#editar_abono').prop("required", true);
            // $('#selectBuscarCliente').html("");

            $('#form_editar_abono')[0].reset();
            $('#modalEditarAbono').modal('hide');

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

    /// ELIMINAR REGISTROS DE ABONOS DE CLIENTES

    // =========================================   



    $(document).on('click', '.eliminarAbono', function(event) {

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
            url: '/eliminar_abono/' + id,
            data: {
              id: id
            },
            dataType: 'JSON',
            success: function(data) {

              //   if (data.success === true) {

              swal("Abono eliminado correctamente!", data.message, "success");

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