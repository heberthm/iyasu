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

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-users mr-3"></span>Listado de usuarios</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary  float-right"  data-toggle="modal" data-target="#modalCrearUsuario">                            <span class="fa fa-list fa-fw" ></span>  
                            Crear usuario
                        </button>  &nbsp;
                  </div> 
                    

                </div>
              
              
         <div class="card-body">
                   


 


<!-- ==================================

DATATABLE USUARIOS

====================================== -->


       <div class="row">
         <div class="col-lg-12">
                                             
               <table id="table_registros_usuarios" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de registro</th>
                                      
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

    MODAL AGREGAR USUARIO

======================================-->

<div class="modal fade" id="modalCrearUsuario"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-mb">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
     <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user mr-3"></span>Agregar usuario</h5> 
   
    
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

     
     <div class="modal-body">
        <form method="POST" id="formCrearUsuario">
           
            <div class="input-group mb-3">
              
              <input type="text" class="form-control text-capitalize" id="nombre" name="nombre" placeholder="Nombre completo" required>

                  <div class="input-group-append">

                    <div class="input-group-text">

                      <span class="fas fa-user"></span>

                    </div>

                  </div>

            </div>


           <div class="input-group mb-3">

            <input type="email" class="form-control" name="email" placeholder="Email" required>

              <div class="input-group-append">

                 <div class="input-group-text">

                   <span class="fas fa-envelope"></span>

                 </div>
             </div>

          </div>


          <div class="input-group mb-3">

            <input type="password"  data-toggle="password"  data-message="Mostrar/Ocultar Contraseña" class="form-control" name="clave" placeholder="Contraseña" required>

             <!--
            <div class="input-group-append">

              <div class="input-group-text">

                 <span class="fas fa-lock"></span>

              </div>

            </div>
           
         -->
               

          </div>


          <div class="input-group mb-3">

            <input type="password" data-toggle="password"  data-message="Mostrar/Ocultar Contraseña" data-validation="confirmation"  class="form-control" id="repetir_clave" name="repetir_clave" placeholder="Repetir contraseña" required>

          <!--
            <div class="input-group-append">

              <div class="input-group-text">

                 <span class="fas fa-lock"></span>

              </div>

            </div>
           
         -->

          </div>
                                            



      <div class="modal-footer">

        <button type="submit" id="agregar_usuario" name="agregar_usuario"  class="btn btn-primary loader">Guardar</button>
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

<div class="modal fade" id="modalVerAbono"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 


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

        <form method="POST" id="form_ver_abono" action="{{ url('abonos') }}"  >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-6">

              <div class="form-group" >

              <label for="nombreCliente" class="control-label">Nombre</label>

              <input type="text" name="nombreCliente" class="form-control  border-0" id="nombreCliente" >

            </div>
          </div>


            <div class="col-md-6">

              <div class="form-group">

              <label for="celular" class="control-label">Celular</label>

              <input type="text" name="celular" class="form-control  border-0" id="celular" >
                
              </div>
            </div>


            <div class="col-md-12">

            <div class="form-group">

              <label for="Descripcion" class="control-label">Descripción</label>

              <input type="text" name="descripcion" class="form-control  border-0" id="descripcion" >
              
            </div>
          </div>


          
          <div class="col-md-3">
              <div class="form-group">

                <label for="valor tratamiento" class="control-label">Valor tratamiento</label>

                <input type="text" name="valor_tratamiento" class="form-control  border-0" id="valor_tratamiento" >
                           
               </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="text" name="valor_abono" class="form-control  border-0" id="valor_abono" >
                           
               </div>
            </div>
 


            <div class="col-md-3">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Saldo</label>

                <input type="text" name="saldo" class="form-control  border-0" id="saldo" >
                           
               </div>
            </div>

       
            
            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control  border-0" id="responsable" >
                           
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

<div class="modal fade" id="modalEditarAbono"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">




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

        <form method="POST" id="form_editar_abono" action="{{ url('actualizar_abono/{id}') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            
            <div class="col-md-4">

              <div class="form-group" >

                <label for="cliente" class="control-label">Cliente</label>
                          
                    <input type="text" name="nombreCliente" class="form-control " id="nombreCliente"  required autocomplete="off">

                <div class="alert-message" id="nombreClienteError"></div>
                 
            </div>

          </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="Celular" class="control-label">Tel/Cel</label>

                <input type="text" name="celular" class="form-control " id="celular"   required autocomplete="off">

                 <div class="alert-message" id="responsableError"></div>
                
              </div>
            </div>


         
            <div class="col-md-4">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Vr. abono</label>

                <input type="number" name="valor_abono" class="form-control" id="valor_abono"   required autocomplete="off">
                
                  <div class="alert-message" id="valorAbonoError"></div>
                           
               </div>
            </div>


            <div class="col-md-6">

              <div class="form-group">

                <label for="Descripcion" class="control-label">Descripción</label>

                <input type="text" name="descripcion" class="form-control " id="descripcion"  required autocomplete="off">

                <div class="alert-message" id="descripcionError"></div>
                
             </div>
           </div>



            <div class="col-md-6">
              <div class="form-group">

                <label for="valor_abono" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="form-control" id="responsable"  readonly  autocomplete="off">
                
                  <div class="alert-message" id="responsableError"></div>
                           
               </div>
            </div>

            

            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null }}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null }}" readonly>  

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"  readonly>  

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





<!-- ================================================

 FUNCIÓN FOCUS PARA PRIMER INPUT modalEditarCliente

 ================================================= -->


 <script>

$(document).ready(function() {
  
  $('#modalCrearUsuario').on('shown.bs.modal', function () {
  
   $('#nombre').focus();
   

  });
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




<!-- =======================================

MOSTRAR / OCULTAR CLAVE

============================================ -->

<script>
  $(function() {
    $('#clave').password()
  })
</script>


<!-- =======================================

CONFIRMAR CLAVE

============================================ -->


<script type="text/javascript">
    $(function () {
        $("#agregar_usuario").click(function () {
            var password = $("#clave").val();
            var confirmPassword = $("#repetir_clave").val();
            if (password != confirmPassword) {
                alert("La contraseña no coincide.");
                
                return false;
            }
            return true;
           
        });
    });
</script>




<!-- =======================================

MOSTRAR / OCULTAR CLAVE

============================================ -->

<script>
  $(function() {
    $('#repetir_clave').password()
  })
</script>



<!-- ===================================================

 DATATABLE USUARIOS

======================================================= --->

<script type = "text/javascript" >
  
  $(document).ready(function() {


      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table =  $('#table_registros_usuarios').DataTable({

  
           processing: true,
           serverSide: true,
                                             
           type: "GET",
           ajax: 'listado_usuarios',
             
        

                    
           columns: [


                    { data: 'name', name: 'name' },                  
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at', orderable: true },  
                                     
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                  
                
                 ],
        
                   order: [2, 'asc'],

                            
          
            "language": {
                
                            
                        "emptyTable": "No hay usuarios registrados.",
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

/// GUARDAR REGISTROS DE USUARIO

// =========================================

$('#formCrearUsuario').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#agregar_usuario') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#agregar_usuario').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "crear_usuario",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                  table.ajax.reload();
                $('#agregar_usuario').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#formCrearUsuario')[0].reset();
                $('#modalCrearUsuario').modal('hide');
                  
             //   table.ajax.reload();
             //   location.reload(true);
                toastr["success"]("Usuario creado correctamente.");
         
            }
         });
        } catch(e) {
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
            url: 'ver_abono/'+id,
            method: 'GET',
            data: {  id: id },
           
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

/// EDITAR REGISTROS DE TRATAMIENTO DE CLIENTES

// =========================================

$('body').on('click', '.editarAbono', function (e) {
 
  e.preventDefault();

        $('#form_editar_abono')[0].reset();
        let id = $(this).data('id');
      
      $.ajax({
        url: '/editar_abono/'+id,
        method: 'GET',
        data: {  id: id },
  
         
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

 
$('#form_editar_abono').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#editar_abono') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#editar_abono').attr('disabled', true);

        event.preventDefault();

        try {
       
      let id = $(this).data('id');
      
      $.ajax({
       
            url: 'actualizar_abono/'+id,
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
        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }
    });



  

// =========================================

/// ELIMINAR REGISTROS DE ABONOS DE CLIENTES

// =========================================   


  
$(document).on('click', '.eliminarAbono', function (event) {
     
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
                    url: '/eliminar_abono/'+id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

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

        }, function (dismiss) {
            return false;
        })
      });



});

</script>





@endsection