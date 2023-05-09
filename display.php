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
    <script src="https://kit.fontawesome.com/6f163e585b.js" crossorigin="anonymous"></script>

</head>
<body>

<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- left side of navbar  -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-auto">
                <!-- inventory button -->
                <li class="btn-info btn-sm active me-3" role="button" aria-pressed="true">
                    <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL/display.php"><h5>View Inventory</h5></a>
                </li>
                <!-- search item button  -->
                <li class="btn-success btn-sm active me-3" role="button" aria-pressed="true">
                    <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL/search.php"><h5>Search Item</h5></a>
                </li>
            </li>
        </ul>

        <!-- right side of nav bar -->
        <ul class="navbar-nav"> 
            <li class="nav-item mr-auto">
                <!-- add item button with modal of pop up -->
                <li class="btn-primary btn-sm active me-3" role="button" aria-pressed="true">
                    <a class="nav-link" data-toggle="modal" data-target="#addItemModal" href="#"><h5>Add Items </h5></a>
                </li>
                    <!-- Modal -->
                    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addItemForm" method="post">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <input type="number" class="form-control" id="total" name="total">
                                        </div>
                                        <div class="form-group">
                                            <label for="order">When to Order</label>
                                            <input type="number" class="form-control" id="order" name="order">
                                        </div>
                                        <input type="submit" name="sub-add" class="btn btn-primary" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- php for add item  -->
                    <?php
                        if (isset($_POST['sub-add'])){
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
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>';
                            }
                        }
                    ?>
                <!-- logout button -->
                <li class="btn-danger btn-sm active me-3" role="button" aria-pressed="true">
                    <a class="nav-link" href="/Inventory-management-System-using-Php-and-MySQL/logout.php"><h5>Logout </h5></a>
                </li>
            </li>
        </ul>
    </div>
</nav>

<!-- body of page -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Inventory</h4>
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
                                <th>Comments</th>
                                <th>Actions</th>                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","inventory");
                                $query = "SELECT * FROM Cart";
                                $query_run = mysqli_query($con, $query);
                                $s=1;

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {   
                                        $s=$s + 1;

                                        ?>
                                        <tr>
                                            <td><?= $s?></td>
                                            <td><?= $row['Name']; ?></td>
                                            <td><?= $row['Total']; ?></td>
                                            <td><?= $row['When_Order']; ?></td>
                                            <td><?= $row['Sold']; ?></td>
                                            <td><?= $row['Left_items']; ?></td>
                                            <td><?= $row['Comments']; ?></td>
                                            <td>
                                                <!-- edit button  -->
                                                <a href="#" class="edit btn btn-primary btn-sm active" role="button" aria-pressed="true" data-toggle="modal" data-target="#editModal<?php echo $row['SrNo']; ?>">Edit</a>
                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editModal<?php echo $row['SrNo']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Item <?php echo $row['SrNo']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            // Connect to database
                                                            $con = mysqli_connect("localhost", "root", "", "inventory");
                                                            if (!$con) {
                                                                echo "Connection Error : " . mysqli_connect_error() . "<br>";
                                                            } else {
                                                                // Fetch data for selected item
                                                                $sno = $row['SrNo'];
                                                                $query = "SELECT sold FROM cart WHERE SrNo=$sno";
                                                                $result = mysqli_query($con, $query);
                                                                $item = mysqli_fetch_assoc($result);

                                                                // Display edit form
                                                                ?>
                                                                <form method="post" action="edit.php?editid=<?php echo $sno; ?>">
                                                                <div class="form-group">
                                                                    <label for="sold">Sold</label>
                                                                    <input type="number" name="sold" class="form-control" id="sold" value="<?php ; ?>" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sold">Add Comments</label>
                                                                    <input type="text" name="comments" class="form-control" id="sold" value="<?php echo $row['Comments']; ?>">
                                                                </div>
                                                                <button type="submit" name='sub-edit' class="btn btn-primary">Save changes</button>
                                                                </form>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                <a href='display.php?delid=<?php echo htmlspecialchars($row['SrNo'])?> 'class="edit btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                                            </td>       
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

<!-- edit code php -->
<?php
    // if (isset($_POST['sub-edit'])){
    
    // $con = mysqli_connect("localhost","root","","inventory");

    // if(!$con){
    //     echo"Connection Error : ".mysqli_connect_error()."<br>";
    // }
    // else{
    //     echo"Connected to Db";
    // }

    //  $sno=$_GET['editid'];

    //  $sold=$_POST['sold'];
    //  $comments=$_POST['comments'];

 
     
    //     // Update the item in the cart table
    //     $sno = $_GET['editid'];
    //     $sold = $_POST['sold'];
    //     $comments=$_POST['comments'];
    //     $query = "UPDATE cart SET Left_items=Left_items-$sold,sold=sold + $sold , Comments='$comments'where SrNo=$sno";
    //     $result = mysqli_query($con, $query);
    
    //     // Delete the last row from the table
    //     // $query = "DELETE FROM cart ORDER BY SrNo DESC LIMIT 1";
    //     // mysqli_query($con, $query);
    
    //     // Check if the update was successful
    //     if ($result) {
    //         echo "Item updated successfully.";
    //     } else {
    //         echo "Error updating item: " . mysqli_error($con);
    //     }
    
   


    // }

    
?>

<?php
if(isset($_GET['delid']))
{
    $eid=($_GET['delid']);
    $sql="DELETE FROM cart WHERE SrNo='$eid'";
    if(mysqli_query($con,$sql))
    {
        //echo "<script>alert('CLass deleted');</script>"; 
        echo "<script>window.location.href = 'display.php'</script>";     
    }
    else{
        echo "<script>alert('Some Error Occured!!');</script>"; 
    }
}
?>




<!-- additional script -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
