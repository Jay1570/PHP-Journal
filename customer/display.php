<?php
    $pageNo = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $noOfRows = isset($_GET['rows']) ? (int)$_GET['rows'] : 25;
    $startFrom = ($pageNo-1) * $noOfRows;
    $conn = mysqli_connect('localhost','root','','bankDB');
    $sql = "SELECT cid, name, contact FROM custdetails LIMIT $startFrom, $noOfRows";
    $res = $conn->query($sql);

    echo "
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    ";

    while($row=$res->fetch_assoc()) {
        echo '
            <tr>
                <td>'.$row['cid'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['contact'].'</td>
                <td>
                    <a href="view.php?id='.$row['cid'].'" class="btn btn-success">View</a>
                    <a href="delete.php?id='.$row['cid'].'" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        ';
    }
    $conn->close();
?>
