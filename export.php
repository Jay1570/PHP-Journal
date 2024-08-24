<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bankDB');

    if (isset($_POST['export'])) {
        $fileName = 'data.csv';
        $row = mysqli_query($conn, "SHOW VARIABLES LIKE 'datadir'")->fetch_assoc();
        $destination = $row['Value'].DIRECTORY_SEPARATOR."bankdb".DIRECTORY_SEPARATOR.basename($fileName);

        $sql = "
            SELECT 'name', 'address', 'addressProof', 'birthDate', 'contact', 'aadhar', 'nominee', 'relation'
            UNION ALL
            SELECT name, address, addressProof, birthDate, contact, aadhar, nominee, relation FROM custdetails
            INTO OUTFILE '$fileName'
            FIELDS TERMINATED BY ','
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
        ";

        if (mysqli_query($conn, $sql)) {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . basename($fileName));
            readfile($destination);
            unlink($destination);
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href = 'index.html';</script>";
        }

        $conn->close();
        exit();
    }
?>