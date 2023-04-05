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



    a.editable-click {
        color: green;
        border-color: green;
        text-decoration: none;
    }

    a.editable-click.editable-disabled {
        color: black;
        border-bottom: none;
        text-decoration: none;
    }

    a.editable-empty {
        color: gray;
        font-style: italic;
    }
</style>


<br>




<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-light">
                <div class="card-header">

                    <h3 class="card-title"><span style="color: #28a745;" class="fas fa-database mr-3"></span>Registros contables</h3>

                </div>



                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-6">


                            <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#modalAgregarIngreso" style="text-align:left"><span class="fas fa-plus mr-2" tabindex="3"></span> Ingresos</button>
                            <button class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#modalAgregarEgreso" style="text-align:left"><span class="fas fa-minus mr-2" tabindex="3"></span> Egresos</button>


                        </div>



                        <span>
                            <h5 style="text-align:right"> </h5>
                        </span> &nbsp;

                        <p> <span>
                                <h5 style="text-align:right"> </h5>
                            </span> </p>




                    </div>

                </div>
            </div>

    </div>
    <!-- /.card-body -->



    <!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


    <div class="card card-light">

        <div class="card-header">

            <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de transacciones contables</h3>

        </div>


        <div class="card-body">




  

<!-- ==================================

DATATABLE REGISTROS CONTABLES

====================================== -->


            <div class="row">
                <div class="col-lg-12">

                    <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%">

                        <thead>
                            <tr>

                                <th>ID</th>
                                <th width="auto">Responsable</th>
                                <th width="auto">Descripción</th>
                                <th width="auto">fecha</th>
                                <th width= "auto" style="color:darkcyan">Ingresos</th>
                                <th width= "auto" style="color:crimson">Egresos</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th colspan="3" style="text-align:right;"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </tfoot>

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

    MODAL AGREGAR SALDO

======================================-->

        <div class="modal fade" id="modalAgregarSaldoInicial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar saldo inicial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" id="form_agregar_saldo" action="{{ url('/guardar_saldo') }}">

                            <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


                            <div class="row">

                                <div class="col-md-3">

                                    <div class="form-group">

                                        <label for="Cedula" class="control-label">saldo inicial</label>


                                        <input type="number" name="saldo" class="form-control" id="saldo" autofocus required autocomplete="off">


                                        <div class="alert-message" id="saldoError"></div>

                                    </div>

                                </div>



                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="Nombre" class="control-label">Responsable</label>

                                        <input type="text" name="responsable" class="typeahead form-control text-capitalize" id="responsable" required autocomplete="off">

                                        <div class="alert-message" id="responsableError"></div>

                                    </div>
                                </div>




                                <div class="col-md-5">
                                    <div class="form-group">

                                        <label for="telefono" class="control-label">Descripción</label>

                                        <input type="text" name="descripcion" class="form-control" id="descripcion" required autocomplete="off">

                                        <div class="alert-message" id="descripcionError"></div>

                                    </div>
                                </div>

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

    MODAL AGREGAR INGRESO

======================================-->

<div class="modal fade" id="modalAgregarIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" id="form_agregar_ingreso" action="{{ url('/guardar_ingreso') }}">

                    <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label for="Ingreso" class="control-label">Valor ingreso</label>


                                <input type="number" name="ingreso" class="form-control" id="ingreso" autofocus required autocomplete="off">


                                <div class="alert-message" id="saldoError"></div>

                            </div>

                        </div>



                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="Nombre" class="control-label">Responsable</label>

                                <input type="text" name="responsable" class="typeahead form-control text-capitalize" id="responsable" required autocomplete="off">

                                <div class="alert-message" id="responsableError"></div>

                            </div>
                        </div>




                        <div class="col-md-5">
                            <div class="form-group">

                                <label for="telefono" class="control-label">Descripción</label>

                                <input type="text" name="descripcion" class="form-control" id="descripcion" required autocomplete="off">

                                <div class="alert-message" id="descripcionError"></div>

                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="submit" id="agregar_ingreso" name="agregar_ingreso" class="btn btn-primary loader">Guardar</button>
                        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>

            </div>
        </div>
    </div>

    </form>
</div>


</div>







<!--=====================================

    MODAL AGREGAR EGRESO

======================================-->

<div class="modal fade" id="modalAgregarEgreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar Egreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" id="form_agregar_egreso" action="{{ url('/guardar_egreso') }}">

                    <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label for="Egreso" class="control-label">Valor Egreso</label>


                                <input type="number" name="egreso" class="form-control" id="egreso" autofocus required autocomplete="off">


                                <div class="alert-message" id="saldoError"></div>

                            </div>

                        </div>



                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="Nombre" class="control-label">Responsable</label>

                                <input type="text" name="responsable" class="typeahead form-control text-capitalize" id="responsable" required autocomplete="off">

                                <div class="alert-message" id="responsableError"></div>

                            </div>
                        </div>




                        <div class="col-md-5">
                            <div class="form-group">

                                <label for="telefono" class="control-label">Descripción</label>

                                <input type="text" name="descripcion" class="form-control" id="descripcion" required autocomplete="off">

                                <div class="alert-message" id="descripcionError"></div>

                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="submit" id="agregar_egreso" name="agregar_egreso" class="btn btn-primary loader">Guardar</button>
                        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>

            </div>
        </div>
    </div>

    </form>
</div>


</div>







<!--=====================================

    MODAL EDITAR REGISTRO

======================================-->

<div class="modal fade" id="modalEdiatarRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Editar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" id="form_editar_registro" action="{{ url('/editar_registro/id') }}">

                    <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label for="Egreso" class="control-label">Valor</label>



                                <input type="number" name="registro" class="form-control" id="registro" autofocus required autocomplete="off">


                                <div class="alert-message" id="registroError"></div>

                            </div>

                        </div>



                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="Nombre" class="control-label">Responsable</label>

                                <input type="text" name="responsable" class="typeahead form-control text-capitalize" id="responsable" required autocomplete="off">

                                <div class="alert-message" id="responsableError"></div>

                            </div>
                        </div>




                        <div class="col-md-5">
                            <div class="form-group">

                                <label for="telefono" class="control-label">Descripción</label>

                                <input type="text" name="descripcion" class="form-control" id="descripcion" required autocomplete="off">

                                <div class="alert-message" id="descripcionError"></div>

                            </div>
                        </div>

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




<!-- ===================================================

GUARDAR DATOS Y CARGAR DATATABLE JQUERY LISTA DE ESPERA

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
            // pageLength: 5,

            type: "GET",
            ajax: 'registros_contables',


            dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


            buttons: [

                {
                    extend: 'excelHtml5',
                    footer: true,
                    text: 'Excel',
                    title: 'Resgistros contables',

                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]

                    }
                },

                {
                    extend: 'pdfHtml5',
                   // download: 'open',
                    footer: true,
                    text: 'PDF',
                    title: 'Resgistros contables',
                   
                   

                    customize: function (doc) {
                          
                           doc.content[1].table.widths = [ '25%',  '35%', '18%', '10%', '10%'];
                       },

                    exportOptions: {
                        columns: [1, 2, 3, 4, 5],
                         
                       

                    }
                },

            ],



            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],






            createdRow: function(row, data, rowIndex) {

                $.each($('td', row), function(rowIndex) {
                    if (rowIndex == 0) {
                        $(this).attr('data-name', 'responsable');
                        $(this).attr('class', 'responsable');
                        $(this).attr('data-type', 'text');
                        $(this).attr('data-pk', data['id']);
                    }
                    if (rowIndex == 1) {
                        $(this).attr('data-name', 'descripcion');
                        $(this).attr('class', 'descripcion');
                        $(this).attr('data-type', 'text');
                        $(this).attr('data-pk', data['id']);
                    }

                    if (rowIndex == 3) {
                        $(this).attr('data-name', 'ingreso');
                        $(this).attr('class', 'ingreso');
                        $(this).attr('data-type', 'text');
                        $(this).attr('data-pk', data['id']);
                    }
                    if (rowIndex == 4) {
                        $(this).attr('data-name', 'egreso');
                        $(this).attr('class', 'egreso');
                        $(this).attr('data-type', 'text');
                        $(this).attr('data-pk', data['id']);
                    }


                });
            },


            columns: [

                {
                    data: 'id',
                    name: 'id',
                    orderable: true,
                    searchable: true,
                    visible: false
                },
                {
                    data: 'responsable',
                    name: 'responsable',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'descripcion',
                    name: 'descripcion',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true,
                    searchable: true
                },

                {
                    data: 'ingreso',
                    name: 'ingreso',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'egreso',
                    name: 'egreso',
                    orderable: false,
                    searchable: true
                },
                
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],

            order: [
                [0, 'DESC']
            ],

            "columnDefs": [{
                "orderable": false,
                "render": $.fn.dataTable.render.number('.'),
                "targets": [4, 5],
                className: 'dt-body-left',
            }],





            "language": {





                "decimal": ",",
                "emptyTable": "No hay datos para mostrar.",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ".",
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

                },

            },



            // ==================================

            // CREAR SUMA DE COLUMNAS 

            // ==================================

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

               var numFormat = $.fn.dataTable.render.number( '\.', ',', 0, '$' ).display;


                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };




                // ==============================

                // SUMAR INGRESOS

                // ==============================


                total = api
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal2 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);


                // Total filtered rows on the selected column (code part added)
                //  var sumCol4Filtered = display.map(el => data[el][4]).reduce((a, b) => intVal(a) + intVal(b), 0 );

                // Update footer
                $(api.column(4).footer()).html(
                    numFormat(pageTotal2)
                );

                
                // ==================================

                // SUMA DE EGRSOS

                // ==================================


                total = api
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal3 = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);


                // Total filtered rows on the selected column (code part added)
                var sumCol4Filtered = display.map(el => data[el][5]).reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer
                $(api.column(5).footer()).html(
                    numFormat(pageTotal3)
                );

            }


        });





        //============================================

        // AGREGAR SALDO INICIAL

        //============================================


        $('#form_agregar_saldo').off('submit').on('submit', function(event) {

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
                    url: "/guardar_saldo",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {


                        $('#agregar_registro').prop("required", true);
                        // $('#selectBuscarCliente').html("");

                        $('#form_agregar_saldo')[0].reset();
                        $('#modalAgregarSaldoInicial').modal('hide');

                        table.ajax.reload();

                        toastr["success"]("Datos guardados correctamente.");
                    }

                });

            } catch (e) {
                toastr["danger"]("Se ha presentado un error.", "Información");
            }

        });

        // Delete article Ajax request.


        let id;

        $(document).on('click', '.delete', function() {

            if (!confirm('seguro de borrar?')) return;

            let id = $(this).data('id');


            $.ajax({
                url: 'eliminar_cita/' + id,
                method: "delete",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {

                    table.ajax.reload();
                    toastr["success"]("Se ha eliminado la cita correctamente.");

                }

            });
        });






        //============================================

        // AGREGAR INGRESO
        //============================================


        $('#form_agregar_ingreso').off('submit').on('submit', function(event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            /* Configurar botón submit con spinner */

            let btn = $('#agregar_ingreso')
            let existingHTML = btn.html() //store exiting button HTML
            //Add loading message and spinner
            $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

            setTimeout(function() {
                $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
            }, 5000) //5 seconds

            $('#agregar_ingreso').attr('disabled', true);



            event.preventDefault();

            try {

                $.ajax({
                    url: "/guardar_ingreso",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(result) {

                        table.ajax.reload();

                        $('#agregar_ingreso').prop("required", true);
                        // $('#selectBuscarCliente').html("");

                        $('#form_agregar_ingreso')[0].reset();
                        $('#modalAgregarIngreso').modal('hide');



                        toastr["success"]("Datos guardados correctamente.");
                    }

                });

            } catch (e) {
                toastr["danger"]("Se ha presentado un error.", "Información");
            }

        });





        //============================================

        // AGREGAR EGRESO

        //============================================


        $('#form_agregar_egreso').off('submit').on('submit', function(event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            /* Configurar botón submit con spinner */

            let btn = $('#agregar_egreso')
            let existingHTML = btn.html() //store exiting button HTML
            //Add loading message and spinner
            $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

            setTimeout(function() {
                $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
            }, 5000) //5 seconds

            $('#agregar_egreso').attr('disabled', true);



            event.preventDefault();

            try {

                $.ajax({
                    url: "/guardar_egreso",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(result) {

                        table.ajax.reload();

                        $('#agregar_egreso').prop("required", true);
                        // $('#selectBuscarCliente').html("");

                        $('#form_agregar_egreso')[0].reset();
                        $('#modalAgregarEgreso').modal('hide');



                        toastr["success"]("Datos guardados correctamente.");
                    }

                });

            } catch (e) {
                toastr["danger"]("Se ha presentado un error.", "Información");
            }

        });


        // ======================================= 

        //  ELIMINAR REGISTRO CONTABLE

        // ============================================= 


        $('body').on('click', '.deletePost', function(e) {


            let id = $(this).data("id");

            e.preventDefault();

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
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'post',
                        url: '/eliminar_registro/' + id,


                        success: function(data) {

                            if (data) {
                                swal("Registro eliminado correctamente!", data.message, "success");
                                table.ajax.reload();
                                //  $('#table_mascotas').html(data);


                            } else {
                                swal("Error!", data.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })

        });





        // =============================

        //EDITAR REGISTROS

        // ==============================


        $('#table_registros_contables').editable({


            mode: 'inline',
            container: 'body',
            selector: 'td.responsable',
            url: '/editar_registro',
            pk: 1,
            title: 'Responsable',
            type: 'POST',

            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'El campo no debe estar vacio'
                }
            }
        });



        $('#table_registros_contables').editable({

            mode: 'inline',
            container: 'body',
            selector: 'td.descripcion',
            url: '/editar_registro',
            pk: 1,
            title: 'Descripcion',
            type: 'POST',
            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'El campo no debe estar vacio'
                }
            }
        });




        $('#table_registros_contables').editable({


            mode: 'inline',
            container: 'body',
            selector: 'td.saldo',
            url: '/editar_registro',
            pk: 1,
            title: 'saldo',
            type: 'POST',

            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'El campo no debe estar vacio'
                }
            }
        });




        $('#table_registros_contables').editable({


            mode: 'inline',
            container: 'body',
            selector: 'td.ingreso',
            url: '/editar_registro',
            pk: 1,
            title: 'ingreso',
            type: 'POST',

            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'El campo no debe estar vacio'
                }
            }
        });



        $('#table_registros_contables').editable({


            mode: 'inline',
            container: 'body',
            selector: 'td.egreso',
            url: '/editar_registro',
            pk: 1,
            title: 'egreso',
            type: 'POST',

            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'El campo no debe estar vacio'
                }
            }
        });





        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });





    });
</script>





@endsection