<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Add Customer</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])) {
            $conn=mysqli_connect('localhost','root','','bankDB');
            $name = $_POST['txtName'];
            $address = $_POST['txtAddress'];
            $addressProof = $_POST['addressProof'];
            $date = $_POST['txtBirth'];
            $contact = $_POST['txtContact'];
            $aadhaar = $_POST['txtAadhaar'];
            $nominee = $_POST['txtNomineeName'];
            $relation = $_POST['txtNomineeRelation'];

            $insert = "INSERT INTO custdetails 
                        (name, address, addressProof, birthDate, contact, aadhar, nominee, relation) 
                        VALUES ('$name','$address','$addressProof','$date','$contact','$aadhaar','$nominee','$relation')";
            
            if(mysqli_query($conn,$insert)) {
                $conn->close();
                header("location:index.php");
            }
        }
    ?>
    <div class="container">
        <center><h1>Add Customer</h1></center>
        <form method="POST">
            <div class="sm-3">
                <label class="form-label">Name</label>
                <input type="text" name="txtName" class="form-control" maxlength="20" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Address</label>
                <textarea name="txtAddress" class="form-control" maxlength="100" required></textarea>
            </div>
            <div class="sm-3">
                <label for="addressProof" class="form-label">Address Proof</label>
                <select id="addressProof" name="addressProof" class="from-select form-select-sm" style="margin-left: 20px;" required>
                    <option value="" disabled selected>Select Address Proof</option>
                    <option value="Passport">Passport</option>
                    <option value="Driving License">Driving License</option>
                    <option value="Election Card">Election Card</option>
                    <option value="Ration Card">Ration Card</option>
                    <option value="Electricity Bill">Electricity Bill</option>
                </select>
            </div>
            <div class="sm-3">
                <label class="form-label">Birth Date</label>
                <input type="date" name="txtBirth" class="form-control" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Contact Number</label>
                <input type="" pattern="\d*" name="txtContact" class="form-control" maxlength="10" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Aadhaar Number</label>
                <input type="text" pattern="\d*" name="txtAadhaar" class="form-control" maxlength="12" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Nominee Name</label>
                <input type="text" name="txtNomineeName" class="form-control" maxlength="20" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Relation with Nominee</label>
                <input type="text" name="txtNomineeRelation" class="form-control" maxlength="20" required/>
            </div>
            <div class="sm-3">
                <center>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                    <a href="index.php" id="btnCancel" class="btn btn-danger">Cancel</a>
                </center>
            </div>
        </form>
    </div>
</body>
</html>