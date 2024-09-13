<?php
    $noOfRows = isset($_GET['rows']) ? $_GET['rows'] : 25;
    $conn=mysqli_connect('localhost','root','','bankDB');
    $res=mysqli_query($conn,"SELECT COUNT(eid) AS total FROM empdetails");
    $row=$res->fetch_assoc();
    $total_pages = ceil($row['total'] / $noOfRows);
    $total_pages = $total_pages > 0 ? $total_pages : 1;
    
    for($i=1;$i <= $total_pages;$i++) {
        echo "<option value='$i'>$i</option>";
    }
    $conn->close();
?>
