<aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="index3.html" class="brand-link">
        <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Blog Cms </span>
      </a>

      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">

            @foreach(auth()->user()->roles as $role)
              <p class="d-block text-white" >({{$role->name}})</p>
            @endforeach
       
            <a href="#" class="d-block"><b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b></a>
          </div>
        </div>

        
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{url('dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
              
            </li>
            
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Charts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Flot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inline</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>uPlot</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  UI Elements
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Icons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buttons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/modals.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modals & Alerts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/navbar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Navbar & Tabs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/timeline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Timeline</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/ribbons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ribbons</p>
                  </a>
                </li>
              </ul>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Posts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('post/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="{{url('post/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
               
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Categories
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('category/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('category/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
               
              </ul>
            </li>
            @role('Super-Admin')
              <li class="nav-item">
                <a href="#" class="nav-link">
                 
                  <i class="nav-icon fas fa-user"></i>

                  <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('user_management/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('user_management/list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                
                </ul>
              </li>
            @endrole
            <li class="nav-item">
              <a href="{{url('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
              
            </li>
            
          
            
            
       
          </ul>
        </nav>

      </div>

    </aside>