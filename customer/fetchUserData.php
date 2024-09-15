<?php
    $conn=mysqli_connect('localhost','root','','bankDB');
    $res=mysqli_query($conn,"SELECT * FROM custdetails WHERE cid=".$_GET['id']);
    $row=$res->fetch_assoc();
    $conn->close(); 
?>