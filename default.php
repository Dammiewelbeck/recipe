<?php
session_start();

class Loader{

public $conn;
public $user;

function __construct(){
    
   $this->connectToDB();
    
}
 
 
 private function connectToDB(){
     
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tasteabledb');
$this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}
    
    if(isset($_SESSION['chef'])){
        $this->user = $_SESSION['chef'];
    }
    
 }

public function getLink($page){
    
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            $link = "http://$host$uri/$page";
            return $link;
            
}

public function UserLogout(){
       session_unset();
}

public function doesEmailExist($email){
    
    
    $msg = mysqli_query($this->conn, "SELECT * FROM `chefs` WHERE `email` = '$email'");
        $rtn = mysqli_fetch_array($msg);
        
        if($rtn > 0){
            return true;
        }else{
            return false;
        }
    
}


public function categoryName($cat_id){
    
    
    $msg = mysqli_query($this->conn, "SELECT * FROM `categories` WHERE `id` = '$cat_id'");
        $rtn = mysqli_fetch_array($msg);
        
        if($rtn > 0){
            return $rtn['name'];
        }else{
            return 'NULL';
        }
    
}

public function recipeAuthor($chef_id){
    
    
    $msg = mysqli_query($this->conn, "SELECT * FROM `chefs` WHERE `id` = '$chef_id'");
        $rtn = mysqli_fetch_array($msg);
        
        if($rtn > 0){
            return $rtn['name'];
        }else{
            return 'NULL';
        }
    
}

public function countRecipes($cat_id){

$cats_q = mysqli_query($this->conn, "SELECT COUNT(*) AS row_count FROM recipes WHERE `category_id` = '$cat_id'");
  $cats_q = mysqli_fetch_array($cats_q);
      return $cats_q['row_count'];
      
}



}

$loader = new Loader();
$con = $loader->conn;
