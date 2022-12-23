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
  

<!-- ====================================

FORMULARIO CREAR TRATAMIENTO

=========================================  -->


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de registro de tratamientos</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalACrearTratamiento">
                            <span class="fa fa-list fa-fw" ></span>  
                            Crear tratamiento
                        </button>  &nbsp;
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
                                             
               <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>Paciente</th>
                         <th>Tratamiento</th>
                         <th>Valor</th>
                         <th>Fecha</th>
                    

                       
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

 

        



 <!--=====================================

    MODAL AGREGAR TRATAMIENTO

======================================-->

<div class="modal fade" id="modalACrearTratamiento"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar  tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_agregar_tratamiento"  enctype="multipart/form-data" action="{{ url('crear_tratamiento') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

          <div class="col-md-6">

              <div class="form-group" >

                <label for="cliente" class="control-label">Cliente</label>


                <div class="form-group">
                        <select class="livesearch form-control"  id="livesearch" name="livesearch" style="width: 100%;"></select>
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


            <div class="col-md-6">
              
              <div class="form-group">

                <label for="tratamiento" class="control-label ">Tratamiento</label>


                <input type="text" name="tratamiento" class="form-control" id="tratamiento" required autocomplete="off">

               <!--                          
                <select class="form-control select2-multiple" name="tratamientos[]" multiple="multiple" placeholder="Seleccione opciones" style="width:100%" >
                    @foreach($terapias as $prof)
                          <option value="{{$prof->terapia}}">{{$prof->terapia}}</option>
                  @endforeach   
                </select>

              -->



                <div class="alert-message" id="terapiasError"></div>

              </div>

        </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Valor</label>

                <input type="number" name="valor_tratamiento" class="form-control" id="valor_tratamiento" required autocomplete="off">
                
                  <div class="alert-message" id="valorTratamientoError"></div>
                           
               </div>
            </div>
 
            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

            
            </div>


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



<div class="modal fade" id="modalEditarTratamiento"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    

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

        <form method="POST" id="form_editar_tratamiento"  enctype="multipart/form-data" action="{{ url('crear_tratamiento') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

          <div class="col-md-6">

              <div class="form-group" >

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


                <input type="text" name="tratamiento" class="form-control" id="tratamiento" required autocomplete="off">

               <!--                          
                <select class="form-control select2-multiple" name="tratamientos[]" multiple="multiple" placeholder="Seleccione opciones" style="width:100%" >
                    @foreach($terapias as $prof)
                          <option value="{{$prof->terapia}}">{{$prof->terapia}}</option>
                  @endforeach   
                </select>

              -->



                <div class="alert-message" id="terapiasError"></div>

              </div>

        </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Valor</label>

                <input type="number" name="valor_tratamiento" class="form-control" id="valor_tratamiento" required autocomplete="off">
                
                  <div class="alert-message" id="valorTratamientoError"></div>
                           
               </div>
            </div>
 
            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

            <input type="hidden" name="id_tratamiento" class="form-control" id="id_tratamiento"  readonly>  

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"  readonly>  


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

    MODAL EDITAR ABONO

======================================-->

<div class="modal fade" id="modalEditarAbono"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">




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

        <form method="POST" id="form_editar_abono" action="{{ url('editar_abono') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            

              <div class="form-group" >

                <label for="cliente" class="control-label">Cliente</label>
                          
                    <input type="text" name="nombreCliente" class="form-control " id="nombreCliente"  required autocomplete="off">

                <div class="alert-message" id="livesearchError"></div>
                 
             

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="Celular" class="control-label">Tel/Cel</label>

                <input type="text" name="celular" class="form-control " id="celular"   required autocomplete="off">

                 <div class="alert-message" id="responsableError"></div>
                
              </div>
            </div>


            <div class="col-md-5">

            <div class="form-group">

              <label for="Descripcion" class="control-label">Descripción</label>

              <input type="text" name="descripcion" class="form-control " id="descripcion"   required autocomplete="off">

              <div class="alert-message" id="descripcionError"></div>
              
            </div>
          </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="number" name="valor_abono" class="form-control" id="valor_abono"   required autocomplete="off">
                
                  <div class="alert-message" id="valorAbonoError"></div>
                           
               </div>
            </div>


            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control" id="responsable"   required autocomplete="off">
                
                  <div class="alert-message" id="responsableError"></div>
                           
               </div>
            </div>

            



            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" >

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




<script>
   
    $('.select2-multiple').select2({
      
      allowClear: true,
      placeholder: "Seleccione una opción",

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
              id: item.id_cliente
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
     
   
      url: '/cliente/' +id, 

        method: "GET",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data) {

        //  $('#celular').val(data['celular']);
          $('#celular').val(data.celular);
   

         }

    });

   // window.location.href = 'cliente/' +id;

   
   $('#nombreCliente').val('');
                     
    let cliente = '';
                                              
    cliente = $(".livesearch").text();

    $('#nombreCliente').val(cliente);
        

  });
</script>



<!-- ================================= 

BORRAR CONTENIDO ESCRITO EN SELECT2: livesearch2

================================= -->


<script>

$('.livesearch').on('select2:opening', function (e) { 

$('.livesearch').html('');

});


</script>






<!-- ===================================================

 DATATABLE TRATAMIENTOS CLIENTES

======================================================= --->

<script type = "text/javascript" >
  
  $(document).ready(function() {


      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table =  $('#table_registros_contables').DataTable({

  
           processing: true,
           serverSide: true,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
        
                            
           type: "GET",
           ajax: 'registrar_tratamientos',

                    
           columns: [
                   
                    { data: 'nombre', name: 'nombre' },                  
                    { data: 'tratamiento', name: 'tratamiento' },  
                    { data: 'valor_tratamiento', name: 'valor_tratamiento' },
                    { data: 'created_at', name: 'created_at' },  
                  
                   
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[4, 'desc']],

                   "columnDefs": [
                        { "orderable": false,
                          "render": $.fn.dataTable.render.number( '.' ),
                          "targets":[2],
                          className: 'dt-body-left',
                        }
                   ],
          
          
            "language": {
                
                            
                        "emptyTable": "No hay tratamientos registrados.",
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


      

//============================================

// AGREGAR TRATAMIENTO DE CLIENTE

//============================================


  $('#form_agregar_tratamiento').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#agregar_tratamiento') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

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

                toastr["success"]("Tratamiento registrada correctamente.");
         


            }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }

    });

  });




// =========================================

/// EDITAR REGISTROS DE TRATAMIENTOS

// =========================================

$('body').on('click', '.editarTratamiento', function (e) {
 

 $('#form_editar_tratamiento')[0].reset();
 let id = $(this).data('id');

$.ajax({
   url: '/editar_tratamientos/'+id,
   method: 'GET',
   data: {  id: id },
  
   success: function(data) {

    
     
    
     $('#modalEditarTratamiento input[name="id_tratamiento"]').val(data.id)
     $('#modalEditarTratamiento input[name="id_cliente"]').val(data.id_cliente);
     $('#modalEditarTratamiento input[name="nombreCliente"]').val(data.nombre);
     $('#modalEditarTratamiento input[name="celular"]').val(data.celular);
     $('#modalEditarTratamiento input[name="tratamiento"]').val(data.tratamiento);
     $('#modalEditarTratamiento input[name="valor_tratamiento"]').val(data.valor_tratamiento);
     $('#modalEditarTratamiento input[name="responsable"]').val(data.responsable);


    
   }
 });



// =========================================

// ACTUALIZAR DATOS DE TRATAMIENTO

// =========================================


$('#form_editar_tratamiento').off('submit').on('submit', function (event) {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
/* Configurar botón submit con spinner */
let btn = $('#editar_tratamiento') 
let existingHTML =btn.html() //store exiting button HTML
//Add loading message and spinner
$(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
setTimeout(function() {
$(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
},5000) //5 seconds
 $('#editar_tratamiento').attr('disabled', true);
 event.preventDefault();
 try {

let id = $('#id_tratamiento').val();

$.ajax({
 url: 'actualizar_tratamiento/'+id,
 method: "POST",
 data: $(this).serialize(),
 dataType: "json",
     success: function(data) {
         
         $('#editar_abono').prop("required", true);
        // $('#selectBuscarCliente').html("");
        
         $('#form_editar_tratamiento')[0].reset();
         $('#modalEditarTratamiento').modal('hide');
           
      //   table.ajax.reload();
      //   location.reload(true);
         toastr["success"]("datos actualizados correctamente.");
  
     }
  });
 } catch(e) {
   toastr["danger"]("Se ha presentado un error.", "Información");
   }
});

});


</script>





@endsection