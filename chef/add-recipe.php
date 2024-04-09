 <?php
    include('../default.php');
    include('header.php');
  
$chef_id = $loader->user['id'];
$cat_query = mysqli_query($con,"SELECT * FROM categories WHERE `chef_id` = $chef_id ");
  
 
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $preparation_time = $_POST['preparation_time'];
    $servings = $_POST['servings'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];
    $instructions = $_POST['instructions'];

    $updir = "../uploads/recipes/";
    $imgName = $_FILES["picture"]["name"];
    $imgTemp = $_FILES["picture"]["tmp_name"];

    if ($imgName && ($name !== null) && $category_id && $preparation_time && $servings && $description && $instructions && $ingredients) {
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $imgLink = time().'_'.rand(1000,9999).'.'.$imgExt;
        move_uploaded_file($imgTemp, $updir.$imgLink);
    } else {
        $link = $loader->getLink('add-recipe.php');
        echo "<script>alert('All fields are required'); window.location.href='".$link."'</script>";
        exit();
    }

    $user_id = $loader->user['id'];

    $store_data = mysqli_query($con, "INSERT INTO `recipes`(`user_id`, `category_id`, `name`, `description`, `image`, `preparation_time`, `servings`, `instructions`,`ingredients`) VALUES ('$user_id', '$category_id', '$name', '$description', '$imgLink', '$preparation_time', '$servings', '$instructions','$ingredients')");

    if ($store_data) {
        $link = $loader->getLink('my-recipes.php');
        echo "<script>alert('Recipe successfully added'); window.location.href='".$link."'</script>";
        exit();
    } else {
        $link = $loader->getLink('add-recipe.php');
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
            <h2 class="card-title text-white">ADD NEW RECIPE</h2>
          </div>
          <!-- /.Card Header -->
          <form action="" method="POST" enctype="multipart/form-data">
          <!-- Card Body -->
            <div class="card-body">

                <label for="title" class="form-label"><h5>Name: <span class="text-danger">*</span></h5></label>
                <div class="input-group mb-3">
                <input type="text" name="name" id="title" class="form-control" placeholder="Input recipe name..." required="">
                   
                </div>
                
                
                <label for="title" class="form-label"><h5>Category: <span class="text-danger">*</span></h5></label>
                <div class="input-group mb-3">
                  <select class="form-control" name="category_id" required>
                      <option value="" disabled selected>Select Recipe Category</option>
                      <?php while( $category = mysqli_fetch_array( $cat_query ) ){  ?>
                      
                             <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                      
                      <?php } ?>
                  </select> 
                </div>
                
               
               <label for="title" class="form-label"><h5>Preparation Time: <span class="text-danger">*</span></h5></label>
                <div class="input-group mb-3">
                <input type="text" name="preparation_time" id="title" class="form-control" placeholder="Input time to prepare recipe..." required="">
                   
                </div>
                
                <label for="title" class="form-label"><h5>Serving: <span class="text-danger">*</span></h5></label>
                <div class="input-group mb-3">
                <input type="number" name="servings" id="title" class="form-control" placeholder="Input number of people that can be served..." required="">
                </div>

                <div class="form-group">
                  <label for="picture" class="form-label"><h5>Image: <span class="text-danger">*</span></h5></label>
                        <input class="form-control" type="file" name="picture" id="picture" required="">
                </div>
                
                <br/>
                
                
                          <label for="description" class="form-label"><h5>Ingredients: <span class="text-danger">*</span></h5></label>
                   
              <textarea id="summernote_i" name="ingredients" ></textarea>
    <script>
      $('#summernote_i').summernote({
        placeholder: 'Input recipe ingredients...',
       tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
                
                 <label for="title" class="form-label"><h5>Description: <span class="text-danger">*</span></h5></label>
               
                      <textarea id="summernote" name="description" ></textarea>
    <script>
      $('#summernote').summernote({
        placeholder: 'Input recipe description...',
       tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
    
    <br/>
                
                  <label for="title" class="form-label"><h5>Instructions: <span class="text-danger">*</span></h5></label>

                               <textarea id="summernote_two" name="instructions" ></textarea>
    <script>
      $('#summernote_two').summernote({
        placeholder: 'Input recipe instructions...',
        height: 220,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
                
                
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