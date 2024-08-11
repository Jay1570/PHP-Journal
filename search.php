<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>
<body>
    <?php
        $conn=mysqli_connect('localhost','root','','bankDB');
        $res=mysqli_query($conn,"SELECT cid, name, contact FROM custdetails WHERE aadhar=".$_POST['aadhaar']);
        $conn->close();
    ?>
    <div class="container">
        <div class="col-sm">
        <a href="index.php" class="btn btn-warning" id="btnAdd">Go Back</a>
        <p>Search Results For :- <?php echo $_POST['aadhaar']?></p>
        </div>
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