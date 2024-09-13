<?php
    $query = $_GET['query']."%";
    $conn = mysqli_connect('localhost','root','','bankDB');
    $stmt = $conn->prepare("SELECT cid, name, contact FROM custdetails WHERE CAST(aadhar AS CHAR) LIKE ?");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $res = $stmt->get_result();

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
