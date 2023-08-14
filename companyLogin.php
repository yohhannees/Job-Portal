<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company-Login</title>
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
                        <figure><img src="images/company.jpg" alt="sing up image"></figure>
                        <a href="./companyRegister.php" class="signup-image-link">Register Your Company</a>
                        <a href="./home.php" class="signup-image-link">Home page</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Company Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="company_name"><i class="zmdi zmdi-case material-icons-name"></i></label>
                                <input type="text" name="company_name" id="company_name" placeholder="Company Name"/>
                            </div>
                            <div class="form-group">
                                <label for="company_password"><i class="zmdi zmdi-key material-icons-name"></i></label>
                                <input type="password" name="company_password" id="company_password" placeholder="Password"/>
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
// Check if the login form was submitted
if (isset($_POST['signin'])) {
    // Get the company name and password from the form
    $company_name = $_POST['company_name'];
    $company_password = $_POST['company_password'];

    // Query the database for the company
    $query = "SELECT * FROM companies WHERE name='$company_name' AND passwords='$company_password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Start a session and store the company ID
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name']=$row['name'];

        // Redirect to the company dashboard
        header("Location: CompanyHome.php");
        exit();
    } else {
        // Display an error message if the login failed
        echo "Invalid company name or password.";
    }
}
?>