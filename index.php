<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      
      <li class="nav-item mr-auto">
      <li class="btn-info btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/store/display.php"><h5>View Inventory</h5></a>
      </li>
      <li class="btn-success btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/store/search.php"><h5>Search Item</h5></a>
      </li>
      <li>
      
    </form>
</li>
    </ul>
    
    <ul class="navbar-nav"> 
    <li class="nav-item mr-auto">
    <li class="  btn-primary btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/store/index.php"><h5>Add Items </h5></a>
      </li>

      <li class="btn-danger btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/store/logout.php"><h5>Logout </h5></a>
      </li>
</li>
</ul>
  </div>
</nav>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
      // Submit these to a database

      $localhost="localhost";
        $username="root";
        $pass='';
        $database='inventory';
        $con=mysqli_connect("localhost","root","","inventory");

        if(!$con){
            echo"Connection Error : ".mysqli_connect_error()."<br>";
        }
        else{
            echo"Connected to Db";
        }
        $name=$_POST["name"];
        $total=$_POST["total"];
        $order=$_POST["order"];
        $sold=0;

        
        $left=$total-$sold;

        
            $sql="INSERT INTO `cart` ( `Name`, `Total`, `When_Order`, `Sold`, `Left_items`) VALUES ('$name', '$total', '$order', '$sold', '$left')";
            $result = mysqli_query($con, $sql);
            if($result){
                echo '<script>alert("Item has been inserted")</script>';
                echo "<script>window.location.href ='display.php'</script>";
              }
              else{
                  // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"></span>
                </button>
              </div>';
              }
    }

    
?>

<div class="container mt-3">
<h1>Please enter your email and password</h1>
    <form action="/store/index.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp">
       
    </div>
    <div class="form-group">
        <label for="pass">Total</label>
        <input type="number" class="form-control" id="pass" name="total">
    </div>
    <div class="form-group">
        <label for="pass">When to Order</label>
        <input type="number" class="form-control" id="pass" name="order">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
