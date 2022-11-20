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

ul.datos_mascota li {
   display: inline;
  }

  .tippy-popper .tippy-tooltip {
            max-width: 350px;
            width: initial;
        }

        .tippy-popper[x-placement^='top'] {
            margin-bottom: 0px;
        }

        .tippy-popper[x-placement^='bottom'] {
            margin-top: 0px;
        }

        .tippy-popper[x-placement^='left'] {
            margin-bottom: 16px;
        }

        .tippy-popper[x-placement^='right'] {
            margin-bottom: 16px;
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


  <!-- ============================= 

  NAVBAR BOTONES  SUPERIORES

===================================== -->

 
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            ☰
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex flex-wrap">
                <li id="li_esperaAtencion1" class="nav-item py-2 mr-2">
                    <a href="javascript:nu_Cola('117713');" class="btn btn-outline-info btn-sm">
                        <span class="fas fa-paw mr-1" aria-hidden="true"></span> Estado de atención
                    </a>
                </li>
                <li class="nav-item py-2 mr-2">
                    <a href="#" id="estado_hospital" tabindex="0" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-hospital mr-2"></i> <span>Hospitalizar</span>
                    </a>
                </li>
                <li class="nav-item py-2 mr-2">
                    <a href="#" id="estado_seguimiento" tabindex="0" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-clipboard-check mr-2"></i> <span>Seguimiento</span>
                    </a>
                </li>
                <li class="nav-item py-2 mr-2">
                    <a class="btn btn-outline-info btn-sm" href="#" id="btn_herramientas" role="button">
                        <i class="fas fa-calculator mr-2"></i>Herramientas
                    </a>
                </li>
                <li class="nav-item dropdown py-2 mr-2">
                    <a class="btn btn-outline-info btn-sm dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-print mr-2"></i> Imprimir documentos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:print_resumen();">Historial del paciente</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:getlist_documentosClinica();">Documentos
                            clínica</a>
                    </div>
                </li>

                <li class="nav-item py-2 mr-2">
                    <a class="btn btn-outline-info btn-sm" tabindex="0"
                       href="javascript:modal_cobrar();">
                        <i class="fas fa-pager mr-2"></i> Venta
                    </a>
                </li>


            </ul>
        </div>
    </nav>




  

<div class="row">
<div class="col-lg-8">
        <div class="card card-light" id="card_mascotas">
              <div class="card-header" >
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarConsultaMedica">
                   <span class="fa fa-plus-square fa-fw" ></span> Consulta médica</button>
               
                   <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarMascotas">
                   <span class="fa fa-dashboard fa-fw" ></span>Peso</button>

                   <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarMascotas">
                   <span class="fa fa-calendar fa-fw" ></span>Recordatorio</button>

                  
                      <button class="btn btn-outline-info dropdown-toggle" type="button"
                              id="dropdownMenuButton"
                              data-toggle="dropdown">Otros
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="javascript:registroCirugia();">Registro de cirugía</a>
                          <a class="dropdown-item" href="javascript:registroPeluqueria()">Registro de peluquería</a>
                          <a class="dropdown-item" href="javascript:btn_registroRapido();">Registro rápido</a>
                      </div>
                  

              </div>
              


 <div class="card-body">
              
<!-- ==========================

DATATABLE MASCOTAS

============================== -->
     
@foreach($id as $id_mascota)
          
 @endforeach


  
 <div class="row">
   <div class="col-lg-12">
           
             
               <table id="Table_mascotas" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                         <th>Mascota</th>
                         <th>Especie</th>
                         <th>Raza</th>
                         <th>Edad</th>
                         <th></th>
                      </tr>

                  </thead>

                        <tbody>
                       
                        </tbody>    

                   
              </table>
  
               
          
        
        </div> 
       </div>

        

               <input type="hidden" id="id_cliente" name="id_cliente" value="{{ $id_mascota->id }}" >  
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
                    class="fas fa-user mr-3"></span>Datos de la mascota</h3>
                    <h4  style="text-align: center;">
                          <div class="dropdown ml-auto">
                                  <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                          id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false">
                                    ☰
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    
                                      <button class="dropdown-item" type="button"
                                              id="btn_eliminarCliente">Eliminar cliente
                                      </button>
                                    
                                 </div>
                         </div>
                  </h4>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                <table class="table">
                      <tbody  style="font-size:95%;">

           
                      <tr style="display:none;">
                     
                      <td>
                          <div class="control-label">Id_mascota</div>
                          <a href="#" id="id_cliente">{{ $id_mascota->id }}</a></td>
                      </tr>

                      <tr style="display:none;">
                     
                     <td>
                       <div class="control-label">Cédula</div>
                       <a href="#" id="cedula">{{ $id_mascota->nombre }}</a></td>
                    </tr>
                    <span id="navbar_estado"></span>
                      <tr>
                        <td>
                        <div class="control-label">Nombre</div>
                          <a href="#" class="xedit" data-type="text"  data-pk="{{$id_mascota->id}}"  data-name="nombre">
		                    	   {{$id_mascota->nombre}}</a>
                          <a class=" ml-3 allign-middle" id="nombreMascota" href=""></a>
                        </td>
                      </tr>
                     
                      <tr>
                        <td>
                          <div class="control-label">Especie</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_mascota->especie}}"  data-name="especie">{{ $id_mascota->especie }}</a>
                          <a class=" ml-3 allign-middle" id="especie" href=""></a>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Raza</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_mascota->raza}}" data-name="raza">{{ $id_mascota->raza }}</a>
                          <a class=" ml-3 allign-middle" id="raza" href=""></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Sexo</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_mascota->genero}}" data-name="sexo">{{ $id_mascota->sexo }}</a>
                          <a class=" ml-3 allign-middle" id="sexo" href=""></a>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">edad</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_mascota->edad}}" data-name="barrio" id="barrio">{{ $id_mascota->edad }}</a>
                          <a class=" ml-3 allign-middle" id="edad" href=""></a>
                      </tr>
                      <tr>
                     
                      <tr>
                        <td>
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" style="text-align:left"><span class="fa fa-edit fa-fw" tabindex="3"></span> Editar cliente</button>
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

    MODAL AGREGAR MASCOTAS

======================================-->

<div class="modal fade" id="modalAgregarConsultaMedica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                    

              <div class="modal-dialog modal-xl">
                
                <div class="modal-content">
                
                    <div class="modal-header d-flex justify-content-between">
                  
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-paw mr-3"></span>Agregar consulta médica</h5>
               
                     
                    <!--
                    <ul style="list-style: none;">
                          <li style="color:coral; font:bold;">{{$id_mascota->nombre}}</li>
                      </ul>
                  
                      <ul class="datos_mascota">
                          <li>{{$id_mascota->especie}} -</li>
                          <li>{{$id_mascota->sexo}} -</li>
                          <li>{{$id_mascota->edad}}</li>
                                          
                      </ul>
                       
                    -->
                
                  
                    <div class="col-6 align-items-center" style="font-size: small;">
                            <div  id="titulo_datos_mascota">
                            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_mascota->nombre}}</a></h5>
                                <a class="mx-1 especie" style="color:black">{{$id_mascota->especie}}</a>
                                <a class="mx-1 raza" style="color:black">{{$id_mascota->sexo}}</a>
                                <a class="mx-1 edad" style="color:black">{{$id_mascota->edad}}</a>
                                <a class="mx-1 esterilizado" style="color:black">{{$id_mascota->esterilizado}}</a>
                            </div>
                        </div>



                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span>
                      </button>
                                 

                  </div>
              
                    <div class="modal-body">
              
              
                    <form method="POST" id="form_consulta_medica" action="{{ url('/consulta_medica') }}" >
                    
              
              <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
          
              <input type="hidden" name="id_mascota" class="form-control" id="id_mascota" value="{{$id_mascota->id}}" autofocus required autocomplete="off">

              <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  

              
              <div class="row">

                            <div class="col-lg-6" style="font-size:90%;">
                                <div class="form-group">
                                    <label class="font-weight-normal">Descripción / Anamnesis</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="descripcion"
                                              rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal">Hallazgos examen clínico</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="examen_clinico"
                                              rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal">Pre-diagnósticos</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="pre_diagnostico"
                                              rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal">Exámenes complementarios</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="examenes_complementarios"
                                              rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal">Diagnóstico</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="diagnostico"
                                              rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal">Tratamiento</label>
                                    <textarea style="font-size:90%;" type="text" class="form-control" name="tratamiento"
                                              rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6" style="font-size:90%;">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <button type="button" id="btn_herramientas"
                                                class="btn btn-outline-secondary mb-2 mr-2">Herramientas
                                        </button>
                                        <button type="button" id="btn_actualizarPeso"
                                                class="btn btn-outline-secondary mb-2">Actualizar peso
                                        </button>
                                        <div class="px-3">
                                            <a style="font-size:85%;"> Último registro:&nbsp</a>
                                            <p id="resena_peso" class="h5" name="resena_peso" class="text-primary" style="color:coral">
                                                {{$id_mascota->peso}}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="my-3" id="select_medico" >
                                    <div class="form-group">
                                        <label for="medico_tratante" class="control-label font-weight-normal">Médico tratante</label>
                                        <select id="medico_tratante" name="medico_tratante" class="custom-select form-control">
                                            <option value=""></option>
                                        </select><!-- select medicos -->

                                       
                                    </div>
                                </div>


                                <div class="my-3" id="select_profilaxis" >
                                    <div class="form-group">
                                        <label for="profilaxis" class="control-label font-weight-normal">Profilaxis</label>
                                        <select id="profilaxis" name="profilaxis" class="custom-select form-control">
                                            <option value=""></option>
                                        </select><!-- select medicos -->

                                       
                                    </div>
                                </div>

                                <div class="accordion" id="accordionRegistro">
                                    <div class="card" style="box-shadow: none!important;border:none;">
                                        <button type="button" class="btn btn-outline-secondary text-left mt-2"
                                                data-toggle="collapse"
                                                data-target="#collapse1"><i class="fas fa-stethoscope mr-3"></i>Parámetros
                                            examen clínico
                                        </button>
                                        <div id="collapse1" class="collapse" data-parent="#accordionRegistro">
                                            <div class="card-body">
                                                <div class="row" style="font-size:90%;">
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">T°</label>
                                                            <input type="number" name="temperatura" min="0" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label  class="font-weight-normal" data-tippy="Frecuencia cardiaca"
                                                                   tabindex=-1 >FC</label>
                                                            <input type="number" name="frecuencia_cardiaca" min="0" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal" data-tippy="Frecuencia respiratoria"
                                                                   tabindex=-1>FR</label>
                                                            <input type="number" name="frecuencia_respiratoria" min="0" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div  class="form-group">
                                                            <label class="font-weight-normal"  data-tippy="Puntos de condición corporal"
                                                                   tabindex=-1>CC</label>
                                                            <input type="number" name="cc" min="1" max="9" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal"  data-tippy="Pun tos de condición muscular"
                                                                   tabindex=-1>PCM</label>
                                                            <input type="number" name="pcm" min="1" max="9"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal"  data-tippy="Tiempo de relleno capilar" tabindex=-1>TRC</label>
                                                            <input type="number" name="trc" min="0"  class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal" >Condición dental 1-5</label>
                                                            <input type="number" name="condicion_dental" min="1" max=5 class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal" >Condición oído 1-5</label>
                                                            <input type="number" name="condicion_oido" min="1" max=5 class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal" >NL</label>
                                                            <input type="text" name="nl" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal" >PAM</label>
                                                            <input type="number" name="pam"  class="form-control">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- imagen -->
                                <div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-camera"></i></span>
                                        </div>
                                        <div class="custom-file" lang="es">
                                            <input type="file" multiple accept="image/*, application/pdf"
                                                   class="custom-file-input"
                                                   id="imagen" aria-describedby="imgupload_caso">
                                            <label class="custom-file-label" for="imgupload_caso">Subir imagen o
                                                pdf</label>
                                        </div>
                                    </div>

                                    <div id="imgsCaso" class="d-flex flex-wrap rounded container">

                                    </div>
                                </div>

                                <!-- receta -->
                                <div class="accordion">
                                    <div class="card mb-3" style="box-shadow: none!important;border:none;">
                                        <button type="button" class="btn btn-outline-secondary text-left mt-2"
                                                data-toggle="collapse"
                                                data-target="#accordion_receta"><i
                                                class="fas fa-notes-medical mr-3"></i>Receta
                                        </button>
                                        <div id="accordion_receta" class="collapse"
                                             data-parent="#accordion_recordatorio">
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <form id="formtest">
                                                        <div class="form-group">
                              <textarea autocomplete="off" style="font-size:90%;" type="text" class="form-control"
                                        name="receta"
                                        placeholder="Puede usar @ para autocompletar medicamento."
                                        rows="8"></textarea>
                                                        </div>
                                                        <div class="d-flex">
                                                            <button type="button"
                                                                    class="btn btn-sm btn-outline-success pt-2"
                                                                    id="btnprint_receta">Imprimir receta
                                                            </button>
                                                            <button type="button" style="display:none;"
                                                                    class="btn btn-sm btn-outline-success pt-2 ml-2"
                                                                    id="btn_recetaModal">Medicamentos
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="form-group">
                                                    <table class="table dt-responsive"
                                                           style="width:100%;font-size:12px;">
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                <p>
                                                    <small><a id="btn_crearFarmaco" href="#">Agregar
                                                        medicamento</a></small>
                                                </p>
                                                <p>
                                                    <small><a id="btnListaMedicamentos" href="#">Lista de
                                                        medicamentos</a></small>
                                                </p>
                                                <p><small>Puede <a href="/configuracion_c#btntab_formularios">editar</a>
                                                    el formato de la receta
                                                    desde configuración clinica/formularios. </small>
                                                </p>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- recordatorio -->
                                <div class="accordion">
                                    <div class="card mb-3" style="box-shadow: none!important;border:none;">
                                        <a href="javascript:control_add();"
                                           class="btn btn-outline-secondary text-left mt-2"><i
                                                class="fas fa-envelope mr-3"></i>Recordatorio
                                        </a>

                                        <div id="accordion_recordatorio" class="collapse"
                                             data-parent="#accordion_recordatorio">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Recordatorio</label>
                                                        </div>
                                                        <div class="col-md-9 d-flex justify-content-end">

                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- formulario -->
                                <div class="accordion">
                                    <div class="card mb-3" style="box-shadow: none!important;border:none;">
                                        <button id="btn_accformulario" type="button"
                                                class="btn btn-outline-secondary text-left mt-2"
                                                data-toggle="collapse" data-target="#accordion_formulario"><i
                                                class="fas fa-file-medical-alt mr-3"></i>Formularios
                                        </button>
                                        <div id="accordion_formulario" class="collapse"
                                             data-parent="#accordion_recordatorio">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <table class="table dt-responsive"
                                                           style="width:100%;font-size:13.5px;">
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <a href="/configuracion_c#btntab_formularios">Ir a configuración
                                                        para crear formulario</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox pr-3">
                                    <input type="checkbox" class="custom-control-input" id="chb_cirugia">
                                    <label class="custom-control-label font-weight-normal" for="chb_cirugia">Cirugía</label>
                                   
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
      <span style="display:none;">
          <div class="custom-control custom-checkbox pr-3">
              <input type="checkbox" class="custom-control-input" id="chb_seguimiento">
              <label class="custom-control-label" for="chb_seguimiento">Seguimiento</label>
          </div>
      </span>
                    <button id="btnsave_scontrol" type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div><!-- Modal CASO -->              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
                    
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_mascota->id }}" readonly>  
                    
              
                    <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->
        
                <div class="modal-footer">
        
                <button type="submit" id="agregar_mascota" name="agregar_mascota" class="btn btn-primary">Guardar</button>
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
            
            
                    <form method="POST" id="form_editar_cliente" action="{{ url('/editarCliente/id_cliente') }}" >
            
                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->
                   
                    <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{$id_mascota->id}}" autofocus required autocomplete="off">

            
                      <div class="row">
            
                        <div class="col-md-3">
            
                          <div class="form-group"  >
            
                                     
            
                        <div class="col-md-5">
            
                          <div class="form-group">
            
                            <label for="Mascota" class="control-label">Mascota</label>
            
                            <input type="text" name="mascota" class="typeahead form-control text-capitalize" id="mascota" value="{{$id_mascota->mascota}}" 
                             required autocomplete="off">
            
                              <div class="alert-message" id="nombreError"></div>
                            
                          </div>
                        </div>
            
            
            
            
                        <div class="col-md-4">
                          <div class="form-group">
            
                            <label for="Especie" class="control-label">Especie.</label>
            
                            <input type="text" name="especie" class="form-control" id="especie"  value="{{$id_mascota->especie}}"  required autocomplete="off">
                            
                              <div class="alert-message" id="celularError"></div>
                                        
                            </div>
                        </div>
            
            
                        <div class="col-md-8">
            
                            <div class="form-group">
            
                              <label for="Raza" class="control-label">Raza</label>
            
                              <input type="text" name="raza" class="form-control text-capitalize" id="raza"  value="{{$id_mascota->raza}}" 
                              required onkeypress="return isNumber(event)">
            
                                <div class="alert-message" id="razaError"></div>
            
                            </div>
            
                        </div>
            
            
               
                      
            
                        <div class="col-md-4">
            
                          <div class="form-group">
            
                            <label for="Sexo" class="control-label">Sexo</label>
            
                            <input type="text"  id="sexo" name="sexo"  class="form-control text-capitalize"  value="{{$id_mascota->sexo}}" 
                             required autocomplete="off">
            
                            <div class="alert-message" id="generoError"></div>
            
                          </div>
                        </div>
            
            
            
                        <div class="col-md-12">
            
                          <div class="form-group">
            
                            <label for="Edad" class="control-label">Edad</label>
            
                            <input type="text" name="edad" class="form-control" id="edad"  value="{{$id_mascota->edad}}"  autocomplete="off">
              
                              <div class="alert-message" id="edadError"></div>
            
                          </div>
                        </div>
            
                      </div>
            
            
            
            
                      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->
                  
            
                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
                  
            
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
                



<!--  =======================================

MODAL TRASPASAR MASCOTA A OTRO CLIENTE

============================================-->

<div class="modal" id="modalTraspasarMascota" class="modal fade" role="dialog" style="overflow:hidden;">


  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

      
        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-paw mr-3"></span>Traspasar mascota a otro propietario</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>
      </div>

      <div class="modal-body">
       
                 @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                 @endif
                        
                    <form method="POST" id="form_lista_espera" action="{{ url('/ajax-autocomplete-search') }}" >
                    
              
                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
          
              
              
                <div class="row">

                     <div class="col-6">

                              <div class="form-group">
                                                         
              
                                <select class="selectBuscarCliente"  name="selectBuscarCliente" id="selectBuscarCliente" style="width:100%;" required>   </select>
                                   
                     
              
                              </div>
                        </div>


      </div>
      <div class="modal-footer">

         <button type="button" class="btn btn-primary">Guardar</button>

         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        

        </form>
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



<!-- ========================================

TIPPY TOOLTIP

============================================== -->

<script>


tippy.setDefaults({
    theme: 'reviews',
    placement: 'top',
    animation: 'scale',
    animateFill: false,
    maxWidth: 240,
    duration: 0,
    arrow: false,
        
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



<!-- ==============================

MOSTRAR PESO ACTUAL DE MASCOTA

=================================== -->

<script>
$(document).ready(function () {

let ultimo_valor = valores[valores.length - 1];
    if (ultimo_valor) {
        $('[id="resena_peso"]').html(ultimo_valor + " kgs.");
        $('#hidden_peso').val(ultimo_valor);
    } else {
        $('[id="resena_peso"]').html("Sin peso registrado");
    }
  });

</script>





<!-- =============================  

CALCULAR TIEMPO PERIODO DE PRUEBA

================================== -->



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

 MOSTRAR MASCOTAS

==============================================  -->



<script type = "text/javascript" >
  
  $(document).ready(function() {

     $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let id =$('#id_cliente').val();
 

    let table =  $('#Table_mascotas').DataTable({
  
           processing: true,
           serverSide: true,
           paging: false,
           info: false,
           filter: false,
           responsive: true,
           autoWidth: false,
    
          
           type: "GET",

           ajax: '/listado_mascotas/'+id,
   
   
                 
           columns: [
                   
                  
                    { data: 'nombre', name: 'nombre' },         
                    { data: 'especie', name: 'especie' },     
                    { data: 'raza', name: 'raza' },
                    { data: 'edad', name: 'edad' },
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
    
             "language": {
                
              /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */
                           
                "emptyTable": "El cliente no tiene mascotas registradas."
                    
                },
       
     
      
    });


//==================================================

// AGREGAR MASCOTA

// ==================================================




$('#form_crear_mascotas').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#agregar_mascota') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

        $('#agregar_mascota').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "/mascotas",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

              table.ajax.reload();
               
               
                $('#form_crear_mascotas')[0].reset();
                $('#modalAgregarMascotas').modal('hide');
                                                      

                toastr["success"]("Mascota creada correctamente.");
              


            }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.");
          }

    });






// ======================================= 

//  ELIMINAR MASCOTA 

// ========================================= 


$('body').on('click', '.deletePost', function (e) {


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
     
          }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                  type: 'delete',
                  url: '/eliminar_mascota/'+id,
                   
                   
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

     $('#form_crear_mascotas').on('submit', function(event) {

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
                
                                      
                            
                    
                        $('#form_crear_mascotas')[0].reset();
                        $('#modalAgregarMascotas').modal('hide');
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

EDITAR DATOS DEL CLIENTE
==============================================  -->

<script>
    $(document).ready(function() {
      
      $('#form_editar_cliente').off('submit').on('submit', function (e) {
           
          e.preventDefault();

          //  let id_cliente = $('#id_cliente').val();

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
               
                url: '/editarCliente/' +id_cliente,
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
    $('#modalEditarCliente').on('shown.bs.modal', function () {
    $('#cedula').focus();
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
    $('#modalAgregarMascotas').on('shown.bs.modal', function () {
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




<!-- =========================================

MOSTRAR DATOS DE CLIENTES

==============================================  -->

<script>

$(document).ready(function () {

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

let id = $('#id_cliente').val();

 
 $.ajax({
           url: 'cliente/'+id, 
           type: 'GET',
          
                   
           success: function (data) {
                       
                      let tr;
                        
                      for (var i = 0; i < data.length; i++) {
                          tr = $('<tr>'); // remove slash from here
                          tr.append("<td>" + data[i].nombre + "</td>");
                          tr.append("<td>" + data[i].especie + "</td>");
                          tr.append("<tr/>"); 
                          $('listaClientes').append(tr);
                         
                      }
                       
                                    
               
                 
                }
                                
       });   



/*
 
 var myArray = []
	
 let id =2;

	$.ajax({
		method:'GET',
		url:'/clientes/'+id,
		success:function(response){
			myArray = response.data
			buildTable(myArray)
			console.log(myArray)
		}
	});



	function buildTable(data){
		var table = document.getElementById('myTable')

		for (var i = 0; i < data.length; i++){
			var row = `<tr>
                  <div>Cédula
						       	<td>${data[i].cedula}</td>
                  </div>  
                 </tr>
                 <tr>
							     <td>${data[i].nombre}</td>
                 </tr>
						      	<td>${data[i].celular}</td>
                <tr>
              <td>${data[i].email}</td>
              <td>${data[i].direccion}</td>
              <td>${data[i].barrio}</td>
              <td>${data[i].barrio}</td>
					  </tr>`
			table.innerHTML += row


		}
	}

  */


});
          
</script>





<!--  ============================================

EDIATAR DATOS DE CLIENTES

================================================= -->

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
