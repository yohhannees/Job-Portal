<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Login</title>
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
                        <figure><img src="images/admin.jpg" alt="sing up image"></figure>
                        <a href="./home.php" class="signup-image-link">Home Page</a>
                        <a href="./AdminRegister.php" class="signup-image-link">Create an Admin</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Admin Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="Admin_name"><i class="zmdi zmdi-case person-icons-name"></i></label>
                                <input type="text" name="Admin_name" id="Admin_name" placeholder="Admin Name"/>
                            </div>
                            <div class="form-group">
                                <label for="company_password"><i class="zmdi zmdi-key material-icons-name"></i></label>
                                <input type="password" name="Admin_password" id="Admin_password" placeholder="Password"/>
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


if(isset($_POST['signin'])) {
  // Get the values submitted in the form
  $admin_name = $_POST['Admin_name'];
  $admin_password = $_POST['Admin_password'];

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("SELECT * FROM admins WHERE name = ? AND password = ?");
  $stmt->bind_param("ss", $admin_name, $admin_password);

  // Execute the statement and check for errors
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['Admin_name'] = $admin_name;
      echo "Admin logged in successfully!";
      header("Location: Admin.php");
      exit();

      
    } else {
      echo "Invalid username or password.";
    }
  } else {
    echo "Error: " . $stmt->error;
  }

  // Close the statement and the database connection
  $stmt->close();
  $conn->close();
}
?>
