      <!-- Sidebar Menu -->

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
           
            </ul>
          </li>
       
        
    
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               MASTER
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url ('users') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>          
              <li class="nav-item">
                <a href="{{ url ('norek') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Norek</p>
                </a>
              </li>     
              <li class="nav-item">
                <a href="{{ url ('admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="{{ url ('produk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>produk</p>
                </a>
              </li>         
            </ul>
          </li>        
     
        </ul>
     </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
