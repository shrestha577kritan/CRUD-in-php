<?php 

require('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
  header('loation:login.php');
  die();
}

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email =  mysqli_real_escape_string($con, $_POST['email']);
  $mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $sql = "insert into crud (name,email,mobile, password) values ('$name', '$email', '$mobile', '$password')";

  $result = mysqli_query($con,$sql);

  if($result){
    header('location:displayUser.php');
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
          <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="Email" class="form-control" placeholder="Enter your Emial" name="email" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label >Mobile</label>
          <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password " class="form-control" placeholder="Enter your password" name="password" autocomplete="off" required>
        </div>
        <button typp="submit" name="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-danger my-5"> <a href="login.php" class="text-light">Log out</a>
        </button>


      </form>
    </div>
  
  </body>
</html>