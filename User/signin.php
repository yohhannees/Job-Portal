<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <!-- Main css -->
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="signin">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="./signup.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-key material-icons-name"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's inputs from the sign-in form
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate the user's inputs by checking if the email/username and password match the values stored in the database
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row=$result->fetch_assoc();
    if (mysqli_num_rows($result) == 1) {
        // If the user's inputs are valid, create a session and redirect to the home page
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['id']=$row['id'];
        $_SESSION['email']=$email.
        header('Location: ./user.php');
        exit();
    } else {
        // If the user's inputs are invalid, display an error message and allow the user to try again
        $message ="Invalid email/username or password. Please try again.";
        echo "<script>alert('$message');</script>";
    }
}
?>