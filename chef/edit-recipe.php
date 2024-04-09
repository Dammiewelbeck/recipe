<?php
include('../default.php');
include('header.php');

$chef_id = $loader->user['id'];
$cat_query = mysqli_query($con,"SELECT * FROM categories WHERE `chef_id` = $chef_id ");

if (isset($_GET['rid']) && $_GET['rid'] !== null) {
    $recipe_id = $_GET['rid'];
    $recipe_query = mysqli_query($con, "SELECT * FROM recipes WHERE `id` = $recipe_id");
    $recipe = mysqli_fetch_array($recipe_query);

    if ($recipe <= 0) {
        $link = $loader->getLink('my-recipes.php');
        echo "<script>alert('Recipe does not exist'); window.location.href='" . $link . "'</script>";
        exit();
    }
} else {
    $link = $loader->getLink('my-recipes.php');
    echo "<script>alert('Recipe does not exist'); window.location.href='" . $link . "'</script>";
    exit();
}


if( $recipe['user_id'] !== $chef_id){
        $link = $loader->getLink('my-recipes.php');
      echo "<script>alert('You are not permitted to edit recipe'); window.location.href='" . $link . "'</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $preparation_time = $_POST['preparation_time'];
    $ingredients = $_POST['ingredients'];
    $servings = $_POST['servings'];
    $instructions = $_POST['instructions'];

    $updir = "../uploads/recipes/";
    $imgName = $_FILES["picture"]["name"];
    $imgTemp = $_FILES["picture"]["tmp_name"];

    $imgLink = $recipe['image'];

    if ($imgName) {
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $imgLink = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
        move_uploaded_file($imgTemp, $updir . $imgLink);
    }

    $update_data = mysqli_query($con, "UPDATE `recipes` SET `name`='$name', `category_id`='$category_id', `description`='$description', `image`='$imgLink', `preparation_time`='$preparation_time', `servings`='$servings', `instructions`='$instructions', `ingredients`='$ingredients' WHERE `id`='$recipe_id'");

    if ($update_data) {
        $link = $loader->getLink('my-recipes.php');
        echo "<script>alert('Recipe Successfully Updated'); window.location.href='" . $link . "'</script>";
        exit();
    } else {
        $link = $loader->getLink('edit-recipe.php?rid=' . $recipe_id);
        echo "<script>alert('Something went wrong, please try again'); window.location.href='" . $link . "'</script>";
        exit();
    }
}
?>

<section class="content">
    <div class="container-fluid d-flex justify-content-center">
        <!-- EDIT RECIPE FORM -->
        <div class="card col-lg-10 p-0">
            <!-- Card Header -->
            <div class="card-header d-flex justify-content-center bg-secondary p-4">
                <h2 class="card-title text-white">EDIT RECIPE</h2>
            </div>
            <!-- /.Card Header -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Card Body -->
                <div class="card-body">

                    <label for="title" class="form-label"><h5>Name: <span class="text-danger">*</span></h5></label>
                    <div class="input-group mb-3">
                        <input type="text" name="name" id="title" class="form-control" placeholder="Input recipe name..." required="" value="<?= $recipe['name']; ?>">
                    </div>

                    <label for="category" class="form-label"><h5>Category: <span class="text-danger">*</span></h5></label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="category_id" required>
                            <?php while( $category = mysqli_fetch_array( $cat_query ) ){  ?>
                      
                             <option value="<?= $category['id']; ?>" <?= $recipe['category_id'] == $category['id']?'Selected':'';  ?>><?= $category['name']; ?></option>
                      
                      <?php } ?>
                        </select>
                    </div>

                 

                    <label for="preparation_time" class="form-label"><h5>Preparation Time: <span class="text-danger">*</span></h5></label>
                    <div class="input-group mb-3">
                        <input type="text" name="preparation_time" id="preparation_time" class="form-control" placeholder="Input time to prepare recipe..." required="" value="<?= $recipe['preparation_time']; ?>">
                    </div>

                    <label for="servings" class="form-label"><h5>Servings: <span class="text-danger">*</span></h5></label>
                    <div class="input-group mb-3">
                        <input type="text" name="servings" class="form-control" placeholder="Input number of people that can be served..." required="" value="<?= $recipe['servings']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="picture" class="form-label"><h5>Image: <span class="text-danger">*</span></h5></label>
                      <img src="../uploads/recipes/<?= $recipe['image']; ?>" alt="picture" style="height:50px;">
                      <input class="form-control" type="file" name="picture" id="picture" onchange="updateFileName()">
                    </div>
                    
                    
                         <label for="description" class="form-label"><h5>Ingredients: <span class="text-danger">*</span></h5></label>
                   
              <textarea id="summernote_i" name="ingredients" ><?= $recipe['ingredients']; ?></textarea>
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

                  <label for="description" class="form-label"><h5>Description: <span class="text-danger">*</span></h5></label>
                   
              <textarea id="summernote" name="description" ><?= $recipe['description']; ?></textarea>
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
                    <label for="instructions" class="form-label"><h5>Instructions: <span class="text-danger">*</span></h5></label>
                           <textarea id="summernote_two" name="instructions" ><?= $recipe['instructions']; ?></textarea>
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
