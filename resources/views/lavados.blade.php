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



 

<div class="container-fluid">
      
  


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de lavados</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCrearLavado">
                            <span class="fa fa-list fa-fw" ></span>  
                            Crear lavado
                        </button>  &nbsp;
                  </div> 
                    

                </div>
              
              
         <div class="card-body">
                   


<!-- ==================================

DATATABLE LAVADOS

======================================== -->


       <div class="row">
         <div class="col-lg-12">
                                             
               <table id="table_lavados" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">
                   <thead>
                      <tr>
                                        
                        <th>lavado</th>
                        <th>Precio</th>
                                        
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

    MODAL AGREGAR LAVADO

==========================================-->

<div class="modal fade" id="modalCrearLavado"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-shower mr-3"></span>Agregar lavado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_agregar_lavado" action="{{ url('lavados') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            

            
            <div class="col-md-6">

              <div class="form-group">

                <label for="lavado" class="control-label">Lavado</label>

                <input type="text" name="lavado" class="form-control " id="lavado" required autocomplete="off">

                 <div class="alert-message" id="lavadoError"></div>
                
              </div>
            </div>




            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_lavado" class="control-label">Valor</label>

                <input type="number" name="valor_lavado" class="form-control" id="valor_lavado" required autocomplete="off">
                
                  <div class="alert-message" id="valorLavadoError"></div>
                           
               </div>
            </div>
 
         </div>

         <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  



      <div class="modal-footer">

        <button type="submit" id="agregar_lavado" name="agregar_lavado" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>




 <!--=====================================

    MODAL EDITAR LAVADO

======================================-->

<div class="modal fade" id="modalEditarLavado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    

<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-shower mr-3"></span>Editar lavado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_editar_lavado" action="{{ url('lavados') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group"  >

                <label for="lavado" class="control-label">lavado</label>


                <input type="text" name="lavado" class="form-control" id="lavado" autofocus required autocomplete="off">

             
                <div class="alert-message" id="lavadoError"></div>
                 
              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="valor_lavado" class="control-label">Valor</label>

                <input type="text" name="valor_lavado" class=" form-control" id="valor_lavado" required autocomplete="off">

                 <div class="alert-message" id="valorLavadoError"></div>
                
              </div>
            </div>

        </div>    

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
            <input type="hidden" name="id_lavado" class=" form-control" id="id_lavado" required autocomplete="off">


      <div class="modal-footer">

        <button type="submit" id="editar_lavado" name="editar_lavado" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>







 <!--=====================================

    MODAL VER LAVADO

======================================-->

<div class="modal fade" id="modalVerLavado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-shower mr-3"></span>Ver lavado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_ver_lavado" action="{{ url('lavados') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group"  >

                <label for="lavado" class="control-label">Lavado</label>


                <input type="text" name="lavado" class="form-control border-0" id="lavado" readonly autocomplete="off">

             
                <div class="alert-message" id="lavadoError"></div>
                 
              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="valor_lavado" class="control-label">Valor</label>

                <input type="text" name="valor_lavado" class="form-control border-0" id="valor_lavado" readonly autocomplete="off">

                 <div class="alert-message" id="valorLavadoError"></div>
                
              </div>
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


    let table =  $('#table_lavados').DataTable({

  
           processing: true,
           serverSide: true,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
        
                            
           type: "GET",
           ajax: 'lavados',

                    
           columns: [
                   
                    { data: 'lavado', name: 'lavado' }, 
                    { data: 'valor_lavado', name: 'valor_lavado' },
                   
                   
                   
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],

                   "columnDefs": [
                        { "orderable": false,
                          "render": $.fn.dataTable.render.number( '.' ),
                          "targets":[1],
                          className: 'dt-body-left',
                        }
                   ],
          
          
            "language": {
                
                            
                        "emptyTable": "No hay lavados registradas.",
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

/// GUARDAR LAVADO

// =========================================

$('#form_agregar_lavado').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#agregar_lavado') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#agregar_lavado').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "crear_lavado",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                  table.ajax.reload();
                $('#agregar_lavado').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_agregar_lavado')[0].reset();
                $('#modalCrearLavado').modal('hide');
                  
             //   table.ajax.reload();
             //   location.reload(true);
                toastr["success"]("registro creado correctamente.");
         
            }
         });
        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }
    });





// =========================================

/// EDITAR LAVADO

// =========================================

$('body').on('click', '.editarLavado', function (e) {
 
  e.preventDefault();

        $('#form_editar_lavado')[0].reset();
        let id = $(this).data('id');
      
      $.ajax({
        url: 'editar_lavado/'+id,
        method: 'GET',
        data: {  id: id },
  
         
          success: function(data) {

           
           
            $('#modalEditarLavado').modal('show');
           
            $('#modalEditarLavado input[name="id_lavado"]').val(data.id);
            $('#modalEditarLavado input[name="lavado"]').val(data.lavado);
            $('#modalEditarLavado input[name="valor_lavado"]').val(data.valor_lavado);
            

          }
        });
      });


             
  
 // =========================================
 
 // ACTUALIZAR DATOS DEL LAVADO

 // =========================================

 
$('#form_editar_lavado').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#editar_lavado') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#editar_lavado').attr('disabled', true);

        event.preventDefault();

        try {
       
      let id = $(this).data('id');
      
      $.ajax({
       
            url: 'actualizar_lavado/'+id,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                
                $('#editar_lavado').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_editar_lavado')[0].reset();
                $('#modalEditarLavado').modal('hide');
                  
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


  
$(document).on('click', '.eliminarLavado', function (event) {
     
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
                    url: 'eliminar_lavado/'+id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

                   //   if (data.success === true) {

                            swal("Datos de lavado eliminados correctamente!", data.message, "success");
                        
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