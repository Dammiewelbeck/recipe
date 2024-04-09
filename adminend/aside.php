<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../assets/images/favicon.ico" alt="Tastebite Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> <?php echo strtoupper($details['name']); ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
        <li class="nav-item menu-open">
            <a href="/" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Official Website
              </p>
            </a>
        </li>
        
         <li class="nav-header">ACTION</li>

        <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="fas fa-briefcase nav-icon"></i>
              <p>Recipe Categories</p>
            </a>
        </li>
          
          <li class="nav-item">
            <a href="recipes.php" class="nav-link">
              <i class="fas fa-calendar nav-icon"></i>
              <p>All Recipes</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="chefs.php" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>All Chef</p>
            </a>
          </li>
          
        
         

          <li class="nav-header">USER</li>

          <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard.php?fun=logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- ===== /.ASIDE ===== -->