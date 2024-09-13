<?php
    $conn=mysqli_connect('localhost','root','','bankDB');
    $delete="DELETE FROM custdetails WHERE cid=".$_GET['id'];
    mysqli_query($conn,$delete);
    $conn->close();
    header("location:main.php");
?>
