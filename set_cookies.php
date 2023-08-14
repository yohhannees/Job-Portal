<?php
include_once ("database.php");
session_start();

if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect to the sign-in page
    header('Location: signin.php');
    exit();
}

// Get the job title and company name from the URL
$job_title = urldecode($_GET['job_title']);
$company_name = urldecode($_GET['company_name']);

// Get the user's name and email from the session
$name = $_SESSION['name'];
$email = $_SESSION['email'];

// Set the cookies
setcookie("name", $name, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("job_title", $job_title, time() + (86400 * 30), "/");
setcookie("company_name", $company_name, time() + (86400 * 30), "/");
setcookie("email", $email, time() + (86400 * 30), "/");
$data="SELECT * FROM companies 
JOIN jobs ON companies.name ='$company_name' AND jobs.job_title='$job_title'";
$datas=$conn->query($data);
$row=$datas->fetch_assoc();

$_SESSION['company_id'] =$row['company_id'];
$_SESSION['job_id']=$row['id'] ;


header('Location: Apply.php');
exit();

?>
