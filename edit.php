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
        require_once 'fetchUserData.php';
        $selectedProof = $row['addressProof'];
    ?>
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

            $update = "UPDATE custdetails SET
                        name='$name',
                        address='$address', 
                        addressProof='$addressProof', 
                        birthDate='$date', contact=$contact, 
                        aadhar=$aadhaar, 
                        nominee='$nominee', 
                        relation='$relation' WHERE cid = ".$_GET['id'];
            
            if(mysqli_query($conn,$update)) {
                $conn->close();
                header("location:view.php?id=".$row['cid']);
            }
        }
    ?>
    <div class="container">
        <center><h1>Edit Details</h1></center>
        <form method="POST">
            <div class="sm-3">
                <label class="form-label">Name</label>
                <input type="text" name="txtName" class="form-control" maxlength="20" value="<?php echo $row['name'] ?>" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Address</label>
                <textarea name="txtAddress" class="form-control" maxlength="100" required><?php echo $row['address']?></textarea>
            </div>
            <div class="sm-3">
                <label for="addressProof" class="form-label">Address Proof</label>
                <select id="addressProof" name="addressProof" class="from-select form-select-sm" style="margin-left: 20px;" required>
                    <option value="" disabled>Select Address Proof</option>
                    <option value="Passport" <?php if($selectedProof == "Passport") echo "selected"?>>Passport</option>
                    <option value="Driving License" <?php if($selectedProof == "Driving License") echo "selected"?>>Driving License</option>
                    <option value="Election Card" <?php if($selectedProof == "Election Card") echo "selected"?>>Election Card</option>
                    <option value="Ration Card" <?php if($selectedProof == "Ration Card") echo "selected"?>>Ration Card</option>
                    <option value="Electricity Bill" <?php if($selectedProof == "Electricity Bill") echo "selected"?>>Electricity Bill</option>
                </select>
            </div>
            <div class="sm-3">
                <label class="form-label">Birth Date</label>
                <input type="date" name="txtBirth" class="form-control" value="<?php echo $row['birthDate'] ?>" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Contact Number</label>
                <input type="" pattern="\d*" name="txtContact" class="form-control" value="<?php echo $row['contact'] ?>" maxlength="10" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Aadhaar Number</label>
                <input type="text" pattern="\d*" name="txtAadhaar" class="form-control" value="<?php echo $row['aadhar'] ?>" maxlength="12" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Nominee Name</label>
                <input type="text" name="txtNomineeName" class="form-control" value="<?php echo $row['nominee'] ?>" maxlength="20" required/>
            </div>
            <div class="sm-3">
                <label class="form-label">Relation with Nominee</label>
                <input type="text" name="txtNomineeRelation" class="form-control" value="<?php echo $row['relation'] ?>" maxlength="20" required/>
            </div>
            <div class="sm-3">
                <center>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Update</button>
                    <a href="view.php?id=<?php echo $row['cid']?>" id="btnCancel" class="btn btn-danger">Cancel</a>
                </center>
            </div>
        </form>
    </div>
</body>
</html>