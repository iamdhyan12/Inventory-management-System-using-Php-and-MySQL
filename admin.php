<html>

<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/6f163e585b.js" crossorigin="anonymous"></script>
<style>
  .f{
    color: #FFFFFF;
  }
</style></head>
<body style="background-color:lightblue;">


  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <h1 class="mt-4 mb-3" style="color:purple; text-align:center;">
                  Inventory Management
              </h1>
          </div>
      </div>

      <div class="card bg-gradient" style="height:400px;background-color:lightblue;border: none;">
      <div class="card-body">
        <h2 class="text-center mb-5">Sign In</h2>
        <form>
          <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" placeholder="Username" class="form-control form-control-lg" required autofocus>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" name="password" placeholder="Password" class="form-control form-control-lg" required>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6 mb-4 text-center">
              <button type="submit" name="login" class="btn btn-primary btn-lg px-5">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>    
    </div>
  </div>
    </div>
  </div></div>
<br>
  <?php
     $conn=mysqli_connect("localhost","root","","inventory");

  if(isset($_POST["login"])){

    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
    $result=mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){
        session_start();
         $_SESSION['loggedin'] = true;
        $_SESSION["username"]=$username;
        header("Location: display.php");
      }
    }
    else {
      echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
    }

  }
   ?>
 </form>
</body>
</html>
