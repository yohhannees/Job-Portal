<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company-Register </title>
    <!-- Main css -->
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Company Register</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="company_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="company_name" id="company_name" placeholder="Comany Name" />
                            </div>
                            <div class="form-group">
                                <label for="company_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="company_email" name="company_email" id="company_email" placeholder="Company Email" />
                            </div>
                            <div class="form-group">
                                <label for="company_password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="company_password" name="company_password" id="company_password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/company.jpg"></figure>
                        <a href="./companyLogin.php" class="signup-image-link">We Are Already member</a>
                        <a href="./home.php" class="signup-image-link">Home page</a>
                    </div>
                </div>
            </div>
        </section>
      
</body>

</html>
<?php

// Check if the form has been submitted
if (isset($_POST['signup'])) {
    // Get the form data
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_password = $_POST['company_password'];

    // Insert the form data into the database
    $sql = "INSERT INTO companies (name, email, passwords) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $company_name, $company_email, $company_password);
    $stmt->execute();

    // Redirect to the login page
    header("Location: ./companyLogin.php");
    exit();
}
?>