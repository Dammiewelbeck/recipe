 <?php
    include('../default.php');
    include('header.php');
  
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $name = trim($_POST['name']);
    
         $updir = "../uploads/category/";
        $imgName = $_FILES["picture"]["name"];
        $imgTemp = $_FILES["picture"]["tmp_name"];



        if($imgName  &&  ($name !== null )){
        $imgExt = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        $imgLink = time().'_'.rand(1000,9999).'.'.$imgExt;
        move_uploaded_file($imgTemp,$updir.$imgLink);
        }else{
          $link = $loader->getLink('add-category.php');
        echo "<script>alert('All Field Required'); window.location.href='".$link."'</script>";
        exit();  
        }  
        
        $chef_id = $loader->user['id'];

    $store_data = mysqli_query($con, "INSERT INTO `categories`(`name`, `image`,`chef_id`) VALUES ('$name','$imgLink','$chef_id')");

    if($store_data){

       $link = $loader->getLink('categories.php');
        echo "<script>alert('Category Successful Added'); window.location.href='".$link."'</script>";
        exit();
        
    }else{
        
       $link =  $loader->getLink('add-category.php');
       echo "<script>alert('Something went wrong, please try again'); window.location.href='".$link."'</script>";
        exit();
        
    }
    
}

  ?>
  
  <section class="content">
      <div class="container-fluid d-flex justify-content-center">
        <!-- PROFILE DETAILS -->
        <div class="card col-lg-10 p-0">
          <!-- Card Header -->
          <div class="card-header d-flex justify-content-center bg-secondary p-4">
            <h2 class="card-title text-white">ADD NEW RECIPE CATEGORY</h2>
          </div>
          <!-- /.Card Header -->
          <form action="" method="POST" enctype="multipart/form-data">
          <!-- Card Body -->
            <div class="card-body">

                <label for="title" class="form-label"><h5>Name: <span class="text-danger">*</span></h5></label>
                <div class="input-group mb-3">
                <input type="text" name="name" id="title" class="form-control" placeholder="Input recipe category name..." required="">
                   
                </div>


            
                <div class="form-group">
                  <label for="picture" class="form-label"><h5>Picture: <span class="text-danger">*</span></h5></label>
               
                        <input class="form-control" type="file" name="picture" id="picture" onchange="updateFileName()" required="">
                        <input type="hidden" id="fileLabel" value="Choose recipe category image">
                   
                </div>

            
                
                <div class="row mt-4 px-2">
                    <div class="col text-center"><button type="reset" href="" class="btn btn-danger btn-lg">Reset <i class="fa fa-times"></i></button></div>
                    <div class="col text-center"><button class="btn btn-success btn-lg" type="submit">Submit <i class="fa fa-check"></i></button></div>
                </div>

            </div>
          <!-- /.Card Body -->
          </form>
        </div>
      </div>
  </section>
  
  
  <?php 
   include('footer.php');
  ?>