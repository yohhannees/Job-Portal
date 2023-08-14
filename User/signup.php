<?php
include './database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>
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
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="User Name" required />
                            </div>
                            <div class="form-group">
                                <label for="major"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="major" id="major" placeholder="Major" required />
                            </div>
                            <div class="form-group">
                                <label for="age"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="number" name="age" id="age" placeholder="Age" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email " required />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password" id="password" placeholder="Your Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./signin.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>

<?php
// validate form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = test_input($_POST["user_name"]);
    $major = test_input($_POST["major"]);
    $age = test_input($_POST["age"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
  
    $message = "<p class='success'>Thank you for signing up, $user_name!</p>";
    echo "<script>alert('$message');</script>";
}

function test_input($data)
{
    $data = trim($data); // remove whitespace
    $data = stripslashes($data); // remove backslashes
    $data = htmlspecialchars($data); // convert special characters to HTML entities
    return $data;
}


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $user_name = $_POST['user_name'];
    $major = $_POST['major'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert the form data into the database
    $query =  "INSERT INTO users (user_name, Age, email, major, password) VALUES ('$user_name', 
    '$age', '$email','$major','$password')";
    if (mysqli_query($conn, $query)) {
        // If the datais successfully inserted into the database, redirect the user to a success page
        header("Location: ./signin.php");
        exit();
    } else {
        // If the data cannot be inserted into the database, display an error message
        echo "Error: " . mysqli_error($conn);
    }
}
?>