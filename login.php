<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch'
        href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    include("connection/connect.php"); //INCLUDE CONNECTION
    error_reporting(0); // hide undefined index errors
    session_start(); // temp sessions
    if (isset($_POST['submit']))   // if button is submit
    {
        $username = htmlspecialchars($_POST['username']);  //fetch records from login form
        $password = $_POST['password'];

        if (!empty($_POST["submit"]))   // if records were not empty
        {
            $login_query = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
            $result = mysqli_query($db, $login_query); //executing
            $row = mysqli_fetch_array($result);
            if (is_array($row))  // if matching records in the array & if everything is right
            {
                $_SESSION["user_id"] = $row['u_id']; // put user id into temp session
                header("refresh:0;url=index.php"); // redirect to index.php page
                //            header("Location: ./index.php"); // redirect to index.php page but fix
            } else {
                $message = "Invalid Username or Password!"; // throw error
            }
        }
    }
    ?>

    <!-- Form Mixin-->
    <!-- Input Mixin-->
    <!-- Button Mixin-->
    <!-- Pen Title-->
    <div class="pen-title">
        <a href="index.php">
            <img src="images/the-green-logo.png" alt="">
        </a>
    </div>
    <!-- Form Module-->
    <div class="module form-module">
        <div class="toggle">

        </div>
        <div class="form">
            <h2>Login to your account</h2>
            <span style="color:red;"><?php echo "<p>" . $message . "</p>"; ?></span>
            <span style="color:green;"><?php echo $success; ?></span>
            <form action="" method="post" onsubmit="return true;">
                <input type="text" placeholder="Username" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <input type="submit" id="buttn" name="submit" value="login" />
            </form>
        </div>

        <div class="cta">Not registered?<a href="registration.php" style="color:var(--primary-color);"> Create an
                account</a></div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>