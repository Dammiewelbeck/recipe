<?php 
include('header.php');

 $cat_query = mysqli_query($con,"SELECT * FROM categories");   

?>

  <div class="container">
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
      <h5 class="py-3 h3 mb-0">Hand-Picked Collections</h5>
      <div class="row">
          
           <?php while( $category = mysqli_fetch_array( $cat_query ) ){  ?>
        <div class="col-md-6">
          <figure class="my-3 tstbite-card">
            <a href="recipes.php?cid=<?= $category['id']; ?>" class="tstbite-animation stretched-link rounded-top-6">
              <img src="uploads/category/<?= $category['image']; ?>" class="w-50" height="150" style="width:100%" alt="Menu">
            </a>
            <figcaption class="tstbite-collection border-top-0 rounded-bottom-6">
              <div class="text-black pt-3 pb-4 px-4 d-lg-flex align-items-end justify-content-between text-right">
                <h5 class="mb-3 md-lg-0 pr-0 pr-lg-4 text-left"><a href="recipes.php?cid=<?= $category['id']; ?>" class="stretched-link"><?= $category['name']; ?></a></h5>
                <span class="btn btn-sm btn-outline-dark text-nowrap"><?= $loader->countRecipes( $category['id'] ); ?>Recipes</span>
              </div>
            </figcaption>
          </figure>
        </div>
        <?php } ?>
    
       
      </div>
    </section>
    
  </div>
  
<?php include('footer.php') ?>