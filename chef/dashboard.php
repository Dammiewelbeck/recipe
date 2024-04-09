  <?php
    include('../default.php');
    include('header.php');
  
  $chef_id = $loader->user['id'];
  
    $recipe_cats = mysqli_query($con, "SELECT COUNT(*) AS row_count FROM categories WHERE chef_id=$chef_id");
  $recipe_cats = mysqli_fetch_array($recipe_cats);
  
  
    $recipes = mysqli_query($con, "SELECT COUNT(*) AS row_count FROM recipes WHERE user_id=$chef_id");
  $recipes = mysqli_fetch_array($recipes);
  
  ?>
  
                  <div class="row">
                      
                    <div class="col-sm-6 col-lg-6">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?= number_format($recipe_cats['row_count']); ?></h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Recipe Categories
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-lg-6">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?= number_format($recipes['row_count']); ?></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Recipes
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            <div class="row">
                
           <div class="col-md-1">
           </div> 
           
         <div class="col-md-10">
          <div class="card  border-bottom-success h-100">
             <div class="card-body">
                 <h4 class="card-title">ABOUT</h4>


             Welcome to <b>TASTBITE</b> check daashbord,This dashboard is for managing recipes categories and recipes.
             

             </div>

         </div>

     </div>

        <div class="col-md-1">
        </div>     
           
</div>
            
            
            <?php
                include('footer.php');
            ?>