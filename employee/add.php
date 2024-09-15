<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Add Employee</title>
    </head>
    <body>
        <header>
            <?php include_once 'navbar.html'?>
        </header>
        <?php
            if(isset($_POST['add'])) {
                $conn=mysqli_connect('localhost','root','','bankDB');

                $email=$_POST['email'];
                $pass=$_POST['password'];
                $conPass=$_POST['confirmPassword'];
                
                if($pass != $conPass) {
                    echo "<script>alert('Password and Confirm password does not match...'); window.location.href = 'add.php';</script>";
                    $conn->close();
                    die();
                }
                $query="SELECT * FROM empdetails WHERE email='$email'";
                $res=$conn->query($query);
                if($res->num_rows > 0) {
                    echo "<script>alert('Email already exists...'); window.location.href = 'add.php';</script>";
                    $conn->close();
                    die();
                }
                $insert="INSERT INTO empdetails (email,password) VALUES (?,?)";
                $stmt=$conn->prepare($insert);
                $stmt->bind_param("ss", $email, $pass);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header("location:index.php");
            }
        ?>
        <div class="container">
            <center><h1>Add Employee</h1></center>
            <form method="post">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group mt-5">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email" required />
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter Password" required />
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input class="form-control" id="confirmPassword" type="password" name="confirmPassword" placeholder="Enter Password Again" required />
                        </div>
                        <div class="form-group mt-5">
                            <button class="btn btn-primary form-control" type="submit" name="add">Add Employee</button>
                        </div>
                        <div class="form-group mt-3">
                            <a class="btn btn-danger form-control" href="index.php">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
