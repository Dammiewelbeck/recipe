<?php
include('../default.php');
include('header.php');

$user_id = $loader->user['id'];
$recipe_query = mysqli_query($con, "SELECT * FROM recipes WHERE `user_id` = $user_id");
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recipes</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Preparation Time</th>
                                <th>Servings</th>
                                <th>Ingredients</th>
                                <th>Description</th>
                                <th>Instruction</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($recipe = mysqli_fetch_array($recipe_query)) { ?>
                                <tr>
                                    <td><a href="edit-recipe.php?rid=<?= $recipe['id']; ?>"><i class="fa fa-edit"></i></a></td>
                                    <td><?= $recipe['name']; ?></td>
                                   <td><?= $loader->categoryName($recipe['category_id']); ?></td>
                                    <td><a href="../uploads/recipes/<?= $recipe['image']; ?>" target="_blank">
                                            <img src="../uploads/recipes/<?= $recipe['image']; ?>" alt="picture" style="height:50px;">
                                        </a></td>
                                    <td><?= $recipe['preparation_time']; ?></td>
                                    <td><?= $recipe['servings']; ?></td>
                                    <td><?= $recipe['ingredients']; ?></td>
                                    <td><?= $recipe['description']; ?></td>
                                    <td><?= $recipe['instructions']; ?></td>
                                    <td><?= $recipe['created_at']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Preparation Time</th>
                                <th>Servings</th>
                                <th>Ingredients</th>
                                <th>Description</th>
                                <th>Instruction</th>
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
