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

 <!--

<div class="row">
          
          <section class="col-lg-12">
         
            <div class="card card-light">
                <div class="card-header">
                   
                    <h3 class="card-title"><span style="color: #28a745;" class="fas fa-database mr-3"></span>Registros contables</h3>
                   
               </div>

             <!--

                <div class="card-body">

                  <div class="row">
                
                      <div class="col-lg-6">
                        
                    
                      
                     
                          <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#modalAgregarSaldoInicial" style="text-align:left"><span class="fas fa-tags mr-2" tabindex="3"></span> Saldo inicial</button>
                          <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#modalAgregarIngreso" style="text-align:left"><span class="fas fa-plus mr-2" tabindex="3"></span> Ingresos</button>
                          <button class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#modalAgregarEgreso" style="text-align:left"><span class="fas fa-minus mr-2" tabindex="3"></span> Egresos</button>
                   

                     </div>  
                    
                   
                    
                       <span><h5 style="text-align:right">   </h5></span>  &nbsp;

                       <p> <span><h5 style="text-align:right">   </h5></span>  </p>
                      

                   

                     </div>     
                                  
                  </div>
               </div>
              
            </div>

              -->

            <!-- /.card-body -->
            
       
  

<!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de abonos de pacientes</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalACrearAbono">
                            <span class="fa fa-list fa-fw" ></span>  
                            Crear abono
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
                                             
               <table id="table_registros_contables" class="display" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>Paciente</th>
                        <th>Celular</th>
                         <th>Fecha abono</th>
                         <th>Vr. abono</th>
                         <th>Saldo</th>
                       
                         <th ></th>
                     
                     </tr>
                  </thead>
                
                  <tfoot>
                      <tr>
                          <th colspan="3" style="text-align:right;" ></th>
                          <th></th>
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

<div class="modal fade" id="modalACrearAbono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


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

        <form method="POST" id="form_agregar_saldo" action="{{ url('/guardar_saldo') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

                <label for="Cedula" class="control-label">Valor abono</label>


                <input type="number" name="valor_abono" class="form-control" id="valor_abono" autofocus required autocomplete="off">

             
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

        <form method="POST" id="form_agregar_ingreso" action="{{ url('/guardar_ingreso') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

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

        <form method="POST" id="form_agregar_egreso" action="{{ url('/guardar_egreso') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

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

        <form method="POST" id="form_editar_registro" action="{{ url('/editar_registro/id') }}" >

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

                <input type="text" name="descripcion" class="form-control" id="descripcion"  required autocomplete="off">
                
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

 DATATABLE ABONOS

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
           ajax: "{{ url('abonos') }}",
           
         
          
           columns: [
                   
                    { data: 'nombre', name: 'nombre' },                  
                    { data: 'celular', name: 'celular' },
                    { data: 'created_at', name: 'created_at' },  
                    { data: 'valor_abono', name: 'valor_Abono' },
                    { data: 'saldo', name: 'saldo' },
                   
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
          
          
            "language": {
                
                            
                        "emptyTable": "El paciente no tiene controles registrados.",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 de 0 Entradas",
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

// AGREGAR CLIENTE A LISTA DE ESPERA

//============================================


  $('#form_lista_espera').off('submit').on('submit', function (event) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


/* Configurar botón submit con spinner */

let btn = $('#agregar_lista_espera') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds

            $('#agregar').attr('disabled', true);

            event.preventDefault();

            try {

            $.ajax({
                url: "/listado_citas",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {

                  table.ajax.reload();

                    $('#agregar').prop("required", true);
                   // $('#selectBuscarCliente').html("");
                    $('#buscarMascotas').empty();
                    $('.BuscMascota').css("display", "block");
                    $('.motivoConsulta').css("display", "block");
                    $('#nombreMascota').html("");
                    $('#form_lista_espera')[0].reset();
                    $('#modalAgregarListaEspera').modal('hide');
                    $("#nombreCliente").html('');
  
                    $('.selectBuscarCliente').val('').trigger('change');
                                       

                    toastr["success"]("Cita registrada correctamente.");


                   


                }

             });

            } catch(e) {
              toastr["danger"]("Se ha presentado un error.", "Información");
              }

        });





// ======================================= 

//  ELIMINAR CITA DE LISTA DE ESPERAS  

// ========================================= 

//event

$('body').on('click', '.deletePost', function (e) {


let id = $(this).data("id");

e.preventDefault();

      $.ajax({
          type: 'delete',
          url: '/eliminar_cita/'+id,
                  
          success: function (data) {

            table.ajax.reload();
            toastr["success"]("Cita eliminada correctamente.");
            
          }
      });

    

  });


});

</script>





@endsection