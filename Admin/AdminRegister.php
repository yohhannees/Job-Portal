<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Register </title>
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
                        <h2 class="form-title">Admin Register</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="Admin_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Admin_name" id="Admin_name" placeholder="Admin name" />
                            </div>
                            <div class="form-group">
                                <label for="Admin_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="Admin_email" name="Admin_email" id="Admin_email" placeholder="Admin Email" />
                            </div>
                            <div class="form-group">
                                <label for="Admin_password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="Admin_password" name="Admin_password" id="Admin_password" placeholder="Password" />
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
                        <figure><img src="images/admin.jpg"></figure>
                        <a href="./AdminLogin.php" class="signup-image-link"> Already Registered</a>
                        <a href="./home.php" class="signup-image-link">Home page</a>
                    </div>
                </div>
            </div>
        </section>
      
</body>

</html>
<?php


if(isset($_POST['signup'])) {
  // Get the values submitted in the form
  $admin_name = $_POST['Admin_name'];
  $admin_email = $_POST['Admin_email'];
  $admin_password = $_POST['Admin_password'];

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("INSERT INTO admins (name,email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $admin_name, $admin_email, $admin_password);

  // Execute the statement and check for errors
  if ($stmt->execute()) {
    echo "Admin registered successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  // Close the statement and the database connection
  $stmt->close();
  $conn->close();
}
?>