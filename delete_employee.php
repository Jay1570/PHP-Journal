<?php
    $conn=mysqli_connect('localhost','root','','bankDB');
    $delete="DELETE FROM empdetails WHERE eid=".$_GET['id'];
    mysqli_query($conn,$delete);
    $conn->close();
    header("location:view_employee.php");
?>
