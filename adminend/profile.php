<!DOCTYPE html>
<html lang="en">

<!-- ===== HEADER ===== -->
<?php include('header.php'); ?>
<!-- ===== /.HEADER ===== -->

<!-- ===== ASIDE ===== -->
<?php include('aside.php'); ?>
<!-- ===== /.ASIDE ===== -->

<!-- ===== CONTENT ===== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid d-flex justify-content-center">
        <!-- PROFILE DETAILS -->
        <div class="card col-lg-8 col-md-10 p-0">
          <!-- Card Header -->
          <div class="card-header d-flex justify-content-center bg-secondary p-4">
            <h2 class="card-title text-white">PROFILE DETAILS</h2>
          </div>
          <!-- /.Card Header -->
          <!-- Card Body -->
            <div class="card-body">
            
              <div class="row mt-3 mx-2 mx-lg-4">
                <h5 class="col text-left"><b>Admin Name:</b></h5>
                <p class="col text-right"><?php echo $details['name']; ?></p>
              </div>

              <div class="row mt-3 mx-2 mx-lg-4">
                <h5 class="col text-left"><b>Username:</b></h5>
                <p class="col text-right"><?php echo $details['username']; ?></p>
              </div>

              <div class="row mt-3 mx-2 mx-lg-4">
                <h5 class="col text-left"><b>Role:</b></h5>
                <p class="col text-right"><?php echo $details['role']; ?></p>
              </div>

              <div class="row mt-3 mx-2 mx-lg-4">
                <h5 class="col text-left"><b>Email Address:</b></h5>
                <p class="col text-right"><?php echo $details['email']; ?></p>
              </div>

              <div class="row mt-3 mx-2 mx-lg-4">
                <h5 class="col text-left"><b>Date and Time Registered:</b></h5>
                <p class="col text-right"><?php echo $details['created_at']; ?></p>
              </div>
                <div class="text-center my-4"><a href="dashboard.php?fun=logout" class="btn btn-danger delete-link-logout">Logout <i class="fas fa-trash"></i></a></div>
                <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      const deleteLinks = document.querySelectorAll('.delete-link-logout');

                      deleteLinks.forEach(function(link) {
                          link.addEventListener('click', function(event) {
                              // Prevent the default action of clicking the link
                              event.preventDefault();

                              // Ask for confirmation before proceeding
                              const confirmation = window.confirm("Are you sure you want to logout from session?");
                              
                              // If user confirms, navigate to the specified link
                              if (confirmation) {
                                  window.location.href = link.href;
                              }
                          });
                      });
                  });
                </script>
            </div>
          <!-- /.Card Body -->
          </form>
        </div>
      </div>
    </section>

  </div>

<!-- ===== /.CONTENT ===== -->

<!-- ===== FOOTER ===== -->
<?php include('footer.php'); ?>
<!-- ===== /.FOOTER ===== -->

</html>