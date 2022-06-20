<?php 

require('db.php');

if(!isset($_SESSION['IS_LOGIN'])){
    header('loation:login.php');
    die();
}

if(isset($_GET['deleteid'])){
    $id =  mysqli_real_escape_string($con,$_GET['deleteid']);
    if($id == ''){
        header('location:displayUser.php');
        die();
    }


    $sql = "delete from `crud` where id = '$id' ";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:displayUser.php');
    }else{
        die(mysqli_error($con));
    }



}






?>