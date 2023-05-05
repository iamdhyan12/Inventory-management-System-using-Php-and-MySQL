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
        <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL-main/display.php"><h5>View Inventory</h5></a>
      </li>
      <li class="btn-success btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL-main/search.php"><h5>Search Item</h5></a>
      </li>
      <li>
      
    </form>
</li>
    </ul>
    
    <ul class="navbar-nav"> 
    <li class="nav-item mr-auto">
    <li class="  btn-primary btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL-main/index.php"><h5>Add Items </h5></a>
      </li>

      <li class="btn-danger btn-sm active me-3" role="button" aria-pressed="true">
        <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL-main/logout.php"><h5>Logout </h5></a>
      </li>
</li>
</ul>
  </div>
</nav>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Items found in Inventory </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","inventory");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM cart WHERE Name LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $sno=0;
                                            foreach($query_run as $items)
                                            {
                                                $sno=$sno +1;
                                                ?>
                                                <tr>
                                                <td><?= $sno?></td>
                                                <td><?= $items['Name']; ?></td>
                                                <td><?= $items['Total']; ?></td>
                                                <td><?= $items['When_Order']; ?></td>
                                                <td><?= $items['Sold']; ?></td>
                                                <td><?= $items['Left_items']; ?></td>
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
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
