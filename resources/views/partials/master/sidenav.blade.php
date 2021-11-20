 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light">REIMALIE ACADEMY COLLEGE
</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/manage-courses" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Courses
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/manage-departments" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Departments
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/manage-categories" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Fee Master
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/manage-installments" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Installments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/applications" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                All Applications
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/approved-applications" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Approved
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/rejected-applications" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Rejected
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/payments" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Payments
              </p>
            </a>
          </li>

<li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                   Logout
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>