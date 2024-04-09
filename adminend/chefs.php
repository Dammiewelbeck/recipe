<!DOCTYPE html>
<html lang="en">

<!-- ===== HEADER ===== -->
<?php include('header.php'); ?>
<!-- ===== /.HEADER ===== -->

<!-- ===== ASIDE ===== -->
<?php include('aside.php'); ?>
<!-- ===== /.ASIDE ===== -->

<?php 

  $chef_query = mysqli_query($conn, "SELECT * FROM `chefs` ");  

?>


<!-- ===== CONTENT ===== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Chefs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <!-- PROFILE DETAILS -->
        <div class="card card-default color-palette-box">
          <!-- Card Header -->
     
          <!-- /.Card Header -->
          <!-- Card Body -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                  <th>ID</th>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date Registered</th>
                </tr>
                </thead>
                <tbody>
                  <?php $num=1; ?>
                  <?php while($chef = mysqli_fetch_array($chef_query)){ ?>
                  
                    <tr>
                        <td><?php echo $num; ?></td>
                         <td><?= $chef['name']; ?></td>
                        <td><?= $chef['email']; ?></td>
                        <td><?= $chef['created_at']; ?></td>
                    </tr>
                   
                  <?php $num++; } ?>
                </tbody>
            </table>
          </div>
          <!-- /.Card Body -->
        </div>
      </div>
    </section>
    <!-- /.Main Content -->
  </div>

<!-- ===== /.CONTENT ===== -->

<!-- ===== FOOTER ===== -->
<?php include('footer.php'); ?>
<!-- ===== /.FOOTER ===== -->

</html>