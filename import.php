<?php
    $conn=mysqli_connect('localhost','root','','bankDB');
    if(isset($_POST['import'])) {
        $filename = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if ($fileExtension !== 'csv') {
            $conn->close();
            echo "<script>alert('Error: Only CSV files are allowed'); window.location.href = 'index.html';</script>";
            exit();
        }

        $row = mysqli_query($conn, "SHOW VARIABLES LIKE 'datadir'")->fetch_assoc();
        $destination = $row['Value'].DIRECTORY_SEPARATOR."bankdb".DIRECTORY_SEPARATOR.basename($filename);
        if (!move_uploaded_file($fileTmpName, $destination)) {
            $conn->close();
            echo "<script>alert('Error: Failed to move uploaded file.'); window.location.href = 'index.html';</script>";
            exit();
        }
        $sql = "
            LOAD DATA INFILE '$filename'
            INTO TABLE custdetails 
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\\n'
            IGNORE 1 ROWS
            (name, address, addressProof, birthDate, contact, aadhar, nominee, relation)
        ";
        if(mysqli_query($conn,$sql)) {
            $conn->close();
            echo "<script>alert('Data Imported Successfully'); window.location.href = 'index.html';</script>";
            unlink($destination);
            unlink($fileTmpName);
        } else {
            $conn->close();
            echo "<script>alert('Error:".$conn->error."'); window.location.href = 'index.html';</script>";
        }
    }
?>