<!DOCTYPE html>
<html lang="en">

<!-- ===== HEADER ===== -->
<?php include('header.php'); ?>
<!-- ===== /.HEADER ===== -->

<!-- ===== ASIDE ===== -->
<?php include('aside.php'); ?>
<!-- ===== /.ASIDE ===== -->

<?php 


  $cats_q = mysqli_query($conn, "SELECT COUNT(*) AS row_count FROM categories ");
  $cats_q = mysqli_fetch_array($cats_q);

  $recipes_q = mysqli_query($conn, "SELECT COUNT(*) AS row_count FROM recipes ");
  $recipes_q = mysqli_fetch_array($recipes_q);

  $chef_q = mysqli_query($conn, "SELECT COUNT(*) AS row_count FROM chefs ");
  $chef_q = mysqli_fetch_array($chef_q);

  $admins = mysqli_query($conn, " SELECT COUNT(*) AS row_count FROM admins ");
  $admin = mysqli_fetch_array($admins); 
  
?>

<!-- ===== CONTENT ===== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3><?= $chef_q['row_count']; ?></h3>

                <p> All Chef </p>
              </div>
              <div class="icon">
                <i class="ion ion-person text-white"></i>
              </div>
              <a href="chefs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $recipes_q['row_count']; ?></h3>

                <p> Cook Recipes </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag text-white"></i>
              </div>
              <a href="recipes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $cats_q['row_count']; ?></h3>

                <p> Recipe Categories </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars text-white"></i>
              </div>
              <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?= $admin['row_count']; ?></h3>

                <p> Admins </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add text-white"></i>
              </div>
              <a href="profile.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          <!-- ./col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">

            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
    
            </section>
            <!-- /.Left col -->
    
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
    
            </section>
            <!-- /.right col -->

        </div>
        <!-- /.row (main row) -->
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ===== /.CONTENT ===== -->

<!-- ===== FOOTER ===== -->
<?php include('footer.php'); ?>
<!-- ===== /.FOOTER ===== -->

</html>
