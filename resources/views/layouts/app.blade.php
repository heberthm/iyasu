<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


   
<!-- Spinner loader -->  
<link href="{{asset('css/loader.css')}}" rel="stylesheet"/>


   
<!-- DataTable css -->
   <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 


   
<!-- Font-awesome css -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>  


         

    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet" />
   

<!-- SweetAlert2 -->
    <link href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"  rel="stylesheet" />
    
 
<!-- Select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  
  <!-- Fullcalendar 3.10.2 css --> 
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' />



<!-- Toastr css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


          
<!-- x-editable-bs4 css -->


<link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/x-editable-bs4@1.5.5/dist/bootstrap4-editable/css/bootstrap-editable.css"> 

      <!--  <link href="{{asset('css/bootstrap-editable.css')}}" rel="stylesheet"/> -->


<!-- SweetAlert2 -->
 <link href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"  rel="stylesheet" /> 
 

<link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>

  

    
  <!-- Fullcalendar 3.10.2 css --> 
<!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' /> -->
<!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' /> -->


<!-- DataPicker Bootstrap js -->  
<link href="{{asset('css/bootstrap-datepicker1.9.0.css')}}" rel="stylesheet"/>


<!-- Toastr css -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> 
<!-- <link href="{{asset('css/toastr2.1.3.min.css')}}" rel="stylesheet"/> -->


 <!-- tippy.css -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tippy.js@4.3.1/themes/google.css"
          integrity="sha256-mTkzfXLTKZmfwr8GdvnpDKWH6pohAu6TBMlyarkUjPE=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tippy.js@4.3.1/themes/light.css"
          integrity="sha256-Z8l5LwKwMxh3/74PQ3iea+z3IF7nTN9CP5A1S5Es2bE=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tippy.js@4.3.5/themes/light-border.css"
          integrity="sha256-cpXbUNk+V/EXxqmcyU0BJe8eEFURwIYi+CTmJseXFwU=" crossorigin="anonymous">
 




          
<!-- =============================

ARCHIVOS JS

================================== -->


<!-- Jquery 3.5 js -->
<script src='https://code.jquery.com/jquery-3.6.1.min.js'></script>



<!-- popper 2.11.2 js -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.2/umd/popper.min.js'></script>


<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<!-- Font-awesome css -->
<script src="https://kit.fontawesome.com/d57c775029.js" crossorigin="anonymous"></script>


<!--  tippy js -->
<script src="https://cdn.jsdelivr.net/npm/tippy.js@6.3.7/dist/tippy.cjs.min.js"></script>

 
<!-- DataTable js -->
<script src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'  defer ></script>

<script src='https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js'  defer ></script>

<script src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js'  defer ></script>

<script src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js' defer></script>

<script src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js' defer></script>



<!-- Fullcalendar 3.10 js -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js' defer></script>



<!-- Moment 2.24 js -->
<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js' ></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js' defer></script>

 
<!-- Select2 js -->  
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.min.js" ></script>  

<!-- Tidio js --> 
<!-- <script src="//code.tidio.co/zffhz4jdjbaro6re8swf82onrcpo6ojy.js" async></script> -->

<!-- Jquery countdowm -->
<script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
 

<!--  Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>





<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@yield('third_party_stylesheets')

@stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="loader-page"></div>


<div class="wrapper">
<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

       
        <li style="width:auto">
             <!-- SELECT DE BUSQUEDAD EN BARRA DE MENU  -->
       <!--      
             <select class="livesearch form-control" id="livesearch_1" name="livesearch_1" style="width: 100%;"></select>
         </li>

       -->

    </ul>


    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
    </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> &nbsp;
                    <img src="../img/avatar4.png"
                     class="user-image img-circle elevation-2" alt="User Image"> 
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="../img/avatar4.png"
                         class="img-circle elevation-2"
                         alt="User Image">
                    <p>
                        {{ Auth::user()->name }}
                        <small>Registrado desde:  {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    <a href="#" class="btn btn-default btn-flat float-right"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>


    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 - <?php echo date("Y") ?> <a href="#">hemTech</a>.</strong> Todos los derechso reservados. </footer>
</div>




 <script src="{{ mix('js/app.js') }}"></script>


 <!-- ================================================

   SELECT2 - BUSCAR - CLIENTE
   
  ================================================  -->


<script type="text/javascript">
    
  $('.livesearch_1').select2({
    placeholder: 'Buscar cliente por nombre...',
    language: "es",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
      // url: '/ajax-autocomplete-search',

      url: '{{ url("../ajax-autocomplete-search") }}',

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
  

</script>





 <script type="text/javascript">

$('#clock').countdown('2022/05/16 12:34:56')
.on('update.countdown', function(event) {
// var format = '%H:%M:%S';
 if(event.offset.totalDays > 0) {
   format = 'Falta' +' ' +  '%-d día' +' '+'para vencer el periodo ';
 }
 if(event.offset.weeks > 0) {
   format = '%-w semana%!w ' + format;
 }
 $(this).html(event.strftime(format));
})
.on('finish.countdown', function(event) {
 $(this).html('El periodo de prueba a terminado!')
   .parent().addClass('disabled');

});
</script>





@yield('third_party_scripts')


@stack('page_scripts')



</body>



</html>
