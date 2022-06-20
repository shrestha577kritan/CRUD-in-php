<?php 

session_start();
$con = mysqli_connect('localhost','root','','crudoperation');


if(! $con){
   die(mysqli_error($con));
}



?>