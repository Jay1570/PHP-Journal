<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <?php
            if(isset($_COOKIE['email'])) {
                session_start();
                $_SESSION['email'] = $_COOKIE['email'];
                header("location:customer/index.php");
            }
        ?>
        <?php
            if(isset($_POST['login'])) {
                $conn=mysqli_connect('localhost','root','','bankDB');

                $email=$_POST['email'];
                $pass=$_POST['password'];

                $query="SELECT * FROM empdetails WHERE email='$email' AND password='$pass'";
                $res=$conn->query($query);
                if($res->num_rows > 0) {
                    setcookie('email', $email, time() + 600, "/");
                    session_start();
                    $_SESSION['email'] = $email;
                    header('location:customer/index.php');
                } else {
                    echo "<script>alert('Email or Password is incorrect'); window.location.href = 'index.php';</script>";
                }
            }
        ?>
        <div class="container">
            <center><h1>Login</h1></center>
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
                        <div class="form-group mt-5">
                            <button class="btn btn-primary form-control" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
