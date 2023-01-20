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

.has-error
   {
    border-color:#cc0000;
    background-color:#ffff99;
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

   
.mostrar_inputs{
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


.popover{
  pointer-events:none;
}

</style>


<br>



  
<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">




<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de pagos de honorarios</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAgregarPagoHonorario">
                            <span class="fa fa-user-md fa-fw" ></span>  
                            Crear pago de honorario
                        </button>  &nbsp;
                  </div> 
                    

                </div>
              
              
         <div class="card-body">
                   


<!-- ==================================

DATATABLE LISTA DE PROFESIONALES

====================================== -->


       <div class="row">
         <div class="col-lg-12">
                                             
               <table id="table_registros_pagos_honorarios" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>Nombre profesional</th>
                        <th>Cédula</th>
                        <th>Celular</th>
                        <th>fecha de pago</th>
                        <th>valor</th>
                                        
                         <th ></th>
                     
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

 


 <!--==========================================

    MODAL AGREGAR PAGOS HONORARIOS A PROFESIONAL

=================================================-->



<div class="modal fade" id="modalAgregarPagoHonorario"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
     <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar pago de honorario</h5> 
   
    
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form  id="form_agregar_pago_honorario" method="POST" action="{{ url('pago_honorarios}') }}"  >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

          <div class="col-md-4">

              <div class="form-group" >

                <label for="cliente" class="control-label">Cliente</label>


                
                <select class="livesearch form-control"  id="livesearch" name="livesearch" style="width: 100%;"></select>
                   
             
                   <input type="hidden" name="nombre" class="form-control " id="nombre" required autocomplete="off">
         

                <div class="alert-message" id="nombreClienteError"></div>
                 
             
            </div>
         </div>


         <div class="col-md-4">

              <div class="form-group">

                <label for="cédula" class="control-label">Cédula</label>

                <input type="text" name="cedula" class="form-control" id="cedula" required autocomplete="off">
                
                  <div class="alert-message" id="cedulaError"></div>
                           
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

                <label for="valor_honorario" class="control-label">Valor honorario</label>

                <input type="number" name="valor_honorario" class="form-control" id="valor_honorario" autocomplete="off">
                 
                           
               </div>
            </div>


           

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null}}" readonly>  

            <input type="hidden" name="id_profesional" id="id_profesional" class="form-control">




          </div>


      <div class="modal-footer">

        <button type="submit" id="agregar_pago_honorario" name="agregar_pago_honorario"  class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>



 <!--=====================================

    MODAL VER DATOS DE PAGO A PROFESIONAL

======================================-->

<div class="modal fade" id="modalVerPagoHonorario"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user-md mr-3"></span>Ver datos de profesional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_ver_pago_honorario" action="{{ url('pago_honorarios') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


       <div class="row">

          <div class="col-md-3">

              <div class="form-group" >

                <label for="cedula" class="control-label">Cédula</label>


                <div class="form-group">

                      <input type="number" name="cedula" class="form-control  border-0" id="cedula"  autocomplete="off">
               
                </div>

             
                <div class="alert-message" id="cedulaError"></div>
                 
             

            </div>
          </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="Nombre" class="control-label">Nombre</label>

                <input type="text" name="nombre" class="form-control  border-0" id="nombre" required autocomplete="off">

                 <div class="alert-message" id="nombreError"></div>
                
              </div>
            </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="Celular" class="control-label">Celular</label>

                <input type="text" name="celular" class="form-control  border-0" id="celular" required autocomplete="off">

                <div class="alert-message" id="celularError"></div>
                
             </div>
           </div>


           <div class="col-md-6">

              <div class="form-group">

                <label for="valor_pago" class="control-label">Valor honorario</label>

                <input type="text" name="valor_pago" class="form-control  border-0" id="valor_pago" required autocomplete="off">

                <div class="alert-message" id="profesionError"></div>
                
              </div>
            </div>

 
            <input type="hidden" name="id_pagos" id="id_pagos">

       
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

<div class="modal fade" id="modalEditarPagoHonorario"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user-md mr-3"></span>Editar datos de pago honorarios </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_editar_pago_honorario" action="{{ url('pago_honorarios') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


     <div class="row">

<div class="col-md-4">

    <div class="form-group" >

      <label for="cliente" class="control-label">Cliente</label>

   
         <input type="text" name="nombre" class="form-control " id="nombre" required autocomplete="off">


      <div class="alert-message" id="nombreClienteError"></div>
       
   
  </div>
</div>


<div class="col-md-4">

    <div class="form-group">

      <label for="cédula" class="control-label">Cédula</label>

      <input type="text" name="cedula" class="form-control" id="cedula" required autocomplete="off">
      
        <div class="alert-message" id="cedulaError"></div>
                 
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

      <label for="valor_honorario" class="control-label">Valor honorario</label>

      <input type="number" name="valor_pago" class="form-control" id="valor_pago" autocomplete="off">
       
                 
     </div>
  </div>



        
        <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

        <input type="hidden" name="id_pagos" id="id_pagos" class="form-control" >


       
          </div>


      <div class="modal-footer">

        <button type="submit" id="editar_pago_honorario" name="editar_pago_honorario" class="btn btn-primary loader">Guardar</button>
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

$(window).on('load', function () {
      setTimeout(function () {
    $(".loader-page").css({visibility:"hidden",opacity:"0"})
  }, 1000);
     
});
</script>





<!-- =======================================

DESHABILITAR CLICK DERECHO

============================================ -->

<script>

$(document).ready(function () {
   $("body").on("contextmenu",function(e){
     return false;
   });
});

</script>




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
         
      url: 'buscar_pago_honorarios', 

      dataType: 'json',
      delay: 250,
      processResults: function(data) {

        return {
          results: $.map(data, function(item) {
            return {
              text: item.nombre,
              id: item.id,
              cedula: item.cedula,
              celular: item.celular,
             
             
                        
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
     
        url: 'buscar_pago_honorarios', 

        method: "GET",
        data: $(this).serialize(),
        dataType: "json",
       
        success: function(data) {
        

         }

    });

   
   
   $('#nombre').val('');
                       
    let cliente = '';
                                                
    cliente = $(".livesearch").text();
     
    $('#nombre').val(cliente);

   
        

  });
</script>




<!-- =======================================================

PASAR DATOS DE CAMPOS A INPUT TEXT CON SELECT2: livesearch2

============================================================ -->


<script>

$('#livesearch').on('select2:select', function(evt){
    
    let id_profesional = evt.params.data.id;
    let celular = evt.params.data.celular;
    let cedula = evt.params.data.cedula;
   

   
    var opt = "<option value='"+celular+"' selected ='selected'> </option>";
    $("#celular").html(opt);
    $("#celular").val(celular).trigger("change");

    var opt = "<option value='"+cedula+"' selected ='selected'> </option>";
    $("#cedula").html(opt);
    $("#cedula").val(cedula).trigger("change");

    var opt = "<option value='"+id_profesional+"' selected ='selected'> </option>";
    $("#id_profesional").html(opt);
    $("#id_profesional").val(id_profesional).trigger("change");

});

</script>




<!-- ============================================

BORRAR CONTENIDO ESCRITO EN SELECT2: livesearch2

================================================= -->


<script>

$('.livesearch').on('select2:opening', function () { 

$('.livesearch').html('');
$('#celular').val('');
$('#cedula').val('');
$('#valor_honorario').val('');
$('#id_profesional').val('');


});


</script>






<!-- ===================================================

 DATATABLE PROFESIONALES

======================================================= --->

<script type = "text/javascript" >
  
  $(document).ready(function() {


      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table =  $('#table_registros_pagos_honorarios').DataTable({

  
           processing: true,
           serverSide: true,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
        
                            
           type: "GET",
           ajax: 'pago_honorarios',

                    
           columns: [
                   
                    { data: 'nombre', name: 'nombre' }, 
                    { data: 'cedula', name: 'cedula' },
                    { data: 'celular', name: 'celular' },
                    { data: 'created_at', name: 'created_at' },  
                    { data: 'valor_pago', name: 'valor_pago' },
                   
                   
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                 order: [3, 'ASC'],

                  "columnDefs": [
                      { "orderable": false,
                        "render": $.fn.dataTable.render.number( '.' ),
                        "targets":[4],
                        className: 'dt-body-left',
                      }
                  ],
          
          
            "language": {
                
                            
                        "emptyTable": "No hay pagos de honorarios a profesionales registrados.",
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


$('#form_agregar_pago_honorario').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#agregar_pago_honorario') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#agregar_pago_honorario').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "crear_pago_honorarios",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                  table.ajax.reload();
                $('#agregar_pago_honorario').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_agregar_pago_honorario')[0].reset();
                $('#modalAgregarPagoHonorario').modal('hide');
                  
             //   table.ajax.reload();
             //   location.reload(true);
                toastr["success"]("registro creado correctamente.");
         
            }
         });
        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }
    });



    
// =====================================================

/// VER REGISTROS DEL PAGO DE HONORARIO A PROFESIONAL

// ======================================================


$('body').on('click', '.verPagoHonorario', function(e) {
  
 
          
          let id = $(this).data('id');
         $('#form_ver_pago_honorario')[0].reset();
         
          $.ajax({
            url: 'ver_pago_honorarios/'+id,
            method: 'GET',
            data: {  id: id },
           
            success: function(data) {
             
              
            $('#modalVerPagoHonorario').modal('show');
            $('#modalVerPagoHonorario input[name="id_pagos"]').val(data.id)
            $('#modalVerPagoHonorario input[name="cedula"]').val(data.cedula);
            $('#modalVerPagoHonorario input[name="nombre"]').val(data.nombre);
            $('#modalVerPagoHonorario input[name="fecha"]').val(data.created_at);
            $('#modalVerPagoHonorario input[name="celular"]').val(data.celular);
            $('#modalVerPagoHonorario input[name="valor_pago"]').val(data.valor_pago);
                               
  
            }
  
           });
  
  
        });
  



// =========================================

/// EDITAR HONORARIO DE PROFESIONAL

// =========================================

$('body').on('click', '.editarPagoHonorario', function (e) {
 
  e.preventDefault();

        $('#form_editar_pago_honorario')[0].reset();
        let id = $(this).data('id');
      
      $.ajax({
        url: 'editar_pago_honorarios/'+id,
        method: 'GET',
        data: {  id: id },
  
         
          success: function(data) {


                    
           
            $('#modalEditarPagoHonorario').modal('show');

            $('#modalEditarPagoHonorario').modal('show');
            $('#modalEditarPagoHonorario input[name="id_pagos"]').val(data.id)
            $('#modalEditarPagoHonorario input[name="cedula"]').val(data.cedula);
            $('#modalEditarPagoHonorario input[name="nombre"]').val(data.nombre);
            $('#modalEditarPagoHonorario input[name="fecha"]').val(data.created_at);
            $('#modalEditarPagoHonorario input[name="celular"]').val(data.celular);
            $('#modalEditarPagoHonorario input[name="valor_pago"]').val(data.valor_pago);
           

          }
        });
      });


             
  
 // =========================================
 
 // ACTUALIZAR DATOS DEL PROFESIONAL

 // =========================================

 
$('#form_editar_pago_honorario').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#editar_pago_honorario') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#editar_pago_honorario').attr('disabled', true);

        event.preventDefault();

        try {
       
      let id = $(this).data('id');
      
      $.ajax({
       
            url: 'actualizar_pago_honorarios/'+id,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                
                $('#editar_pago_honorario').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                
                $('#modalEditarPagoHonorario').modal('hide');
                  
                table.ajax.reload();
             //   location.reload(true);
                toastr["success"]("datos actualizados correctamente.");
         
            }
         });
        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }
    });



  

// =========================================

/// ELIMINAR REGISTROS DEL PROFESIONAL

// =========================================   


  
$(document).on('click', '.eliminarProfesional', function (event) {
     
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
     
          }).then(function (e) {

            if (e.value === true) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'delete',
                    url: 'eliminar_profesional/'+id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

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

        }, function (dismiss) {
            return false;
        })
      });



});


</script>





@endsection