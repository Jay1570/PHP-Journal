<?php
    $pageNo = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $noOfRows = isset($_GET['rows']) ? (int)$_GET['rows'] : 25;
    $startFrom = ($pageNo-1) * $noOfRows;
    $conn = mysqli_connect('localhost','root','','bankDB');
    $sql = "SELECT eid, email, password FROM empdetails LIMIT $startFrom, $noOfRows";
    $res = $conn->query($sql);
    echo "
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    ";

    while($row=$res->fetch_assoc()) {
        echo '
            <tr>
                <td>'.$row['eid'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['password'].'</td>
                <td>
                    <a href="delete_employee.php?id='.$row['eid'].'" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        ';
    }
    $conn->close();
?>
