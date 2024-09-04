<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Customers</title>
    </head>
    <body>
        <?php
            if(isset($_COOKIE['email'])) {
                header("location:main.html");
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
                    header('location:main.html');
                }
            }
        ?>
        <div class="container">
            <center><h1>Login</h1></center>
            <form method="post">
                <div class="sm-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter Email" required />
                </div>
                <div class="sm-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter Password" required />
                </div>
                <div class="row mt-3">
                    <div class="col sm-3">
                        <center><button class="btn btn-primary" type="submit" name="login">Login</button></center>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
