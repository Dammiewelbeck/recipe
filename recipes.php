<?php 
include('header.php');




if( (isset($_GET['cid'])) && ($_GET['cid'] !== null) ){
$cid = $_GET['cid'];
$recipe_query = mysqli_query($con,"SELECT * FROM recipes where category_id=$cid");
}else{
 $recipe_query = mysqli_query($con,"SELECT * FROM recipes");   
}


?>

  <div class="container">
    
    <section class="tstbite-components my-4 my-md-5">
      <h5 class="py-3 mb-0">All Recipes</h5>
      <hr/>
      
      <div class="row">
          
      <?php while( $recipe = mysqli_fetch_array($recipe_query) ) { ?>
        <div class="col-lg-3 col-md-4 col-6">
          <figure class="my-3 my-md-4 tstbite-card">
            <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="tstbite-animation stretched-link rounded-6">
              <img src="uploads/recipes/<?= $recipe['image']; ?>" class="w-100" alt="Menu">
            </a>
            <figcaption class="mt-2">
              <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="text-black d-block mt-1 font-weight-semibold big"> <?= $recipe['name']; ?> </a>
            </figcaption>
          </figure>
        </div>
      <?php } ?>
      
        <!--<div class="col-lg-3 col-md-4 col-6">-->
        <!--  <figure class="my-3 my-md-4 tstbite-card">-->
        <!--    <a href="single-recipe.php" class="tstbite-animation stretched-link rounded-6">-->
        <!--      <img src="assets/images/menus/menu118.jpg" class="w-100" alt="Menu">-->
        <!--    </a>-->
        <!--    <figcaption class="mt-2">-->
        <!--      <a href="single-recipe.php" class="text-black d-block mt-1 font-weight-semibold big">Tripple Chocolate Mousse Cake</a>-->
        <!--    </figcaption>-->
        <!--  </figure>-->
        <!--</div>-->

      </div>
      
    </section>
  </div>
  
<?php include('footer.php') ?>