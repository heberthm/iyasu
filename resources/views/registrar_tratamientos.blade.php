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

  .negative {
    color: rgba(255, 0, 0, 1.00);
  }

  .positive {
    color: rgba(0, 255, 0, 1.00);
  }
</style>


<br>




<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">


  <!-- ====================================

FORMULARIO CREAR TRATAMIENTO

=========================================  -->


  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de registro de tratamientos de clientes</h3>

      <div class="pull-right">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalACrearTratamiento">
          <span class="fa fa-list fa-fw"></span>
          Crear tratamiento de cliente
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
                <th>Tratamiento</th>
                <th>Valor</th>
                <th>Fecha</th>
                <th>Estado</th>
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

    MODAL AGREGAR TRATAMIENTO

======================================-->

    <div class="modal fade" id="modalACrearTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



      <div class="modal-dialog modal-lg">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar tratamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" id="form_agregar_tratamiento" enctype="multipart/form-data" action="{{ url('crear_tratamiento') }}">

              <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


              <div class="row">

                <div class="col-md-6">

                  <div class="form-group">

                    <label for="cliente" class="control-label">Cliente</label>


                    <div class="form-group">
                      <select class="livesearch form-control" id="livesearch" name="livesearch" style="width: 100%;"></select>
                    </div>


                    <input type="hidden" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">

                    <div class="alert-message" id="livesearchError"></div>



                  </div>
                </div>


                <div class="col-md-5">

                  <div class="form-group">

                    <label for="Celular" class="control-label">Tel/Cel</label>

                    <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                    <div class="alert-message" id="celularError"></div>

                  </div>
                </div>


                <div class="col-md-12">

                  <div class="form-group">


                  <table id="addTanquePesaje" style="width:100%">
                    <tr>
                      <td width = "60%">
                      <select name="tratamientos[]" class="form-control"  id="tratamientos"  required placeholder="Seleccione profesional">
                          <option value="" selected="selected" style='color: #cccccc'>Seleccionar tratamiento</option>
                                @foreach($terapias as $terap) 
                                <option value="{{$terap->valor_terapia}}">{{$terap->terapia}}</option>
                                @endforeach
                          </select>
                      </td>
                      <td><input type="number" class="form-control" name="valor[]" id="valor_tratamiento"   onchange="CalcularTanque()"></td>
                    <td><button type="button"  class="btn btn-danger btn-xs remove-tr">Eliminar</button>
 
                    </tr>
                  </table>
                 
                  <button type="button" name="adicionarPesaje" id="adicionarPesaje" class="btn btn-success btn-xs">Agregar</button>



           <!--

                    <table class="table table-bordered" id="dynamicAddRemove" style="width:100%"">  
                  <tr>
                  <th>Tratamiento</th>
                  <th>Valor</th>
                  </tr>
                  <tr>  
                  <td>

                  <select name="tratamientos" class="form-control"  id="moreFields[0][tratamientos]"  required placeholder="Seleccione profesional">
                 <option value="" selected="selected" style='color: #cccccc'>Seleccionar tratamiento</option>
                      @foreach($terapias as $terap) 
                      <option value="{{$terap->valor_terapia}}">{{$terap->terapia}}</option>
                      @endforeach
                </select>

                  </td> 
                  
                  <td><input type="text" name=valor" id="moreFields[0][valor_tratamiento]" class="form-control" /></td>   
                
                  <td><button type="button" name="add" id="add-btn" class="btn btn-success btn-xs">Agregar</button></td>  
                  </tr>  
                  </table> 

                  -->
                 
                  </form>
                  </div>
                  </div>
                  </div>


              </div>


              <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

              <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

              <input type="hidden" name="id_tratamiento" class="form-control" id="id_tratamiento" readonly>

              <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

              <input type="text" name="saldo" class="form-control" id="saldo">

              <input type="hidden" name="tratamiento" class="form-control" id="tratamiento">


              <div class="modal-footer">

                <button type="submit" id="agregar_tratamiento" name="agregar_tratamiento" class="btn btn-primary loader">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>

          </div>
        </div>
      </div>

      </form>
    </div>


</div>




<!--=====================================

    MODAL EDITAR DATOS DE TRATAMIENTO

======================================-->



<div class="modal fade" id="modalEditarTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Editar tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_editar_tratamiento" enctype="multipart/form-data" action="{{ url('crear_tratamiento') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="cliente" class="control-label">Cliente</label>

                <input type="text" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">

                <div class="alert-message" id="livesearchError"></div>



              </div>
            </div>


            <div class="col-md-5">

              <div class="form-group">

                <label for="Celular" class="control-label">Tel/Cel</label>

                <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                <div class="alert-message" id="celularError"></div>

              </div>
            </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="tratamiento" class="control-label">Tratamiento</label>


                <!--    <input type="text" name="tratamiento" class="form-control" id="tratamiento" required autocomplete="off"> -->


                <select name="tratamientos2" class="form-control" id="tratamientos2" required placeholder="Seleccione profesional">
                  <option value="" selected="selected" style='color: #cccccc'>Seleccionar tratamiento</option>
                  @foreach($terapias as $terap)
                  <option value="{{$terap->valor_terapia}}">{{$terap->terapia}}</option>
                  @endforeach
                </select>





                <div class="alert-message" id="terapiasError"></div>

              </div>

            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Valor</label>

                <input type="number" name="valor_tratamiento2" class="form-control" id="valor_tratamiento2" required autocomplete="off">

                <div class="alert-message" id="valorTratamientoError"></div>

              </div>
            </div>

            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

            <input type="hidden" name="id_tratamiento" class="form-control" id="id_tratamiento" readonly>

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

            <input type="hidden" name="saldo2" class="form-control" id="saldo2">

            <input type="hidden" name="tratamiento2" class="form-control" id="tratamiento2">


          </div>


          <div class="modal-footer">

            <button type="submit" id="editar_tratamiento" name="editar_tratamiento" class="btn btn-primary loader">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>

</div>



<!--=====================================

    MODAL VER DATOS DE TRATAMIENTO

======================================-->

<div class="modal fade" id="modalVerTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Ver datos del tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" id="form_ver_tratamiento" action="{{ url('registrar_tratamientos') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-5">

              <div class="form-group">

                <label for="cliente" class="control-label">Cliente</label>

                <input type="text" name="nombreCliente" class="form-control  border-0" id="nombreCliente">

              </div>
            </div>


            <div class="col-md-5">

              <div class="form-group">

                <label for="Celular" class="control-label">Tel/Cel</label>

                <input type="text" name="celular" class="form-control border-0" id="celular">

              </div>
            </div>


            <div class="col-md-8">

              <div class="form-group">

                <label for="Tratamiento" class="control-label">Tratamiento</label>

                <input type="text" name="tratamiento" class="form-control border-0" id="tratamiento">


              </div>
            </div>



            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. tratamiento</label>

                <input type="text" name="valor_tratamiento" class="form-control border-0" id="valor_tratamiento">


              </div>
            </div>





            <div class="col-md-5">
              <div class="form-group">

                <label for="responsable" class="control-label">responsable</label>

                <input type="text" name="responsable" class="form-control border-0" id="responsable">


              </div>
            </div>




            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

            <input type="hidden" name="id_abono" id="id_abono">



          </div>


          <div class="modal-footer">


            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>








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




  <script>
    $('.select2-multiple').select2({

      allowClear: true,
      placeholder: "Seleccione una opción",

    });
  </script>


  <script>

   $(document).ready(function() {
            $('.tratamientos').select2();

        });
    
  </script>




<script type="text/javascript">

$("#adicionarPesaje").on('click', function(){
     $("#addTanquePesaje tbody tr:eq(0)").clone(true, true).appendTo('#addTanquePesaje').find('input[type="number"]').val("");
                
});

function CalcularTanque() {
    $('#addTanquePesaje tr').each(function(){
        var cantidad = $(this).find('input[name^="txtCantidad"]').val();
        var tanque = $(this).find('select').val()
        var total = tanque * cantidad;
        $(this).find('input[name^="txtTotal"]').val(total);
    });
};

$(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  


</script>






  <!-- ========================================

ESCRIBIR EN DOS INPUTS AL MISMO TIEMPO

============================================== -->

  <script>
              
        $(document).ready(function(){


        $("#tratamientos").change(function(){


        let select = document.getElementById('tratamientos');
        let option = select.options[select.selectedIndex];

        document.getElementById('valor_tratamiento').value = option.value;
        document.getElementById('saldo').value = option.value;
        document.getElementById('tratamiento').value = option.text;


        });   

        });  


  </script>





  <!-- ========================================

ESCRIBIR EN DOS INPUTS AL MISMO TIEMPO 2

============================================== -->

  <script>
    $(document).ready(function() {


      $("#tratamientos2").change(function() {


        let select = document.getElementById('tratamientos2');
        let option = select.options[select.selectedIndex];

        document.getElementById('valor_tratamiento2').value = option.value;
        document.getElementById('saldo2').value = option.value;
        document.getElementById('tratamiento2').value = option.text;


      });

    });
  </script>




  <!-- ==============================

// VERIFICAR SI EXISTE CLIENTE

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
          $('#agregar_cliente').attr('disabled', 'disabled');
        } else {
          $.ajax({
            url: 'verificar_cliente',
            method: "POST",
            data: {
              cedula: cedula
            },
            success: function(result) {
              if (result == 'unique') {

                $('#error_cedula').html('<label class="text-danger">El cliente ya existe.</label>');
                $('#cedula').addClass('has-error');
                $('#agregar_cliente').attr('disabled', 'disabled');

              } else {

                $('#error_cedula').html('<label class="text-success">Disponible.</label>');
                $('#cedula').removeClass('has-error');
                $('#agregar_cliente').attr('disabled', false);


              }
            }
          })
        }
      });

    });
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
        // url: '/ajax-autocomplete-search',

        url: '{{ url("/ajax-autocomplete-search") }}',

        dataType: 'json',
        delay: 250,
        processResults: function(data) {


          return {
            results: $.map(data, function(item) {
              return {
                text: item.nombre,
                id: item.id_cliente,
                celular: item.celular,

              }

              // location.href = '/clientes/' + id
              // window.location.href =('clientes/id');      

              //  window.location.href =('/clientes'+ item['id']);  
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


        url: '/cliente/' + id,

        method: "GET",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data) {



        }

      });

      // window.location.href = 'cliente/' +id;


      $('#nombreCliente').val('');

      let cliente = '';

      cliente = $(".livesearch").text();

      $('#nombreCliente').val(cliente);


    });
  </script>


  <!-- ===============================================

 BORRAR CONTENIDO ESCRITO EN SELECT2: livesearch2
 
 =================================================== -->



  <script>
    $('.livesearch').on('select2:opening', function(e) {

      $('.livesearch').html('');
      $('.celular').val('');

    });
  </script>




  <!-- =======================================================

PASAR DATOS DE CAMPOS A INPUT TEXT CON SELECT2: livesearch2

============================================================ -->


  <script>
    $('#livesearch').on('select2:select', function(evt) {

      let celular = evt.params.data.celular;

      var opt = "<option value='" + celular + "' selected ='selected'> </option>";
      $("#celular").html(opt);
      $("#celular").val(celular).trigger("change");
    });
  </script>






  <!-- ===================================================

 DATATABLE TRATAMIENTO CLIENTES

 ======================================================== -->


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
        rendering: true,
        retrive: true,
        paging: true,
        info: true,
        filter: true,
        responsive: true,

        type: "GET",
        ajax: 'registrar_tratamientos',


        dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


        buttons: [

          {
            extend: 'excelHtml5',
            text: 'Excel',
            title: 'Listado tratamientos de clientes',

            exportOptions: {
              columns: [0, 1, 2, 3, 5]

            }
          },

          {
            extend: 'pdfHtml5',
            text: 'PDF',
            title: 'Listado tratamientos de clientes',

            exportOptions: {
              columns: [0, 1, 2, 3, 5],
              alignment: 'center',

            }
          },

        ],



        columns: [



          {
            data: 'nombre',
            name: 'nombre'
          },
          {
            data: 'tratamiento',
            name: 'tratamiento'
          },
          {
            data: 'valor_tratamiento',
            name: 'valor_tratamiento'
          },
          {
            data: 'created_at',
            name: 'created_at'
          },
          {
            data: 'estado',
            name: 'estado'
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

        "createdRow": function(row, data, index) {
          if (data.saldo == 0) {

            $('td', row).eq(4).addClass('text-primary').text('Pagado');

          } else {
            $('td', row).eq(4).addClass('text-second').text('Pendiente');
          }
        },


        order: [3, 'DESC'],

        "columnDefs": [{
            "orderable": false,
            "render": $.fn.dataTable.render.number('.'),
            "targets": [2],
            className: 'dt-body-left',
          },

          {
            "orderable": false,
            "render": $.fn.dataTable.render.number('.'),
            "targets": [5],
            className: 'dt-body-left',
          },

        ],


        "language": {


          "emptyTable": "No hay tratamiento registrados.",
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

      $('#form_agregar_tratamiento').off('submit').on('submit', function(event) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        /* Configurar botón submit con spinner */
        let btn = $('#agregar_tratamiento')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds
        $('#agregar_tratamiento').attr('disabled', true);
        event.preventDefault();
        try {
          $.ajax({
            url: "crear_tratamiento",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
              table.ajax.reload();
              $('#agregar_tratamiento').prop("required", true);
              // $('#selectBuscarCliente').html("");

              $('#form_agregar_tratamiento')[0].reset();
              $('#modalACrearTratamiento').modal('hide');

              //   table.ajax.reload();
              //   location.reload(true);
              toastr["success"]("Tratamiento registrado correctamente.");

            }
          });
        } catch (e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
        }
      });




      // =========================================

      /// VER REGISTROS DE TRATAMIENTO DE CLIENTES

      // =========================================

      $('body').on('click', '.verTratamiento', function(e) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        let id = $(this).data('id');
        $('#form_ver_tratamiento')[0].reset();

        $.ajax({
          url: 'ver_tratamiento/' + id,
          method: 'get',
          data: {
            id: id
          },

          success: function(data) {



            $('#modalVerTratamiento').modal('show');

            $('#modalVerTratamiento input[name="id_abono"]').val(data.id)
            $('#modalVerTratamiento input[name="id_cliente"]').val(data.id_cliente);
            $('#modalVerTratamiento input[name="nombreCliente"]').val(data.nombre);
            $('#modalVerTratamiento input[name="celular"]').val(data.celular);
            $('#modalVerTratamiento input[name="tratamiento"]').val(data.tratamiento);
            $('#modalVerTratamiento input[name="valor_tratamiento"]').val(data.valor_tratamiento);
            $('#modalVerTratamiento input[name="responsable"]').val(data.responsable);
            //  $('#modalVerTratamiento input[name="fecha"]').val(date('d-m-Y  h:i A', strtotime(data.created_at)));


          }

        });


      });




      // =========================================

      /// EDITAR REGISTROS DE TRATAMIENTO DE CLIENTES

      // =========================================

      $('body').on('click', '.editarTratamiento', function(e) {

        e.preventDefault();

        $('#form_editar_tratamiento')[0].reset();
        let id = $(this).data('id');

        $.ajax({
          url: '/editar_tratamientos/' + id,
          method: 'GET',
          data: {
            id: id
          },


          success: function(data) {


            $('#modalEditarTratamiento').modal('show');
            $('#modalEditarTratamiento input[name="id_tratamiento"]').val(data.id)
            $('#modalEditarTratamiento input[name="id_cliente"]').val(data.id_cliente);
            $('#modalEditarTratamiento input[name="nombreCliente"]').val(data.nombre);
            $('#modalEditarTratamiento input[name="celular"]').val(data.celular);
            $('#modalEditarTratamiento input[name="tratamiento2"]').val(data.tratamiento);
            $('#modalEditarTratamiento input[name="saldo2"]').val(data.valor_tratamiento);
            $('#modalEditarTratamiento input[name="valor_tratamiento2"]').val(data.valor_tratamiento);
            $('#modalEditarTratamiento input[name="responsable"]').val(data.responsable);

          }
        });
      });




      // =========================================

      // ACTUALIZAR DATOS DE ABONO

      // =========================================


      $('#form_editar_tratamiento').off('submit').on('submit', function(event) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        /* Configurar botón submit con spinner */
        let btn = $('#editar_tratamiento')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds
        $('#editar_tratamiento').attr('disabled', true);
        event.preventDefault();
        try {

          let id = $(this).data('id');

          $.ajax({

            url: 'actualizar_tratamiento/' + id,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

              $('#editar_tratamiento').prop("required", true);
              // $('#selectBuscarCliente').html("");

              $('#form_editar_tratamiento')[0].reset();
              $('#modalEditarTratamiento').modal('hide');

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



      $(document).on('click', '.eliminarTratamiento', function(event) {

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
              url: '/eliminar_tratamiento/' + id,
              data: {
                id: id
              },
              dataType: 'JSON',
              success: function(data) {

                //   if (data.success === true) {

                swal("Tratamiento eliminado correctamente!", data.message, "success");

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