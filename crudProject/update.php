<?php 

require('db.php');

if(!isset($_SESSION['IS_LOGIN'])){
  header('loation:login.php');
  die();
}


$id = $_GET['updateid'];
$sql = "select * from `crud` where id =$id";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) == 0){
    header('location:displayUser.php');
    die();
}

$row = mysqli_fetch_assoc($result);
$name =  mysqli_real_escape_string($con,$row['name']);
$email =  mysqli_real_escape_string($con,$row['email']);
$mobile =  mysqli_real_escape_string($con,$row['mobile']);
$password = mysqli_real_escape_string($con, $row['password']);


if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email =  mysqli_real_escape_string($con,$_POST['email']);
  $mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
  $password =  mysqli_real_escape_string($con,$_POST['password']);

  $sql = "update  `crud` set id =$id, name='$name', email='$email',mobile='$mobile', password =' $password ' where id = $id";



  $result = mysqli_query($con,$sql);

  if($result){
    header('location:displayUser.php');
    die();
  }else{
    die(mysqli_error($con));
  }
}




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container my-5">
      <form method="post">
        <div class="form-group">
          <label >Name</label>
          <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name?>" >
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="Email" class="form-control" placeholder="Enter your Emial" name="email" autocomplete="off" value="<?php echo $email?>">
        </div>
        <div class="form-group">
          <label >Mobile</label>
          <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" value="<?php echo $mobile?>">
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password " class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value="<?php echo $password?>">
        </div>
        <button typp="submit" name="submit" class="btn btn-primary">Update</button>
        <button class="btn btn-danger my-5"> <a href="login.php" class="text-light">Log out</a>
        </button>


      </form>
    </div>
  
  </body>
</html>