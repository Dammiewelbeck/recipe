
<?php include('header.php'); ?>

    <div class="card rounded-16 overflow-hidden border-0 bg-secondary mt-0 mt-md-4">
      <div class="row g-0">
        <div class="col-lg-7">
          <img src="assets/images/menus/menu1.jpg" class="w-100" alt="Menu">
        </div>
        <div class="col-lg-5">
          <div class="p-4 p-md-5 d-flex flex-column justify-content-center h-100 position-relative">
            <strong>
              <svg data-name="feather-icon/trending-up" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <rect data-name="Bounding Box" width="20" height="20" fill="rgba(255,255,255,0)"/>
                <path d="M.244,11.423a.834.834,0,0,1,0-1.178L6.494,3.994a.834.834,0,0,1,1.178,0L11.25,7.571l5.9-5.9H14.167a.833.833,0,1,1,0-1.667h5A.833.833,0,0,1,20,.833v5a.834.834,0,0,1-1.667,0V2.845L11.839,9.339a.834.834,0,0,1-1.179,0L7.083,5.761l-5.66,5.661a.834.834,0,0,1-1.179,0Z" transform="translate(0 4.167)" fill="#ff642f"/>
              </svg>
            </strong>
            <h4 class="my-3">Mighty Super Tastebite</h4>
            <p class="big pr-0 pr-md-5 pb-3 pb-sm-5 pb-lg-0">Look no further for a creamy and ultra smooth classic cheesecake recipe! no one can deny its simple decadence.</p>
            <a href="recipes.php" class="circle circle-lg tstbite-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="13.333" height="13.333" viewBox="0 0 13.333 13.333">
                <path d="M6.077,13.089a.833.833,0,0,1,0-1.178L10.488,7.5H.833a.833.833,0,0,1,0-1.667h9.655L6.077,1.423A.834.834,0,0,1,7.256.244l5.829,5.83a.833.833,0,0,1,0,1.186L7.256,13.089a.834.834,0,0,1-1.179,0Z" fill="#ff642f"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
      <h5 class="py-3 mb-0">Latest Recipes</h5>
      <div class="row">
          
      <?php while ($recipe = mysqli_fetch_array($recipe_query)) { ?>
        <div class="col-md-4">
          <figure class="my-3 tstbite-card">
            <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="tstbite-animation rounded-6">
              <img src="uploads/recipes/<?= $recipe['image']; ?>" class="w-100" alt="Menu">
            </a>
            <figcaption class="mt-2">
            
              <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="f-size-20 text-black d-block mt-1 font-weight-semibold"> <?= $recipe['name']; ?> </a>
            </figcaption>
          </figure>
        </div>
        <?php } ?>
        
        
      </div>
    </section>
 
    <!-- Tstbite Components, My 4, My Md 5 -->
   
    
  </div>
  <!-- Tstbite Components Bg Primary Light, My 5, Py 5 -->
  <section class="tstbite-components bg-primary-light my-5 py-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-8 offset-xl-3 offset-lg-2 text-center py-4 py-md-5">
          <div class="row"> 
            <div class="col-6">
              <h2 class="mb-3 h5">Are you a Recipe Seeker</h2>
              <div class="input-group custom-input-group mt-4">
              <center> <a href="recipes.php" class="btn btn-primary"> VIEW RECIPES</a> </center>
              </div>
            </div>
            <div class="col-6">
              <h2 class="mb-3 h5">Are you a Cook or Chef</h2>
              <p class="f-size-24 font-weight-regular">View, Edit & Add recipe</p>
              <div class="input-group custom-input-group mt-4 justify-content-center">
              <a href="chef/register.php" class="btn btn-primary"> JOIN</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
 <div class="container">
     <section class="tstbite-components my-4 my-md-5">
      <h5 class="py-3 mb-0">Popular Categories</h5>
      <div class="row">
           <?php while( $category = mysqli_fetch_array( $cat_query ) ){  ?>
        <div class="col-lg-2 col-md-4 col-4">
          <figure class="my-3 text-center tstbite-card">
            <a href="recipes.php?cid=<?= $category['id']; ?>" class="tstbite-animation stretched-link rounded-circle">
              <img src="uploads/category/<?= $category['image']; ?>" class="rounded-circle" alt="Menu">
            </a>
            <figcaption class="mt-2">
              <a href="recipes.php?cid=<?= $category['id']; ?>" class="tstbite-category-title"> <?= $category['name']; ?></a>
            </figcaption>
          </figure>
        </div>
        <?php } ?>
        
  
    
      </div>
    </section>
 </div>
  

  <?php include('footer.php'); ?>