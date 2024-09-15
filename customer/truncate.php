<?php
    $conn=mysqli_connect('localhost','root','','bankDB');
    $delete="TRUNCATE TABLE custdetails";
    mysqli_query($conn,$delete);
    $conn->close();
    header("location:index.php");
?>
