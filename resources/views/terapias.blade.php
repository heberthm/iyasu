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
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de terapias</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCrearTerapia">
                            <span class="fas fa-male fa-fw" ></span>  
                            Crear terapia
                        </button>  &nbsp;
                  </div> 
                    

                </div>
              
              
         <div class="card-body">
                   


<!-- ==================================

DATATABLE LISTA DE ESPERA

======================================== -->


       <div class="row">
         <div class="col-lg-12">
                                             
               <table id="table_terapias" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">
                   <thead>
                      <tr>
                                        
                        <th>Terapia</th>
                        <th>Valor</th>
                                        
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

    MODAL AGREGAR TERAPIA

==========================================-->

<div class="modal fade" id="modalCrearTerapia"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-male mr-3"></span>Agregar terapia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_agregar_terapia" action="{{ url('terapias') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            

            
            <div class="col-md-5">

              <div class="form-group">

                <label for="Terapia" class="control-label">Terapia</label>

                <input type="text" name="terapia" class="form-control " id="terapia" required autocomplete="off">

                 <div class="alert-message" id="terapiaError"></div>
                
              </div>
            </div>


            <!--
            
            <div class="col-md-3">
              <div class="form-group">

                <label for="color" class="control-label">Asignar color</label>

                <input type="color" name="color" class="form-control" id="color" value="#1560F6" required autocomplete="off">
                
                  <div class="alert-message" id="valorTerapiaError"></div>
                           
               </div>
            </div>
 
          -->


            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_terapia" class="control-label">Valor</label>

                <input type="number" name="valor_terapia" class="form-control" id="valor_terapia" required autocomplete="off">
                
                  <div class="alert-message" id="valorTerapiaError"></div>
                           
               </div>
            </div>
 
         </div>

         <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  



      <div class="modal-footer">

        <button type="submit" id="agregar_terapia" name="agregar_terapia" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>




 <!--=====================================

    MODAL EDITAR TERAPIAS

======================================-->

<div class="modal fade" id="modalEditarTerapia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    

<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-male mr-3"></span>Editar terapia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_editar_terapia" action="{{ url('terapias') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-5">

              <div class="form-group"  >

                <label for="terapia" class="control-label">Tarapia</label>


                <input type="text" name="terapia" class="form-control" id="terapia" autofocus required autocomplete="off">

             
                <div class="alert-message" id="terapiaError"></div>
                 
              </div>

            </div>

     <!--
             
            <div class="col-md-3">

              <div class="form-group">

                <label for="color" class="control-label">Asignar color</label>

                <input type="color" name="color" class="form-control" id="color" value="#1560F6" required autocomplete="off">
                
                  <div class="alert-message" id="valorTerapiaError"></div>
                           
               </div>
            </div>
       -->




            <div class="col-md-3">

              <div class="form-group">

                <label for="valor_terapia" class="control-label">Valor</label>

                <input type="text" name="valor_terapia" class=" form-control" id="valor_terapia" required autocomplete="off">

                 <div class="alert-message" id="valorTerapiaError"></div>
                
              </div>
            </div>

        </div>    

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
            <input type="hidden" name="id_terapia" class=" form-control" id="id_terapia" required autocomplete="off">





      <div class="modal-footer">

        <button type="submit" id="editar_terapia" name="editar_terapia" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>







 <!--=====================================

    MODAL VER TERAPIA

======================================-->

<div class="modal fade" id="modalVerTerapia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-male mr-3"></span>Ver terapia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_ver_terapia" action="{{ url('terapias') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group"  >

                <label for="terapia" class="control-label">Terapia</label>


                <input type="text" name="terapia" class="form-control border-0" id="egreso" readonly autocomplete="off">

             
                <div class="alert-message" id="terapiaError"></div>
                 
              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="valor_terapia" class="control-label">Valor</label>

                <input type="text" name="valor_terapia" class="form-control border-0" id="valor_terapia" readonly autocomplete="off">

                 <div class="alert-message" id="valorTerapiaError"></div>
                
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


    let table =  $('#table_terapias').DataTable({

  
           processing: true,
           serverSide: true,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
        
                            
           type: "GET",
           ajax: 'terapias',

                    
           columns: [
                   
                    { data: 'terapia', name: 'terapia' }, 
                    { data: 'valor_terapia', name: 'valor_terapia' },
                   
                   
                   
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'asc']],

                   "columnDefs": [
                        { "orderable": false,
                          "render": $.fn.dataTable.render.number( '.' ),
                          "targets":[1],
                          className: 'dt-body-left',
                        }
                   ],
          
          
            "language": {
                
                            
                        "emptyTable": "No hay terapias registradas.",
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

/// GUARDAR TERAPIAS

// =========================================

$('#form_agregar_terapia').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#agregar_terapia') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#agregar_terapia').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "crear_terapia",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                  table.ajax.reload();
                $('#agregar_terapia').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_agregar_terapia')[0].reset();
                $('#modalCrearTerapia').modal('hide');
                  
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

/// EDITAR REGISTROS DEL PROFESIONAL

// =========================================

$('body').on('click', '.editarTerapia', function (e) {
 
  e.preventDefault();

        $('#form_editar_terapia')[0].reset();
        let id = $(this).data('id');
      
      $.ajax({
        url: '/editar_terapia/'+id,
        method: 'GET',
        data: {  id: id },
  
         
          success: function(data) {

           
           
            $('#modalEditarTerapia').modal('show');
           
            $('#modalEditarTerapia input[name="id_terapia"]').val(data.id);
            $('#modalEditarTerapia input[name="terapia"]').val(data.terapia);
         //  $('#modalEditarTerapia input[name="color"]').val(data.color);
            $('#modalEditarTerapia input[name="valor_terapia"]').val(data.valor_terapia);
            

          }
        });
      });


             
  
 // =========================================
 
 // ACTUALIZAR DATOS DEL PROFESIONAL

 // =========================================

 
$('#form_editar_terapia').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#editar_terapia') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#editar_terapia').attr('disabled', true);

        event.preventDefault();

        try {
       
      let id = $(this).data('id');
      
      $.ajax({
       
            url: 'actualizar_terapia/'+id,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                
                $('#editar_terapia').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
              //  $('#form_editar_')[0].reset();
                $('#modalEditarTerapia').modal('hide');
                  
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


  
$(document).on('click', '.eliminarTerapia', function (event) {
     
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
                    url: 'eliminar_terapia/'+id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

                   //   if (data.success === true) {

                            swal("Datos de terapia eliminados correctamente!", data.message, "success");
                        
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