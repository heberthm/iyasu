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

  .has-error {
    border-color: #cc0000;
    background-color: #ffff99;
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


  .mostrar_inputs {
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


  .popover {
    pointer-events: none;
  }
</style>


<br>



<div class="container-fluid">


  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-bar-chart mr-3"></span>Datos estadísticos</h3>


    </div>


    <div class="card-body">


    <div class="row">

<div class="col-lg-3 col-6">

  <div class="small-box bg-info">
    <div class="inner">
         
      <h5>{{ number_format($clientes,  0, ",", "." ) }}</h5>

      <p>Total pacientes atendidos</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-success">
    <div class="inner">

      <h5>{{ number_format($suma_tratamientos,  0, ",", "." ) }}</h5>

      <p>Total Ingresos</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
   <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-warning">
    <div class="inner">

      <h5>{{ number_format($ingresos_hoy,  0, ",", "." ) }}</h5>

      <p>Total ingresos hoy</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
  <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
  </div>
</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-danger">
    <div class="inner">

      <h5>{{ number_format($clientes_hoy,  0, ",", "." ) }}</h5>

      <p>Total pacientes atendidos hoy</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
 <!--   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
  </div>
</div>

</div>





      <div class="card card-second">
        <div class="card-header">
          <h3 class="card-title">Gráfico de tratamientos realizados por mes</h3>
          
        </div>
        <div class="card-body">

          <div id="container"></div>

         </div>

      </div>



    </div>
  </div>
</div>





<!-- ========================================

MOSTRAR SPINNER AL CARGAR PAGINA

========================================== -->


<script type="text/javascript">
  $(window).on('load', function() {
    setTimeout(function() {
      $(".loader-page").css({
        visibility: "hidden",
        opacity: "0"
      })
    }, 1000);

  });
</script>





<!-- ========================================

GENRAR GRAFICO 

========================================== -->


<script type="text/javascript">
 
 var users =  <?php echo json_encode($registros) ?>;
   
   Highcharts.chart('container', {

        chart: {
          type: 'column'
        },

       title: {
           text: 'New User Growth, 2019'
       },
       subtitle: {
           text: 'fuente: centro olístico iyasu.'
       },
        xAxis: {
           categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
       },
       yAxis: {
           title: {
               text: 'Number of New Users'
           }
       },
       legend: {
           layout: 'vertical',
           align: 'right',
           verticalAlign: 'middle'
       },
       plotOptions: {
           series: {
               allowPointSelect: true
           }
       },
       series: [{
           name: 'New Users',
           data: users
       }],
       responsive: {
           rules: [{
               condition: {
                   maxWidth: 500
               },
               chartOptions: {
                   legend: {
                       layout: 'horizontal',
                       align: 'center',
                       verticalAlign: 'bottom'
                   }
               }
           }]
       }
});

</script>




@endsection