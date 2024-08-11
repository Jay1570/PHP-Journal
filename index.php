<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Customers</title>
</head>
<body>
    <?php
        $conn=mysqli_connect('localhost','root','','bankDB');
        $res=mysqli_query($conn,"SELECT cid, name, contact FROM custdetails");
        $conn->close();
    ?>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm">
                <a href="add.php" class="btn btn-success" id="btnAdd">Add Record</a>
            </div>
            <div class="col-sm">
                <a href="truncate.php" class="btn btn-danger" id="btnTruncate">Empty Table</a>
            </div>
            <div class="col-sm">
                <form class="form-inline justify-content-end" method="POST" action="search.php">
                    <div class="input-group">
                        <input type="text" name="aadhaar" class="form-control mt-2" pattern="\d*" minlength="12" maxlength="12" placeholder="Enter Aadhaar Number to Search" required/>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-success mt-2" name="search" id="">Search Record</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <center><h1>Customers</h1></center>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
            <?php
                if($res->num_rows>0) :
                    while ($row=$res->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['cid'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['contact'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $row['cid']?>" class="btn btn-success">View</a>
                    <a href="delete.php?id=<?php echo $row['cid']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
                    endwhile;
                endif;
            ?>
        </table>
    </div>
</body>
</html>