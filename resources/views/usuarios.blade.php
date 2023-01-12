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
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-users mr-3"></span>Listado de usuarios</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCrearUsuario">
                            <span class="fa fa-list fa-fw" ></span>  
                            Crear usuario
                        </button>  &nbsp;
                  </div> 
                    

                </div>
              
              
         <div class="card-body">
                   


<!-- ==================================

DATATABLE USUARIOS

======================================== -->


       <div class="row">
         <div class="col-lg-12">
                                             
               <table id="table_usuarios" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>nombre</th>
                        <th>email</th>
                        <th>perfil</th>
                                        
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

    MODAL AGREGAR USUARIOS

==========================================-->


<div class="modal fade" id="modalCrearUsuario" tabindex="-1" data-target="#registerModal" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
 
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="registerForm">
                    @csrf

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordInput" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="passwordInput" type="password" class="form-control" name="password" required autocomplete="new-password">

                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




 <!--=====================================

    MODAL EDITAR USUARIO

======================================-->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    

<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-shower mr-3"></span>Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_editar_usuario" action="{{ url('usuarios') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

                   
          <div class="col-md-6">

            <div class="form-group">

                <label for="nombre" class="control-label">nombre</label>

                <input type="text" name="nombre" class="form-control " id="nombre" required autocomplete="off">

                <div class="alert-message" id="nombreError"></div>
            
          </div>
        </div>




          <div class="col-md-6">
       
          <div class="form-group">

            <label for="email" class="control-label">Email</label>

            <input type="email" name="email" class="form-control" id="email" required autocomplete="off">
            
                <div class="alert-message" id="emailError"></div>
                        
          </div>
         </div>

     </div>


        <div class="col-md-6">
          <div class="form-group">

            <label for="repetir_email" class="control-label">Repetir email</label>

            <input type="email" name="repetir_email" class="form-control" id="repetir_email" required autocomplete="off">
            
                <div class="alert-message" id="repetirEmailError"></div>
                        
            </div>
          </div>

       </div>


       <div class="col-md-6">

         <div class="form-group">

            <label for="contraseña" class="control-label">contraseña</label>

            <input type="text" name="contraseña" class="form-control " id="contraseña" required autocomplete="off">

            <div class="alert-message" id="contraseñaError"></div>
            
         </div>
       </div>



      <div class="col-md-3">
          <div class="form-group">

            <label for="perfil" class="control-label">Perfil</label>

            <input type="text" name="perfil" class="form-control" id="perfil" required autocomplete="off">
            
                <div class="alert-message" id="perfilError"></div>
                        
         </div>
      </div>

 </div>




<input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
<input type="hidden" name="id_usuario" class=" form-control" id="id_usuario" required autocomplete="off">




      <div class="modal-footer">

        <button type="submit" id="editar_usuario" name="editar_usuario" class="btn btn-primary loader">Guardar</button>
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

 DATATABLE USUARIOS

======================================================= --->

<script type = "text/javascript" >
  
  $(document).ready(function() {


      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table =  $('#table_usuario').DataTable({

  
           processing: true,
           serverSide: true,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
        
                            
           type: "GET",
           ajax: 'usuarios',

                    
           columns: [
                   
                    { data: 'nombre', name: 'nombre' }, 
                    { data: 'email', name: 'email' },
                    { data: 'perfil', name: 'perfil' },
                   
       
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],

                           
          
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

$('#form_agregar_usuario').off('submit').on('submit', function (event) {

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
               
                $('#form_agregar_usuario')[0].reset();
                $('#modalCrearUsuario').modal('hide');
                  
             //   table.ajax.reload();
             //   location.reload(true);
                toastr["success"]("usuario creado correctamente.");
         
            }
         });
        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }
    });





// =========================================

/// EDITAR USUARIO

// =========================================

$('body').on('click', '.editarUsuario', function (e) {
 
  e.preventDefault();

        $('#form_editar_usuario')[0].reset();
        let id = $(this).data('id');
      
      $.ajax({
        url: 'editar_usuario/'+id,
        method: 'GET',
        data: {  id: id },
  
         
          success: function(data) {
         
           
            $('#modalEditarUsuario').modal('show');
           
            $('#modalEditarUsuario input[name="id_usuario"]').val(data.id);
            $('#modalEditarUsuario input[name="nombre"]').val(data.nombre);
            $('#modalEditarUsuario input[name="email"]').val(data.email);
            $('#modalEditarUsuario input[name="perfil"]').val(data.perfil);
            

          }
        });
      });


             
  
 // =========================================
 
 // ACTUALIZAR DATOS DEL USUARIO

 // =========================================

 
$('#form_editar_usuario').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* Configurar botón submit con spinner */
let btn = $('#editar_usuario') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds
        $('#editar_usuario').attr('disabled', true);

        event.preventDefault();

        try {
       
      let id = $(this).data('id');
      
      $.ajax({
       
            url: 'actualizar_usuario/'+id,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                
                $('#editar_usuario').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_editar_usuario')[0].reset();
                $('#modalEditarUsuario').modal('hide');
                  
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


  
$(document).on('click', '.eliminarUsuario', function (event) {
     
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
                    url: 'eliminar_usuario/'+id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

                   //   if (data.success === true) {

                            swal("Datos de usuario eliminados correctamente!", data.message, "success");
                        
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