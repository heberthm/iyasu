@extends('layouts.app')


@section('content')
   
<style>

a.editable-click {
  color: green;
  border-color: green;
} 
a.editable-click.editable-disabled {
  color: black;  
  border-bottom: none;
}
a.editable-empty {
  color: gray;
  font-style: italic;
}


.select2-multpie
{
   background-color: #f5f5f5 !important;
}


/*

thead {
  display:none;
}

*/

</style>
 
    <!-- Content Header (Page header) -->
    <br>


<div class="container-fluid">

<div class="row">

        <!--
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
          </div><!-- /.col -->
        
          <!--

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div><!-- /.col -->
       
        


   
    </div>
 

  


<div class="row">
   <div class="col-lg-8">
        <div class="card card-light" id="card_mascotas">
              <div class="card-header" >
                <h3 class="card-title"><span  style="color:#28a745;"
                    class="fas fa-list-alt mr-3"></span>História clínica</h3>

                    <div class="btn-toolbar">

                      <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalControlMedico" 
                      style="position: absolute; top: 0; left: 500px">
                      <span class="fa fa-street-view fa-fw" ></span>  
                      Crear control clínico
                      </button>  &nbsp;
                    
                      <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalAgregarHistoriaClinica"
                      style="position: absolute; top: 0; left: 300px">
                      <span class="fa fa-plus fa-fw" ></span>  
                      Crear história clínica
                      </button>

                    </div>
                    
              </div>
              


 <div class="card-body">
              
<!-- ==========================

DATATABLE MASCOTAS

============================== -->
     
@foreach($id_clientes as $id_cliente)
          
 @endforeach


  
 <div class="row">
   <div class="col-lg-12">
           
             
               <table id="Table_historia_clinica" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                                        
                         <th>Estatura</th>
                         <th>Peso</th>
                         <th>IMC</th>
                         <th>ABD inicial</th>
                         <th></th>
                      </tr>

                  </thead>

                        <tbody>
                       
                        </tbody>    

                   
              </table>
  
               
          
        
        </div> 
       </div>

        

               <input type="hidden" id="id_cliente" name="id_cliente" value="{{ $id_cliente->id_cliente }}" >  
                 <br>
                 <br>

                
             </div>
             </div> 
          
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      
          <!-- /.col (left) -->
          <div class="col-md-4">
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">
                <span                    
                    style="color:#28a745;"
                    class="fas fa-user mr-3"></span>Datos del paciente</h3>
                  
                   <!--
                    <h4  style="text-align: center;">
                           
                    <div class="dropdown ml-auto">
                                  <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                          id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false">
                                    ☰
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    
                                      <button class="dropdown-item" type="button"
                                              id="btn_eliminarCliente">Eliminar paciente
                                      </button>
                                    
                                 </div>
                         </div>
                  </h4>
  
                 -->

              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                <table class="table">
                      <tbody  style="font-size:95%;">

           
                      <tr style="display:none;">
                     
                      <td>
                          <div class="control-label">Id_cliente</div>
                          <a href="#" id="id_cliente">{{ $id_cliente->id_cliente }}</a></td>
                      </tr>

                      <tr style="display:none;">
                     
                     <td>
                       <div class="control-label">Cédula</div>
                       <a href="#" id="cedula"">{{ $id_cliente->cedula }}</a></td>
                    </tr>
                    <span id="navbar_estado"></span>
                      <tr>
                        <td>
                        <div class="control-label">Nombre</div>
                          <a href="#" class="xedit" data-type="text"  data-pk="{{$id_cliente->id_cliente}}"  data-name="nombre">
		                    	   {{$id_cliente->nombre}}</a>
                          <a class=" ml-3 allign-middle" id="nombre" href=""></a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="control-label">Edad</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->edad}}" data-name="edad" id="edad">{{ $id_cliente->edad }}</a>
                          <a class=" ml-3 allign-middle" id="edad" href=""></a>
                        </td> 
                      </tr>
                     
                      <tr>
                        <td>
                          <div class="control-label">Celular</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}"  data-name="celular">{{ $id_cliente->celular }}</a>
                          <a class=" ml-3 allign-middle" id="celular" href=""></a>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Email</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="email">{{ $id_cliente->email }}</a>
                          <a class=" ml-3 allign-middle" id="email" href=""></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Dirección</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="direccion">{{ $id_cliente->direccion }}</a>
                          <a class=" ml-3 allign-middle" id="direccion" href=""></a>
                      </tr>
                     
                      <tr>
                     
                       <td>
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" style="text-align:left"><span class="fa fa-edit fa-fw" tabindex="3"></span> Editar datos del paciente</button>
                     <!--   <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" onclick="editarCliente();" >
                         <span class="fa fa-edit fa-fw" ></span> Editar datos </button>  -->
                        </td>
                      <tr>
                     
                     </tbody>
                      
                    </table>

                      

                                  
                

                <!-- /.form group -->
              </div>
             
              <!-- /.card-body -->
            </div>
            </div>
            </div>          
            <!-- /.card -->
 </div><!-- /.container-fluid -->




 <!--=====================================

    MODAL AGREGAR HISTÓRIA CLÍNICA

======================================-->

<div class="modal fade" id="modalAgregarHistoriaClinica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                    

              <div class="modal-dialog modal-lg">
                
                <div class="modal-content">
                
                    <div class="modal-header">
           
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Agregar História </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                            <div  id="datos_historia_clinica">
                                <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
                                    <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
                                  <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                                  <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                            </div>
                        </div>



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button>
                                      

                 </div>
              
                    <div class="modal-body">
              
              
                    <form method="POST" id="form_crear_historia_clinica" enctype="multipart/form-data" action="{{ url('/clientes') }}" >
                    
                  <!-- @csrf -->
              
              <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
          
              
              
                      <div class="row" style="font-size:90%;">
              
                        <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="Estatura" class="control-label font-weight-normal">Estatura</label>
                           
                              <input type="number" name="estatura" class="form-control" id="estatura" autofocus="true"  autocomplete="off">
                                          
                              <div class="alert-message" id="estaturaError"></div>
                                
                            </div>
                        </div>
                        
                                                  
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="peso inicial" class="control-label font-weight-normal">Peso inicial</label>
              
                                <input type="number" name="peso_inicial" class="form-control" id="peso_inicial"  >
              
                                  <div class="alert-message" id="pesoInicialError"></div>
              
                              </div>
              
                          </div>
              
              
                      
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="abd inicial" class="control-label font-weight-normal">ABD inicial</label>
              
                              <input type="number"  id="abd_inicial" name="abd_inicial"  class="form-control"  autocomplete="off">
              
                              <div class="alert-message" id="abdInicialError"></div>
              
                            </div>
                          </div>
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="grasa inicial" class="control-label font-weight-normal">Grasa inicial</label>
              
                                <input type="number"  id="grasa_inicial" name="grasa_inicial"  class="form-control text-capitalize"  autocomplete="off">
              
                                <div class="alert-message" id="grasaInicialError"></div>
              
                              </div>
              
                          </div>
              
                         
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="agua inicial" class="control-label font-weight-normal">Agua inicial</label>
              
                              <input type="number" name="agua_inicial" class="form-control" id="agua_inicial" autocomplete="off">
                
                                <div class="alert-message" id="aguaInicialError"></div>
              
                            </div>
                          </div>  
              

              
                            <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="IMC" class="control-label font-weight-normal">IMC</label>
              
                                  <input type="number" name="imc" class="form-control" id="imc"  autocomplete="off">
              
                                  <div class="alert-message" id="imcError"></div>
              
                                </div>
              
                          </div>




                          <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="grasa viseral" class="control-label font-weight-normal">Grasa viseral</label>
              
                                  <input type="number" name="grasa_viseral" class="form-control" id="grasa_viseral"  autocomplete="off">
              
                                  <div class="alert-message" id="grasaViseralError"></div>
              
                                </div>
              
                          </div>
      


                      <div class="col-md-2">
                             <div class="form-group">

                            <label for="edad metabolica" class="control-label font-weight-normal">Edad metabolica</label>

                            <input type="number" name="edad_metabolica" class="form-control" id="edad_metabolica"  autocomplete="off">

                            <div class="alert-message" id="edadMetabolicaError"></div>

                          </div>

                    </div>


                    <div class="col-md-8">
              
                          <div class="form-group">

                            <label for="paquete desintoxicacion" class="control-label font-weight-normal">Paquete desintoxicacion</label>

                            <input type="text" name="paquete_desintoxicacion" class="form-control" id="paquete_desintoxicacion"  autocomplete="off">

                            <div class="alert-message" id="paqueteDesentoxicacionError"></div>

                          </div>

                    </div>


                    <div class="col-md-6">
              
                        <div class="form-group">

                          <label for="terapia" class="control-label font-weight-normal">Terapias</label>

                                                   
                          <select class="form-control select2-multiple" name="terapias[]" multiple="multiple" placeholder="Seleccione opciones" style="width:100%" >
                              @foreach($terapias as $prof)
                                    <option value="{{$prof->terapia}}">{{$prof->terapia}}</option>
                            @endforeach   
                          </select>



                          <div class="alert-message" id="terapiasError"></div>

                        </div>

                  </div>


                    <div class="col-md-6">
              
                        <div class="form-group">

                          <label for="terapias adicionales" class="control-label font-weight-normal">Terapias adicionales</label>

                          <select class="form-control select2-multiple" name="terapias_adicionales[]" multiple="multiple" placeholder="Seleccione opciones" style="width:100%" >
                              @foreach($terapias_adicionales as $tera)
                                    <option value="{{$tera->terapias_adicionales}}">{{$tera->terapias_adicionales}}</option>
                            @endforeach   
                          </select>


                          <div class="alert-message" id="terapiasAdicionalesError"></div>

                        </div>

                  </div>

                  <div class="col-md-8">
              
                        <div class="form-group">

                          <label for="tipo lavado" class="control-label font-weight-normal">Tipo lavado</label>

                          <input type="text" name="tipo_lavado" class="form-control" id="tipo_lavado"  autocomplete="off">

                          <div class="alert-message" id="tipoLavadoError"></div>

                        </div>

                  </div>

              
        
            <div class="col-md-4">
              <div class="form-group">
                  <label for="profesional" class="control-label font-weight-normal">Atendido por</label>
                  
                  <select name="profesional" class="form-control" id="profesional"placeholder="Seleccione profesional">
                    <option value=""></option>
                      @foreach($profesionales as $prof) 
                      <option value="{{$prof->nombre}}">{{$prof->nombre}}</option>
                      @endforeach
                  </select>

                  
              </div>
          </div>

          <div class="col-md-12">
              
              <div class="form-group">

                <label for="Observaciones" class="control-label font-weight-normal">Observaciones</label>

                <input type="text" name="observaciones" class="form-control" id="observaciones"  autocomplete="off">

                <div class="alert-message" id="observacionesError"></div>

              </div>

          </div>

      </div>
              
                  
              
  </div>
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
                    
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>  
                    
              
                    <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->
        
                <div class="modal-footer">
        
                <button type="submit" id="agregar_historia" name="agregar_historia" class="btn btn-primary">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
                </div>

            </div>
          </div>
        </div>
        
    </form>
   </div>
       
 </div>
        
 
 

 <!--=====================================

    MODAL EDATAR DATOS DE  HISTÓRIA CLÍNICA

=========================================-->



<div class="modal fade" id="modalEditarHistoriaClinica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                    

              <div class="modal-dialog modal-lg">
                
                <div class="modal-content">
                
                    <div class="modal-header">
           
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar História </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                            <div  id="datos_historia_clinica">
                                <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
                                    <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
                                  <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                                  <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                            </div>
                        </div>



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button>
                                      

                 </div>
              
                    <div class="modal-body">
              
              
                    <form method="POST" id="form_editar_historia_clinica" action="{{ url('/editar_historia/id_clientes') }}" >
                    
                  <!-- @csrf -->
              
              <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
          
              
              
                      <div class="row" style="font-size:90%;">
              
                        <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="Estatura" class="control-label font-weight-normal">Estatura</label>
                           
                              <input type="number" name="estatura" class="form-control" id="estatura" value="{{$id_cliente->estatura}}" autofocus="true"  autocomplete="off">
                                          
                              <div class="alert-message" id="estaturaError"></div>
                                
                            </div>
                        </div>
                        
                                                  
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="peso inicial" class="control-label font-weight-normal">Peso inicial</label>
              
                                <input type="number" name="peso_inicial" class="form-control" id="peso_inicial" value="{{$id_cliente->peso_inicial}}"  >
              
                                  <div class="alert-message" id="pesoInicialError"></div>
              
                              </div>
              
                          </div>
              
              
                      
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="abd inicial" class="control-label font-weight-normal">ABD inicial</label>
              
                              <input type="number"  id="abd_inicial" name="abd_inicial"  class="form-control" value="{{$id_cliente->abd_inicial}}"   autocomplete="off">
              
                              <div class="alert-message" id="abdInicialError"></div>
              
                            </div>
                          </div>
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="grasa inicial" class="control-label font-weight-normal">Grasa inicial</label>
              
                                <input type="number"  id="grasa_inicial" name="grasa_inicial"  class="form-control text-capitalize" value="{{$id_cliente->grasa_inicial}}"   autocomplete="off">
              
                                <div class="alert-message" id="grasaInicialError"></div>
              
                              </div>
              
                          </div>
              
                         
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="agua inicial" class="control-label font-weight-normal">Agua inicial</label>
              
                              <input type="number" name="agua_inicial" class="form-control" id="agua_inicial" value="{{$id_cliente->agua_inicial}}"  autocomplete="off">
                
                                <div class="alert-message" id="aguaInicialError"></div>
              
                            </div>
                          </div>  
              

              
                            <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="IMC" class="control-label font-weight-normal">IMC</label>
              
                                  <input type="number" name="imc" class="form-control" id="imc" value="{{$id_cliente->imc}}"   autocomplete="off">
              
                                  <div class="alert-message" id="imcError"></div>
              
                                </div>
              
                          </div>




                          <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="grasa viseral" class="control-label font-weight-normal">Grasa viseral</label>
              
                                  <input type="number" name="grasa_viseral" class="form-control" id="grasa_viseral"  value="{{$id_cliente->grasa_viseral}}" autocomplete="off">
              
                                  <div class="alert-message" id="grasaViseralError"></div>
              
                                </div>
              
                          </div>
      


                      <div class="col-md-2">
                             <div class="form-group">

                            <label for="edad metabolica" class="control-label font-weight-normal">Edad metabolica</label>

                            <input type="number" name="edad_metabolica" class="form-control" id="edad_metabolica"  value="{{$id_cliente->edad_metabolica}}" autocomplete="off">

                            <div class="alert-message" id="edadMetabolicaError"></div>

                          </div>

                    </div>


                    <div class="col-md-5">
              
                          <div class="form-group">

                            <label for="paquete desintoxicacion" class="control-label font-weight-normal">Paquete desintoxicacion</label>

                            <input type="text" name="paquete_desintoxicacion" class="form-control" id="paquete_desintoxicacion" value="{{$id_cliente->paquete_desintoxicacion}}"  autocomplete="off">

                            <div class="alert-message" id="paqueteDesentoxicacionError"></div>

                          </div>

                    </div>


                   
                    <div class="col-md-6">
              
                        <div class="form-group">

                          <label for="terapia" class="control-label font-weight-normal">Terapia</label>

                          <input type="text" name="terapias" class="form-control" id="terapias" value="{{$id_cliente->terapias}}"  autocomplete="off">

                          <div class="alert-message" id="terapiasError"></div>

                        </div>

                  </div>


                  


                <div class="col-md-6">
              
              <div class="form-group">

                <label for="terapias adicionales" class="control-label font-weight-normal">Terapias adicionales</label>

                <input type="text" name="terapias_adicionales" class="form-control" id="terapias_adicionales" value="{{$id_cliente->terapias_adicionales}}"  autocomplete="off">

                <div class="alert-message" id="terapiasAdicionalesError"></div>

              </div>

        </div>



                      
            <div class="col-md-4">
              <div class="form-group">
                  <label for="medico_tratante" class="control-label font-weight-normal">Atendido por</label>
                  
                  <input type="text" name="profesional" class="form-control" id="profesional" value="{{$id_cliente->profesional}}" autocomplete="off">

                 <div class="alert-message" id="diasLavadosError"></div>


                  
              </div>
          </div>

          <div class="col-md-8">
              
              <div class="form-group">

                <label for="Observaciones" class="control-label font-weight-normal">Observaciones</label>

                <input type="text" name="observaciones" class="form-control" id="observaciones" value="{{$id_cliente->observaciones}}"  autocomplete="off">

                <div class="alert-message" id="observacionesError"></div>

              </div>

          </div>

      </div>
              
                  
              
  </div>
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
                    
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>  
                    
              
                    <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->
        
                <div class="modal-footer">
        
                <button type="submit" id="agregar_historia" name="agregar_historia" class="btn btn-primary">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
                </div>

            </div>
          </div>
        </div>
        
    </form>
   </div>
       
 </div>
        
 
 

 <!--=====================================

    MODAL MOSTRAR DATOS DE  HISTÓRIA CLÍNICA

=========================================-->





<div class="modal fade" id="modalMostrarHistoriaClinica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                    

              <div class="modal-dialog modal-lg">
                
                <div class="modal-content">
                
                    <div class="modal-header">
           
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Datos de História clínica </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                            <div  id="datos_historia_clinica">
                                <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
                                    <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
                                  <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                                  <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                            </div>
                        </div>



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button>
                                      

                 </div>
              
                    <div class="modal-body">
              
              
                    <form method="POST" id="form_crear_historia_clinica" action="{{ url('/clientes') }}" >
                    
                  <!-- @csrf -->
              
              <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
          
              
              
                      <div class="row" style="font-size:90%;">
              
                        <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="Estatura" class="control-label font-weight-normal"><b>Estatura</b></label>

                              <p>{{ $id_cliente->estatura }}</p>                            
                                
                            </div>
                        </div>
                        
                                                  
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="peso inicial" class="control-label font-weight-normal"><b>Peso inicial</b></label>
              
                                <p>{{ $id_cliente->peso_inicial }}</p>       
              
                              </div>
              
                          </div>
              
              
                      
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="abd inicial" class="control-label font-weight-normal"><b>ABD inicial</b></label>
              
                              <p>{{$id_cliente->abd_inicial}}</p>       
              
                            </div>
                          </div>
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="grasa inicial" class="control-label font-weight-normal"><b>Grasa inicial</b></label>
              
                                <p>{{$id_cliente->grasa_inicial}}</p>          
              
                              </div>
              
                          </div>
              
                         
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="agua inicial" class="control-label font-weight-normal"><b>Agua inicial</b></label>
              
                              <p>{{ $id_cliente->agua_inicial }}</p>         
              
                            </div>
                          </div>  
              

              
                            <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="IMC" class="control-label font-weight-normal"><b>IMC</b></label>
              
                                  <p>{{ $id_cliente->imc }}</p>       
              
                                </div>
              
                          </div>




                          <div class="col-md-2">
              
                                <div class="form-group">
              
                                  <label for="grasa viseral" class="control-label font-weight-normal"><b>Grasa viseral</b></label>
              
                                  <p>{{ $id_cliente->grasa_viseral }}</p>       
              
                                </div>
              
                          </div>
      


                      <div class="col-md-2">
                             <div class="form-group">

                            <label for="edad metabolica" class="control-label font-weight-normal"><b>Edad metabolica</b></label>

                            <p>{{ $id_cliente->edad_metabolica }}</p>       

                          </div>

                    </div>


                    <div class="col-md-3">
              
                          <div class="form-group">

                            <label for="paquete desentoxicacion" class="control-label font-weight-normal"><b>Paquete desintoxicacion</b></label>

                            <p>{{ $id_cliente->paquete_desintoxicacion }}</p>       

                          </div>

                    </div>



                    <div class="col-md-3">
                        
                        <div class="form-group">

                          <label for="terapias" class="control-label font-weight-normal"><b>Terapias</b></label>

                          <p>{{ $id_cliente->terapias }}</p>       

                        </div>

                  </div>


                    <div class="col-md-4">
              
                        <div class="form-group">

                          <label for="terapias adicionales" class="control-label font-weight-normal"><b>Terapias adicionales</b></label>

                          <p>{{ $id_cliente->terapias_adicionales }}</p>       

                        </div>

                  </div>

                  <div class="col-md-3">
              
                        <div class="form-group">

                          <label for="tipo lavado" class="control-label font-weight-normal"><b>Tipo lavado</b></label>

                          <p>{{ $id_cliente->tipo_lavado }}</p>       

                        </div>

                  </div>
            

            </div>

        
            <div class="col-md-4">
              <div class="form-group">
                  <label for="medico_tratante" class="control-label font-weight-normal"><b>Atendido por</b></label>
                  
                  <p>{{ $id_cliente->profesional }}</p>       

                  
              </div>
          </div>

          <div class="col-md-8">
              
              <div class="form-group">

                <label for="Observaciones" class="control-label font-weight-normal"><b>Observaciones</b></label>

                <p>{{ $id_cliente->observaciones }}</p>       

              </div>

          </div>


          <div class="col-md-4">
              
              <div class="form-group">

                <label for="fecha de creacion" class="control-label font-weight-normal"><b>Fecha de creación</b></label>

                <p>{{ date('d-m-Y  h:i A', strtotime($id_cliente->created_at)) }}</p>       

              </div>

          </div>

      </div>
              
                  
              
  </div>
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
                    
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_historia_clinica }}" readonly>  
                    
              
                    <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->
        
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

    MODAL EDITAR CLIENTE

======================================-->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


            <div class="modal-dialog modal-lg">
              
              <div class="modal-content">
              
              <div class="modal-header">
                
                  <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Cambiar datos del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  
                        <span aria-hidden="true">&times;</span>
                  
                    </button>
                
                  </div>
            
                  <div class="modal-body">
            
            
                    <form method="POST" id="form_editar_cliente" action="{{ url('editarCliente/id_cliente') }}" >
            
                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->
                   
                    <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{$id_cliente->id_cliente}}" autofocus required autocomplete="off">

            
                      <div class="row">
            
                        <div class="col-md-3">
            
                          <div class="form-group"  >
            
                            <label for="Cedula" class="control-label">Cédula</label>
            
            
                            <input type="number" name="cedula" class="form-control" id="cedula" value="{{$id_cliente->cedula}}" autofocus required autocomplete="off">
            
                          
                            <div class="alert-message" id="cedulaError"></div>
                              
                          </div>
            
                        </div>
            
            
            
                        <div class="col-md-9">
            
                          <div class="form-group">
            
                            <label for="Nombre" class="control-label">Nombre</label>
            
                            <input type="text" name="nombre" class="typeahead form-control text-capitalize" id="nombre" value="{{$id_cliente->nombre}}" 
                             required autocomplete="off">
            
                              <div class="alert-message" id="nombreError"></div>
                            
                          </div>
                        </div>
            
            
                        <div class="col-md-3">
            
                          <div class="form-group">

                            <label for="fecha_nacimiento" class="control-label">Fecha nacimiento</label>


                            <input type="date" class="form-control" id="fecha_nacimiento1" name="fecha_nacimiento1" required value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}">
                         
                            <div class="alert-message" id="fechaNacimientoError" ></div>
                              
                          </div>

                          <input type="hidden" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}" required/>

                        </div>


                        <div class="col-md-3">
            
                            <div class="form-group">

                              <label for="edad" class="control-label">Edad</label>


                              <input type="text" name="edad1" class="form-control" id="edad1" value="{{$id_cliente->edad}}"  readonly autocomplete="off">

                            
                              <div class="alert-message" id="EdadError"></div>
                                
                            </div>

                          </div>
            
            
                        <div class="col-md-6">
                          <div class="form-group">
            
                            <label for="telefono" class="control-label">Tel/Cel.</label>
            
                            <input type="text" name="celular" class="form-control" id="celular"  value="{{$id_cliente->celular}}"  required autocomplete="off">
                            
                              <div class="alert-message" id="celularError"></div>
                                        
                            </div>
                        </div>
            
            
                        <div class="col-md-8">
            
                            <div class="form-group">
            
                              <label for="direccion" class="control-label">Dirección</label>
            
                              <input type="text" name="direccion" class="form-control text-capitalize" id="direccion"  value="{{$id_cliente->direccion}}" 
                              required onkeypress="return isNumber(event)">
            
                                <div class="alert-message" id="direccionError"></div>
            
                            </div>
            
                        </div>
            
            
               
                      
            
                        <div class="col-md-4">
            
                          <div class="form-group">
            
                            <label for="barrio" class="control-label">Barrio</label>
            
                            <input type="text"  id="barrio" name="barrio"  class="form-control text-capitalize"  value="{{$id_cliente->barrio}}" 
                             required autocomplete="off">
            
                            <div class="alert-message" id="barrioError"></div>
            
                          </div>
                        </div>
            
            
            
                        <div class="col-md-12">
            
                          <div class="form-group">
            
                            <label for="email" class="control-label">Email</label>
            
                            <input type="email" name="email" class="form-control" id="email"  value="{{$id_cliente->email}}"  autocomplete="off">
              
                              <div class="alert-message" id="emailError"></div>
            
                          </div>
                        </div>
            
                      </div>
            
            
            
            
                      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->
                  
            
                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

                 <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>  
                  
            
                  <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->
            
                  <div class="modal-footer">
            
                    <button type="submit" id="editar_cliente" name="editar_cliente" class="btn btn-primary">Guardar</button>
                    <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            
                  </div>
            
                </div>
              </div>
            </div>
            
        </form>
   </div>
        
        
</div>
                



 
 <!--=====================================

 CREAR CONTROL MÉDICO

======================================-->

<div class="modal fade" id="modalControlMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


            <div class="modal-dialog modal-lg">
              
              <div class="modal-content">
              
              <div class="modal-header">
                
              <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Crear control médico </h5>

              <div class="col-6 align-items-center" style="font-size: small;">
                      <div  id="datos_historia_clinica">
                        <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5> 
                             <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a> 
                            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                      </div>
                  </div>
                  
              
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button>

                  
                    </button>
                
                  </div>
            
                  <div class="modal-body">
            
            
                    <form method="POST" id="form_control_medico" action="{{ url('/crear_control') }}" >
            
                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->
                   
            
                      <div class="row">
            
                        <div class="col-md-3">
            
                          <div class="form-group"  >
            
                            <label for="num control" class="control-label">Núm. control</label>
            
            
                            <input type="number" name="num_control" class="form-control" id="num_control"  autofocus required autocomplete="off">
            
                          
                            <div class="alert-message" id="numControlError"></div>
                              
                          </div>
            
                        </div>
            
            
            
                        <div class="col-md-3">
            
                          <div class="form-group">
            
                            <label for="peso" class="control-label">Peso</label>
            
                            <input type="number" name="peso" class="form-control" id="peso" required autocomplete="off">
            
                              <div class="alert-message" id="pesoError"></div>
                            
                          </div>
                        </div>
            
            
                        <div class="col-md-3">
            
                          <div class="form-group">

                            <label for="abd" class="control-label">ABD</label>


                            <input type="number" class="form-control" id="abd" name="abd" required >
                         
                            <div class="alert-message" id="ABDError" ></div>
                              
                          </div>
                        </div>

                       


                        <div class="col-md-3">
            
                            <div class="form-group">

                              <label for="grasa" class="control-label">Grasa</label>


                              <input type="number" name="grasa" class="form-control" id="grasa"  autocomplete="off">

                            
                              <div class="alert-message" id="grasaError"></div>
                                
                            </div>
                       </div>
                         
            
            
                        <div class="col-md-3">
                          <div class="form-group">
            
                            <label for="agua" class="control-label">Agua</label>
            
                            <input type="number" name="agua" class="form-control" id="agua"  required autocomplete="off">
                            
                              <div class="alert-message" id="aguaError"></div>
                                        
                            </div>
                        </div>
                         
                      </div>
            
            
            
            
                      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->
                  
            
                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

                 <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>  
                  
            
                  <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->
            
                  <div class="modal-footer">
            
                    <button type="submit" id="crear_control_clinico" name="crear_control_clinico" class="btn btn-primary">Guardar</button>
                    <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            
                  </div>
            
                </div>
              </div>
            </div>
            
        </form>
   </div>
        
        
</div>
                





 <!--=====================================

   EDITAR CONTROL MÉDICO

======================================-->

<div class="modal fade" id="modalEditarMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


            <div class="modal-dialog modal-lg">
              
              <div class="modal-content">
              
              <div class="modal-header">
                
              <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar control médico </h5>

              <div class="col-6 align-items-center" style="font-size: small;">
                      <div  id="datos_historia_clinica">
                        <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5> 
                             <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a> 
                            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                      </div>
                  </div>
                  
              
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button>

                  
                    </button>
                
                  </div>
            
                  <div class="modal-body">
            
            
                    <form method="POST" id="form_control_medico" action="{{ url('/crear_control') }}" >
            
                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->
                   
            
                      <div class="row">
            
                        <div class="col-md-3">
            
                          <div class="form-group"  >
            
                            <label for="num control" class="control-label">Núm. control</label>
            
            
                            <input type="number" name="num_control" class="form-control" id="num_control" value="{{ $id_cliente->num_control }}" autofocus required autocomplete="off">
            
                          
                            <div class="alert-message" id="numControlError"></div>
                              
                          </div>
            
                        </div>
            
            
            
                        <div class="col-md-3">
            
                          <div class="form-group">
            
                            <label for="peso" class="control-label">Peso</label>
            
                            <input type="number" name="peso" class="form-control" id="peso" value="{{ $id_cliente->peso }}" required autocomplete="off">
            
                              <div class="alert-message" id="pesoError"></div>
                            
                          </div>
                        </div>
            
            
                        <div class="col-md-3">
            
                          <div class="form-group">

                            <label for="abd" class="control-label">ABD</label>


                            <input type="number" class="form-control" id="abd" name="abd" value="{{ $id_cliente->abd }}" required >
                         
                            <div class="alert-message" id="ABDError" ></div>
                              
                          </div>
                        </div>

                       


                        <div class="col-md-3">
            
                            <div class="form-group">

                              <label for="grasa" class="control-label">Grasa</label>


                              <input type="number" name="grasa" class="form-control" id="grasa" value="{{ $id_cliente->grasa }}" autocomplete="off">

                            
                              <div class="alert-message" id="grasaError"></div>
                                
                            </div>
                       </div>
                         
            
            
                        <div class="col-md-3">
                          <div class="form-group">
            
                            <label for="agua" class="control-label">Agua</label>
            
                            <input type="number" name="agua" class="form-control" id="agua" value="" required autocomplete="off">
                            
                              <div class="alert-message" id="aguaError"></div>
                                        
                            </div>
                        </div>
                         
                      </div>
            
            
            
            
                      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->
                  
            
                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

                 <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>  
                  
            
                  <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->
            
                  <div class="modal-footer">
            
                    <button type="submit" id="crear_control_clinico" name="crear_control_clinico" class="btn btn-primary">Guardar</button>
                    <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            
                  </div>
            
                </div>
              </div>
            </div>
            
        </form>
   </div>
        
        
</div>
                






<!--  =======================================

MODAL DATATABLE CONTROLES MEDICOS

============================================-->


<div class="modal" id="modalVerControlesMedicos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list mr-3"></span>Listado de controles realizados</h5>
                        <div class="col-6 align-items-center" style="font-size: small;">
                            <div  id="datos_historia_clinica">
                                <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
                                    <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
                                  <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
                                  <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
                            </div>
                        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
                   
 <div class="row">
   <div class="col-lg-12">
           
             
               <table id="Table_control_medico" class="table  table-hover" width="100%">
                   <thead>
                      <tr>
                                        
                         <th>Número</th>                
                         <th>Fecha</th>
                         <th>Peso</th>
                         <th>ABD</th>
                         <th>grasa</th>
                         <th>Agua</th>
                         <th></th>
                      </tr>

                  </thead>

                        <tbody>
                       
                        </tbody>    

                   
              </table>

              </div>       
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
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


<script>
   
    $('.select2-multiple').select2({
      
      allowClear: true,
      placeholder: "Seleccione una opción",

});
 </script>





<!-- =======================================

CALCULO DE LA EDAD DEL CLIENTE 

=========================================== -->


<script>

$('#fecha_nacimiento1').blur(function()
        {
          document.getElementById('edad1').value = 0;
         
            var fecha = new Date(document.getElementById('fecha_nacimiento1').value);
            var hoy = new Date();
            var edad = Math.floor((hoy-fecha)/(365.25*24*60*60*1000));
            document.getElementById('edad1').value = edad +' ' +'Años';
           document.getElementById('fecha_nacimiento').value = document.getElementById('fecha_nacimiento1').value;
        });

</script>





<script>

$('#fecha_nacimiento1').focus(function()
        {
          document.getElementById('edad').value = '';
         
            var fecha = new Date(document.getElementById('fecha_nacimiento1').value);
            var hoy = new Date();
            var edad = Math.floor((hoy-fecha)/(365.25*24*60*60*1000));
            document.getElementById('edad').value = edad +' ' +'Años';
           document.getElementById('fecha_nacimiento').value = document.getElementById('fecha_nacimiento1').value;
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



<!-- ==========================================

DESHABILITAR TECLAS CRTL, U, F12

===============================================  -->

<script type="text/javascript">
   $(document).keydown(function (event) {
    if (event.keyCode == 123) { 
        return false;
    }
});
</script>


<script>

$('#modalVerControlesMedicos').on('shown.bs.modal', function () {
   var table = $('#Table_control_medico').DataTable();
   table.columns.adjust();
});


</script>





<!-- ========================================== 

DETERMINAR VALOR DE CHECKBOX ESTERILIZADO

=============================================== -->

<script>

   
   $(document).on('click', '#esterilizado', function(event) { 
  if (this.checked == true) {
    $("#esterilizado").val("Esterilizado");
  }
  else {
    $("#esterilizado").val("No esterilizado");
  }
});



</script>






<script type="text/javascript">

let today = new Date();


 $('#clock').countdown('2022/07/21')
.on('update.countdown', function(event) {
 // var format = '%H:%M:%S';
  if(event.offset.totalDays > 0) {
    format = 'Falta' +' ' +  '%-d día' +' '+'para vencer el periodo ';
  }
/*
  if(event.offset.weeks > 0) {
    format = '%-w semana%!w ' + format;
  }
*/

  $(this).html(event.strftime(format));
})
.on('finish.countdown', function(event) {
  $(this).html('El periodo de prueba ha terminado!')
    .parent().addClass('disabled');

});
</script>





 <!-- =========================================

 MOSTRAR DATOS HISTÓRIA CLINICA

==============================================  -->



<script type = "text/javascript" >
  
  $(document).ready(function() {

     $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let id =$('#id_cliente').val();
 

    let table =  $('#Table_historia_clinica').DataTable({
  
           processing: true,
           serverSide: true,
           paging: false,
           info: false,
           filter: false,
           responsive: true,
           autoWidth: false,
    
          
           type: "GET",

           ajax: '/historia_clinica/'+id,
   
   
                 
           columns: [
                   
                  
                    { data: 'estatura', name: 'estatura' },         
                    { data: 'peso_inicial', name: 'peso_inicial' },     
                    { data: 'imc', name: 'imc' },
                    { data: 'abd_inicial', name: 'abd_inical' },
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
    
             "language": {
                
              /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */
                        

            
        
        "emptyTable": "El paciente no tiene história clínica registrada.",
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


//==================================================

// AGREGAR HISTORIA CLINCIA

// ==================================================




$('#form_crear_historia_clinica').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#agregar_historia') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

        $('#agregar_historia').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "/crear_historia",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

            //  table.ajax.reload();

            location.reload(true);
               
               
                $('#form_crear_historia_clinica')[0].reset();
                $('#modalAgregarHistoriaClinica').modal('hide');
                                                      

                toastr["success"]("História clinica creada correctamente.");
              


            }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.");
          }

    });



// =======================================

// EDITAR HISTORIA CLINICA

// ======================================

$('#form_editar_historia_clinica').off('submit').on('submit', function (e) {
           
           e.preventDefault();
 
             let id = $('#id_cliente').val();
 
            // Update Data
 
         $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
 
                       
 /* Configurar botón submit con spinner */
 
         let btn = $('#editar_cliente') 
         let existingHTML =btn.html() //store exiting button HTML
         //Add loading message and spinner
         $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
 
         setTimeout(function() {
           $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
         },5000) //5 seconds
 
        
 
             $.ajax({
                
                 url: '/editar_historia/' +id,
                 type: "POST",
                 data: $(this).serialize(),
                 dataType: "json",
 
                 success: function (data) {
 
                   table.ajax.reload();
 
                  // $('#form_editar_cliente')[0].reset();
                   $('#modalEditarHistoriaClinica').modal('hide');
                   $("#editar_cliente"). attr("disabled", true);
                      //   $('#agregar_cliente').attr('disabled', true);
                         toastr["success"]("los datos se han editado correctamente");
                      
                        
                 },
                 error:function(error){
                     console.log(error);
                 }
             });
         });




// ======================================= 

//  ELIMINAR HISTÓRIA CLÍNICA 

// ========================================= 


$('body').on('click', '.deletePost', function (e) {


  let id = $(this).data("id_historia_clinica");

    e.preventDefault();
    
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
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                  type: 'delete',
                  url: '/eliminar_historia/'+id,
                   
                   
                    success: function (data) {

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

        }, function (dismiss) {
            return false;
        })

      });

    });




 /*

 let id = $(this).data("id");

e.preventDefault();

      $.ajax({
          type: 'delete',
          url: '/eliminar_mascota/'+id,
                
                  
          success: function (data) {

            table.ajax.reload();
            toastr["success"]("Mascota eliminada correctamente.");
            
          }
      });

    
  });


});

*/


</script>



<!--

<script type="text/javascript">
   
   $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

     $('#form_crear_historia_clinica').on('submit', function(event) {

     event.preventDefault();

 
/* Configurar botón submit con spinner */

        let btn = $('#agregar_mascota') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds


             
        $('#mascotaError').text('');
        $('#especieError').text('');
        $('#razaError').text('');
        $('#sexoError').text('');
        $('#colorError').text('');
        $('#pesoError').text('');
        $('#esterilizadoError').text('');
        $('#caracteristicasError').text('');
                 
            $.ajax({
              url: "/mascotas",
              method: "POST",
              data: $(this).serialize(),
              dataType: "json",
              success: function(data) {

           
                 /* 
                    
                var trHTML = '';
                  $.each(data, function (key,value) {
                    trHTML += 
                        '<tr><td style="display:none">' + value.id_cliente + 
                        '</td><td>' + value.especie + 
                        '</td><td>' + value.raza + 
                        '</td><td>' + value.edad + 
                      
                        '</td></tr>';     
                  });

                    $('#table_mascotas #lista_mascotas').append(trHTML);

                */
                   
              
                  location.reload(true);

              //  $('#table_mascotas').html(data);
                
                                      
                            
                    
                        $('#form_crear_historia_clinica')[0].reset();
                        $('#modalAgregarHistoriaClinica').modal('hide');
                     //   $('#agregar_cliente').attr('disabled', true);

                    // $('#table-body').html(data);
                       
                        toastr["success"]("los datos se han guardado correctamente");

            
                        
                          

                  },

                  error: function(response) {
                    $('#mascotaError').text(response.responseJSON.errors.mascota);
                    $('#especieError').text(response.responseJSON.errors.especie);
                    $('#razaError').text(response.responseJSON.errors.raza);
                    $('#sexoError').text(response.responseJSON.errors.sexo);
                    $('#colorError').text(response.responseJSON.errors.color);
                    $('#pesoError').text(response.responseJSON.errors.peso);
                    $('#esterilizadoError').text(response.responseJSON.errors.esterilizado);
                    $('#caracteristicasError').text(response.responseJSON.errors.caracteristicas);
                }



                
              });

          });

      });    

    

  </script>

    -->


<!-- =========================================

EDITAR DATOS DEL PACIENTE

==============================================  -->

<script>
    $(document).ready(function() {
      
      $('#form_editar_cliente').off('submit').on('submit', function (e) {
           
          e.preventDefault();

            let id = $('#id_cliente').val();

           // Update Data

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

                      
/* Configurar botón submit con spinner */

        let btn = $('#editar_cliente') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds

       

            $.ajax({
               
                url: '/editarCliente/' +id,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",

                success: function (data) {
                 // $('#form_editar_cliente')[0].reset();
                  $('#modalEditarCliente').modal('hide');
                  $("#editar_cliente"). attr("disabled", true);
                     //   $('#agregar_cliente').attr('disabled', true);
                        toastr["success"]("los datos se han editado correctamente");
                     
                        location.reload(true);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

    });

</script>






 <!-- =========================================

DATATABLE CONTROL MÉDICO

==============================================  -->



<script type = "text/javascript" >
  
  $(document).ready(function() {

     $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let id =$('#id_cliente').val();
 

    let table =  $('#Table_control_medico').DataTable({
  
           processing: true,
           serverSide: true,
           paging: false,
           info: false,
           filter: false,
           responsive: true,
           autoWidth: false,
            
           type: "GET",

           ajax: '/listado_controles/'+id,
                      
           columns: [
                       
                    { data: 'num_control', name: 'num_control' },    
                    { data: 'created_at', name: 'created_at' },         
                    { data: 'peso', name: 'peso' },     
                    { data: 'abd', name: 'abd' },
                    { data: 'grasa', name: 'grasa' },
                    { data: 'agua', name: 'agua' },

                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
    
             "language": {
                
              /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */
                        

            
        
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
 
    table.columns.adjust().draw();

//==================================================

// CREAR CONTROL MÉDICO

// ==================================================




$('#form_control_medico').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#crear_control_clinico') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

        $('#crear_control_clinico').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "/crear_control",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

            
               
               
                $('#form_control_medico')[0].reset();
                $('#modalControlMedico').modal('hide');

              //  table.ajax.reload();
                
              location.reload(true);
               

                toastr["success"]("Control médico creada correctamente.");
              


            }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.");
          }

    });

  });



</script>





<!-- =========================================

ELIMINAR DATOS DE MASCOTA

==============================================  -->

<script>

$(document).on('click', '.eliminar_mascota', function (event) {
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
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'post',
                    url: '/eliminar_mascota/' +id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

                      if (data.success === true) {
                            swal("Registro eliminado correctamente!", data.message, "success");
                           location.reload(true);
                         //  $('#table_mascotas').html(data);
                        
                
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
      });

    


</script>






<!-- ================================================

 FUNCIÓN FOCUS PARA PRIMER INPUT modalEditarCliente

 ================================================= -->


 <script>

$(document).ready(function() {
    $('#modalAgregarHistoriaClinica').on('shown.bs.modal', function () {
    $('#estatura').focus();
   // $('#agregar_cliente').attr('enabled','enabled');

  });
});

</script>




<!-- ============================================

 FUNCIÓN LISTADO DE MASCOTAS 

 ================================================ -->

 <script>

/*

function getlist_mascotas() {
      let $card = $('#card_mascotas');
      let $table = $card.find('#Table_mascotas');
      $card.find('.loader_icon').addClass('loader');
      $.getJSON("/listado_mascotas", {id_cliente:id_cliente}, function (data) {
        let list = [];
        $.each(data, function (key, val) {
          list.push(val);
       
        });

      });
    }   

        $table.find('tbody').html(list);
*/

 </script>



<!-- ============================================

 FUNCIÓN ESTADO DE TIEMPO DE PRUEBA DE SOFTWARE

 ================================================ -->


<script>

$(document).ready(function() {


function estado_prueba() {
    let fecha_termino = '2022-05-19';
    let prueba = '0';
    let estado = '1';

    let dias_restantes = diff_days(fecha_termino);
    if (estado == 1) {
      $('#navbar_estado').addClass('text-warning');
      if (prueba == 1) {
        $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' días de prueba');
        $('#navbar_estado').show();
      } else {
        if (dias_restantes <= -25) {
          $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' para desactivación. Haga click para renovar.');
          $('#navbar_estado').addClass('text-danger');
          $('#navbar_estado').show();
        } else if (dias_restantes <= -7) {
          $('#navbar_estado').html('El pago de su plan se encuentra atrasado. Haga click aquí para para renovar.');
          $('#navbar_estado').show();
        }
      }
    } else {
      $('#navbar_estado').html('Su plan se encuentra desactivado, haga click para activar');
      $('#navbar_estado').show();
    }
  }

});

</script>




<!-- ================================= 

RESET SELECT2: selectBuscarCliente

================================= -->


<script>
 $('.selectBuscarCliente').select2({
  //  allowClear: true,
    placeholder: 'Buscar cliente...',
    language: "es",
    minimumInputLength: 3,
    

    
    ajax: {
      
      url: '/ajax-autocomplete-search',

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
      
       
        
       
       // $('.selectBuscarCliente').find(':selected').text();

      // $('#selectBuscarCliente :selected').text();

             
      },


      cache: true,

    }

    

  });


</script>





<!-- ============================================

 FUNCIÓN FOCUS PARA PRIMER INPUT ModalCrearMascotas

 ================================================ -->


 <script>

$(document).ready(function() {
    $('#modalAgregarHistoriaClinica').on('shown.bs.modal', function () {
    $('#nombreMascota').focus()
  });
});

</script>


<!-- ============================================

 FUNCIÓN Edit

 ================================================ -->


 <script>

/*

$('#edit').on('click', function () {
        let id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: '/editarCliente',
            data: { id_cliente: id_cliente },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id_cliente').val(res.id_cliente);
              $('#title').val(res.title);
              $('#code').val(res.code);
              $('#author').val(res.author);
           }
        });
    });

*/

</script>




<!--  ============================================

EDIATAR DATOS DE CLIENTES

================================================= -->

<!-- 

<script>

$(document).ready(function() {

  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   

$('#cedula').editable({
                mode:'inline',  
                url: 'editarCliente/{id_cliente}',
                title: "Cédula del cliente",
                pk: cliente.id_cliente,
                value: cliente.cedula,
                type: 'text',
                emptytext: 'Sin indicar',
                placement: "right",
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'Falta ingresar valores';
                    }
                },
                success: function (response, newValue) {
                    $('#cedula').attr("href", 'Céd:' + newValue);
                }
            });


 

            $('#nombre').editable({
                mode:'inline',  
                url: 'editarCliente/{id_cliente}',
                title: "Cédula del cliente",
                pk: cliente.id_cliente,
                value: cliente.nombre,
                type: 'text',
                emptytext: 'Sin indicar',
                placement: "right",
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'Falta ingresar valores';
                    }
                },
                success: function (response, newValue) {
                    $('#nombre').attr("href", 'Nom:' + newValue);
                }
            });



     });

    -->

</script>





<!-- ============================================

 FUNCIÓN X-EDITABLE BOOTSTRAP

 ================================================ -->


 <script>


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

 

$.fn.editable.defaults.mode = 'inline';

  $('.nombre').editable({
      url: 'editarCliente/'+id_cliente,
      pk: id,
      type:"text",
      validate:function(value){
        if($.trim(value) === '')
        {
          return 'This field is required';
        }
      }
    });



</script>





@endsection
