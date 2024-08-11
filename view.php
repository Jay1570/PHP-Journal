<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Customer Details</title>
</head>
<body>
    <?php
        $conn=mysqli_connect('localhost','root','','bankDB');
        $res=mysqli_query($conn,"SELECT * FROM custdetails WHERE cid=".$_GET['id']);
        $row=$res->fetch_assoc();
        $conn->close(); 
    ?>
    <div class="container">
        <center><h1>Customer Details</h1></center>
        <table class="table table-bordered table-striped table-sm" style="width: 100%;">
            <tr>
                <th scope="row" style="width: 30%">Id</th>
                <td><?php echo $row['cid'] ?></td>
            </tr>
            <tr>
                <th scope="row">Name</th>
                <td><?php echo $row['name'] ?></td>
            </tr>
            <tr>
                <th scope="row">Aadhaar Card Number</th>
                <td><?php echo $row['aadhar'] ?></td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td><?php echo $row['address'] ?></td>
            </tr>
            <tr>
                <th scope="row">Address Proof</th>
                <td><?php echo $row['addressProof'] ?></td>
            </tr>
            <tr>
                <th scope="row">Date Of Birth</th>
                <td><?php echo $row['birthDate'] ?></td>
            </tr>
            <tr>
                <th scope="row">Contact Number</th>
                <td><?php echo $row['contact'] ?></td>
            </tr>
            <tr>
                <th scope="row">Nominee Name</th>
                <td><?php echo $row['nominee'] ?></td>
            </tr>
            <tr>
                <th scope="row">Relation With Nominee</th>
                <td><?php echo $row['relation'] ?></td>
            </tr>
        </table>
        <center>
            <a href="edit.php?id=<?php echo $row['cid'] ?>" class="btn btn-warning">Edit</a>
            <a href="delete.php?id=<?php echo $row['cid'] ?>" class="btn btn-danger">Delete</a>
            <a href="index.php" class="btn btn-secondary">Go Back</a>
        </center>
    </div>
</body>
</html>