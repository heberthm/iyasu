 
 <aside class="main-sidebar sidebar-light-gray elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('inicio') }}" class="brand-link">
      <img src="{{ asset('img/log-med-menu.png') }}" alt="Iyasu" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Iyasu</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item">
            <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('inicio') ? 'active' : '' }}">
                <i class="nav-icon fas fa-asterisk green"></i>
                <p>
                 Inicio
                </p>
            </a>
          </li>


          <li class="nav-item">
          <a href="{{ url('registrar_tratamientos') }}" class="nav-link {{ request()->is('registrar_tratamientos') ? 'active' : '' }}">
           <!-- <i class="nav-icon fas fa-list green"></i> -->
            <i class="nav-icon fas  fa-medkit"></i>
            <p>
              Registrar tratamientos
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('abonos') }}" class="nav-link {{ request()->is('abonos') ? 'active' : '' }}">
           <!-- <i class="nav-icon fas fa-list green"></i> -->
            <i class="nav-icon fas  fa-list"></i>
            <p>
              Abonos
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link {{ request()->is('') ? 'active' : '' }}">
           <!-- <i class="nav-icon fas fa-list green"></i> -->
            <i class="nav-icon fas  fa-usd"></i>
            <p>
              pagos a profesionales
            </p>
          </a>
        </li>


      <li class="nav-item">
        <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

          <i class="nav-icon fas fa-comment green"></i>
          <p>
            Recordatorios
          </p>
        </a>
      
      </li>



      
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-inicio green"></i>
          <p>
          Configurar
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="{{ url('profesionales') }}" class="nav-link {{ request()->is('profesionales') ? 'Active' : '' }}">

              <i class="nav-icon fas fa-user-md green"></i>
              <p>
                Profesionales
              </p>
           </a>   
          </li>


         <li class="nav-item">
          <a href="{{ url('terapias') }}" class="nav-link {{ request()->is('terapias') ? 'Active' : '' }}">

              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                Terapias
              </p>
           </a>   
          </li>


          <li class="nav-item">
          <a href="{{ url('terapias_adicionales') }}" class="nav-link {{ request()->is('terapias_adicionales') ? 'Active' : '' }}">

              <i class="nav-icon fas fa-tags green"></i>
              <p>
                Terapias adicionales
              </p>
          </a> 

          </li>
          
            <li class="nav-item">
            <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

                  <i class="nav-icon fas fa-cogs white"></i>
                  <p>
                     lavados
                  </p>
          </a>
            </li>
        </ul>
      </li>
     

      
      <li class="nav-item has-treeview">
        <a href="{{ url('register') }}" class="nav-link {{ request()->is('register') ? '' : '' }}">

          <i class="nav-icon fas fa-user-plus green"></i>
          <p>
            Crear usuario
           
          </p>
        </a>
       
      </li>


       
       
      
          <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off" style="color:#C81010"></i>
                    <p>
                        Salir
                    </p>
                 </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </li>
            
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


