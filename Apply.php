<?php

include './database.php';

session_start();
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect to the sign-in page
    header('Location: signin.php');
    exit();
}
 // accessing the cookies
 $sql="SELECT * FROM users where id =".$_SESSION['id'];
 $query=$conn->query($sql);
 $row=$query->fetch_assoc();
 $name = $row['user_name'];
 $job_title = isset($_COOKIE['job_title']) ? $_COOKIE['job_title'] : '';
 $company_name = isset($_COOKIE['company_name']) ? $_COOKIE['company_name'] : '';
 $email = $row['email'];
 $major=$row['major'];
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply</title>
    <!-- Main css -->
    <link rel="stylesheet" href="./css/apply.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="signin">
            <div class="container">
                <div class="signin-content ">
                    <div class="signin-image">
                        <figure><img src="images/apply.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Apply</h2>
                        <form method="POST" action="Apply.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"  value="<?php echo $name; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="job_title"><i class="zmdi zmdi-case material-icons-name"></i></label>
                                <input type="text" name="job_title" id="job_title" placeholder="job-title" value="<?php echo $job_title; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="company_name"><i class="zmdi zmdi-case  material-icons-name"></i></label>
                                <input type="text" name="company_name" id="company_name" placeholder="company-name" value="<?php echo $company_name; ?>"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="major"><i class="zmdi zmdi-graduation-cap material-icons-name"></i></label>
                                <input type="text" name="major" id="major" placeholder="Major" value="<?php echo $major;?>"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="submit" />
                            </div>
                        </form>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <input type="file" name="file" id="your_pass" />
                                
                       <P>only pdf</p>
                                <button type="submit" name="upload" class="form-submit">upload file</button>
                            </div>
</form>        <a href="logout.php">logout</a>

                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>

<?php
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    
  $sql="SELECT *
FROM companies c
INNER JOIN jobs j ON j.company_id = c.id
WHERE c.name = '$company_name' AND j.job_title = '$job_title'" ; 
  
  $query=$conn->query($sql);
  $rows=$query->fetch_assoc();
  
  $job_id=$rows['id'];
  $company_id=$rows['company_id'];
  $user_id=$_SESSION['id'];
  
  
  $results="INSERT INTO job_applications (job_id,user_id,company) VALUES ('$job_id','$user_id','$company_id')";
  $value=$conn->query($results);
   $_SESSION['names']=$name;

    
    header("Location: user.php?a='.$job_id.'");
    exit();
}

?>
