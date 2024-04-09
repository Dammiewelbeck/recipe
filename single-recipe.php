<?php include('header.php');

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


$rrid = $recipe['id'];

$also_like_recipe_query = mysqli_query($con, "SELECT * FROM recipes WHERE `id` != $rrid");


?>
  
  <div class="container">
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
      <div class="d-sm-flex">
        <div class="tstbite-svg order-sm-2 ml-auto">
          <div class="tstbite-feature pt-0">
            <!-- <a href="#0"> -->
              <!-- <svg data-name="feather-icon/share" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <rect data-name="Bounding Box" width="32" height="32" fill="rgba(255,255,255,0)"/>
                <path d="M4,29.333a4,4,0,0,1-4-4V14.666a1.333,1.333,0,1,1,2.666,0V25.333A1.333,1.333,0,0,0,4,26.666H20a1.333,1.333,0,0,0,1.333-1.333V14.666a1.333,1.333,0,1,1,2.666,0V25.333a4,4,0,0,1-4,4Zm6.667-10.666V4.552L7.609,7.609A1.333,1.333,0,0,1,5.724,5.724L11.057.39a1.333,1.333,0,0,1,.307-.229h0l.025-.013.008,0,.018-.009.015-.007.011-.005.024-.011h0a1.338,1.338,0,0,1,1.062,0h0l.024.011.011,0,.016.008L12.6.143l.008,0,.025.013h0a1.333,1.333,0,0,1,.307.229l5.333,5.334a1.333,1.333,0,1,1-1.885,1.885L13.333,4.552V18.667a1.333,1.333,0,0,1-2.666,0Z" transform="translate(4 1.333)"/>
              </svg> -->

              <!-- <svg data-name="feather-icon/edit" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <rect data-name="Bounding Box" width="32" height="32" fill="rgba(255,255,255,0)"/>
                <path d="M2,14.747a2,2,0,0,1-2-2V3.414a2,2,0,0,1,2-2H6.667a.667.667,0,1,1,0,1.333H2a.667.667,0,0,0-.667.667v9.334A.667.667,0,0,0,2,13.414h9.334A.666.666,0,0,0,12,12.748V8.081a.667.667,0,1,1,1.333,0v4.667a2,2,0,0,1-2,2ZM4.141,10.49a.659.659,0,0,1-.121-.571l.667-2.666a.67.67,0,0,1,.176-.31L11.2.61A2.081,2.081,0,0,1,14.042.52l.1.09.09.1a2.084,2.084,0,0,1-.09,2.846L7.8,9.886a.669.669,0,0,1-.31.175l-2.666.667a.675.675,0,0,1-.165.02A.66.66,0,0,1,4.141,10.49Zm8-8.938-6.2,6.2L5.583,9.164l1.41-.352,6.2-6.2a.748.748,0,1,0-1.057-1.057Z" transform="translate(0.667 0.586)"/>
              </svg>
            </a>
            <a href="#0">
              <svg data-name="feather-icon/edit" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <rect data-name="Bounding Box" width="32" height="32" fill="rgba(255,255,255,0)"/>
                <path d="M20,26.669a1.318,1.318,0,0,1-.77-.251l-8.558-6.113L2.108,26.418a1.319,1.319,0,0,1-.77.251A1.362,1.362,0,0,1,.41,26.3,1.314,1.314,0,0,1,0,25.333V4A4,4,0,0,1,4,0H17.333a4,4,0,0,1,4,4V25.333A1.34,1.34,0,0,1,20,26.669Zm-9.329-9.336a1.329,1.329,0,0,1,.776.248l7.225,5.161V4a1.335,1.335,0,0,0-1.334-1.333H4A1.335,1.335,0,0,0,2.666,4V22.742l7.225-5.161A1.324,1.324,0,0,1,10.666,17.333Z" transform="translate(5.333 2.667)"/>
              </svg>
            </a> -->
          </div>
        </div>
        <div>
        
          <h5 class="py-3 mb-0 h2"><?= $recipe['name']; ?></h5>
        </div>
      </div>
      <div class="d-flex flex-wrap">
        <div class="my-2 mr-4">
          <!--<img src="assets/images/avatars/avatar11.png" class="rounded-circle" alt="Avatar">-->
         <b>
            <p class="pl-1">Chef : <?= $loader->recipeAuthor($recipe['user_id']); ?></p> 
         </b> 
        </div>
        <br/>
        <div class="my-2 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="13.333" height="14.666" viewBox="0 0 13.333 14.666">
            <path d="M2,14.666a2,2,0,0,1-2-2V3.333a2,2,0,0,1,2-2H3.334V.667a.667.667,0,0,1,1.333,0v.667h4V.667A.667.667,0,0,1,10,.667v.667h1.333a2,2,0,0,1,2,2v9.334a2,2,0,0,1-2,2Zm-.667-2A.667.667,0,0,0,2,13.333h9.334A.667.667,0,0,0,12,12.667v-6H1.333ZM12,5.333v-2a.667.667,0,0,0-.667-.667H10v.667a.667.667,0,0,1-1.334,0V2.666h-4v.667a.667.667,0,1,1-1.333,0V2.666H2a.667.667,0,0,0-.667.667v2Z"/>
          </svg>
          
          <small><?= $recipe['created_at']; ?></small>
        </div>
        <div class="my-2">
         
        </div>
      </div>
      <div class="blog-detail">
        <hr>
        <p>
            <?= $recipe['description']; ?>
        </p>
        <br> 
        <div class="rounded-12 overflow-hidden position-relative tstbite-svg">
          <img src="uploads/recipes/<?= $recipe['image']; ?>" class="w-100" height="450" alt="Menu">
         
        </div>
        <br>
        <div class="row mt-0">
      
          <div class="col-md-6">
            <div class="mt-4 mt-md-5">
              <h6>Ingredients</h6>
             <?= $recipe['ingredients']; ?>
            </div>
            <div class="col-md-12 mt-4">
              <ul class="list-unstyled component-list tstbite-svg">
                <li>
                  <small>Prep Time</small>
                  <span> <?= $recipe['preparation_time']; ?></span>
                </li>
                <li>
                  <small>Servings</small>
                  <span><?= $recipe['servings']; ?> People</span>
                </li>
                <li> 
              
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mt-5">
              <h6>Instructions</h6>
            <?= $recipe['instructions']; ?>
            </div>
          </div>
        </div>
      </div><br><br>
      <hr class="orange hr-11">
      
    </section>

    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
      <h5 class="py-3 mb-0">You might also like</h5>
      <div class="row">
          
             <?php while ($recipe = mysqli_fetch_array($also_like_recipe_query)) { ?>
        <div class="col-lg-3 col-md-4 col-6">
          <figure class="my-3 my-md-4 tstbite-card">
            <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="tstbite-animation stretched-link rounded-6">
              <img src="uploads/recipes/<?= $recipe['image']; ?>" class="w-100" alt="Menu">
            </a>
            <figcaption class="mt-2">
              <a href="single-recipe.php?rid=<?= $recipe['id']; ?>" class="text-black d-block mt-1 font-weight-semibold big"> <?= $recipe['name']; ?></a>
            </figcaption>
          </figure>
        </div>
        <?php } ?>
        
      </div>
    </section>
  </div>
  
<?php include('footer.php'); ?>