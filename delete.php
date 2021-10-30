<?php
include 'home.php';
if (isset($_GET['delete_id'])){
  $id=$_GET['delete_id'];

  $query=" DELETE FROM USER WHERE user_id=$id";
  $queryresult=mysqli_query($db,$query);
  if($queryresult){
    header('location:homepage.php');
  }else{
    die(mysqli_error($db));
  }
}
 ?>
