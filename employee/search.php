<?php
    $query=$_GET['query']."%";
    $conn = mysqli_connect('localhost','root','','bankDB');
    $stmt = $conn->prepare("SELECT eid, email, password FROM empdetails WHERE email LIKE ?");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $res = $stmt->get_result();
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
                    <a href="delete.php?id='.$row['eid'].'" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        ';
    }
    $conn->close();
?>
