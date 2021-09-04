      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/administrator/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard<span class="right badge badge-danger">New</span></p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Data Website
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/artikel" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>Module Artikel</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="/administrator/product" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>Module Product</p>
                </a>
              </li>
    
    
              <li class="nav-item">
                <a href="/administrator/category" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Module Category</p>
                </a>
              </li>
    
    
              <li class="nav-item">
                <a href="/administrator/card" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>Module Card</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="/administrator/team" class="nav-link">
                  <i class="nav-icon fa fa-tags"></i>
                  <p>Module Team</p>
                </a>
              </li>
              
    
              <li class="nav-item">
                <a href="/administrator/contact" class="nav-link">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>Module Contack</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="/administrator/setting" class="nav-link">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>Module Setting</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Data Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/administrator/customer" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/transaction" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Data Transaction</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrator/sales" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Report Order</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->