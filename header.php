<?php
include('default.php');

  $cat_query = mysqli_query($con,"SELECT * FROM categories ORDER BY created_at DESC LIMIT 6");
  
  $recipe_query = mysqli_query($con,"SELECT * FROM recipes ORDER BY created_at DESC LIMIT  3");

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
<meta charset="UTF-8">
<meta name="description" content="Tastebite">
<meta name="keywords" content="Tastebite">
<meta name="author" content="Tastebite">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Tastebite || Recipe Assessment</title>
<link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Tastebite External CSS -->
<link href="assets/css/tastebite-styles.css" rel="stylesheet" type="text/css" media="all">
<link rel="canonical" href="index.php" />
</head>
<body>

<!-- Tstbite Section, P 0 -->
<section class="tstbite-section p-0">
  <div class="container">
    <!-- Tstbite Header, Bg White -->
    <header class="tstbite-header bg-white">
      <nav class="navbar navbar-expand-lg has-header-inner px-0">
        <a class="navbar-brand" href="index.php">
          <img src="assets/images/brands/brand4.svg" style="max-width: 161px;" alt="Tastebite">
        </a>
      
        <div class="collapse navbar-collapse" id="menu-4">
          <ul class="navbar-nav m-auto pt-3 pt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="recipe-categories.php">Recipe Categories</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="recipes.php">Recipes</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="chef/login.php">Chef Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
 
=