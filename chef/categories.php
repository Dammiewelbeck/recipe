 <?php
    include('../default.php');
    include('header.php');
  
  $chef_id = $loader->user['id'];
  $cat_query = mysqli_query($con,"SELECT * FROM categories WHERE `chef_id` = $chef_id ");
  ?>

                  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recipe Categories</h4>
                             
                                <div class="table-responsive">
                                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Created On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while( $category = mysqli_fetch_array( $cat_query ) ){  ?>
                                            <tr>
                                                <td><a href="edit-category.php?cid=<?= $category['id']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><?= $category['name']; ?></td>
                                                <td> <a href="../uploads/category/<?= $category['image']; ?>" target="_blank">
                                                      <img src="../uploads/category/<?= $category['image']; ?>" alt="picture" style="height:50px;">
                                                      </a></td>
                                             <td><?= $category['created_at']; ?></td>
                                            </tr>
                                         <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
  
  <?php 
   include('footer.php');
  ?>