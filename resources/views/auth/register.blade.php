@extends('layouts.app')


@section('content')



  
<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">
  

<!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Registro de usuarios al sistema</h3>
                  
                   <div class="pull-right">
                      <button type="button" class="btn btn-primary float-right"  data-toggle="modal" data-target="#modalACrearAbono">                            <span class="fa fa-list fa-fw" ></span>  
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
                                             
               <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                        <th>Paciente</th>
                        <th>Tratamiento</th>
                         <th>Fecha abono</th>
                         <th>Saldo actual</th>
                         <th>Vr. abono</th>
                         <th>Saldo</th>                         
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

    MODAL AGREGAR ABONO

======================================-->

<div class="modal fade" id="modalACrearAbono"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


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

        <form  id="form_agregar_abono" method="POST" action="{{ url('abonos}') }}"  >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

          <div class="col-md-4">

              <div class="form-group" >

                <label for="cliente" class="control-label">Cliente</label>


                <div class="form-group">
                        <select class="livesearch form-control"  id="livesearch" name="livesearch" style="width: 100%;"></select>
                   

             
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



            <div class="col-md-12">

              <div class="form-group">

                <label for="Descripcion" class="control-label">Tratamiento</label>

                <input type="text" name="descripcion" class="form-control " id="descripcion" required autocomplete="off">

                <div class="alert-message" id="descripcionError"></div>
                
             </div>
            </div>


 
            <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::check() ? Auth::user()->name : null}}">

            <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::check() ? Auth::user()->id : null}}" readonly>  

            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"  readonly>  

            <input type="hidden" name="id_tratamiento" id="id_tratamiento">

            <input type="hidden" name="valor_tratamiento2" id="valor_tratamiento2">

            <input type="hidden" name="estado" id="estado">




          </div>


      <div class="modal-footer">

        <button type="submit" id="agregar_abono" name="agregar_abono"  class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>

   




@endsection
