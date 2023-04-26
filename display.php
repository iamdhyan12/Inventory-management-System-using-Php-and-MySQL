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
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Entries in the Database</h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>When to Order</th>
                                    <th>Sold</th>
                                    <th>Items Left</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","inventory");

                                    $query = "SELECT * FROM Cart";
                                    $query_run = mysqli_query($con, $query);
                                    $sno=0;

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {   
                                            $sno=$sno +1;
                                            ?>
                                            <tr>
                                                <td><?= $sno?></td>
                                                <td><?= $row['Name']; ?></td>
                                                <td><?= $row['Total']; ?></td>
                                                <td><?= $row['When_Order']; ?></td>
                                                <td><?= $row['Sold']; ?></td>
                                                <td><?= $row['Left_items']; ?></td>
                                                <td><a href='edit.php?editid=<?php echo htmlspecialchars($row['SrNo'])?>' class="edit btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a> 
                                                <a href='display.php?delid=<?php echo htmlspecialchars($row['SrNo'])?> 'class="edit btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a></td>
                    
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                    

                </div>

            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['delid'])){
        $eid=($_GET['delid']);
        $sql="DELETE FROM cart WHERE SrNo='$eid'";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('CLass deleted');</script>"; 
      echo "<script>window.location.href = 'display.php'</script>";     
        }
        else{
            echo "<script>alert('Some Error Occured!!');</script>"; 
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>