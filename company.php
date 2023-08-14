<?php
// Include the database configuration file
include './database.php';
session_start();

if (!isset($_SESSION['name'])) {
  // If the user is not logged in, redirect to the sign-in page
  header('Location: companyLogin.php');
  exit();
}
if (isset($_GET['cv'])) {
  $cv = $_GET['cv'];
  $cv = "SELECT file_name,size,type FROM users WHERE id=" . $cv;
  $ex = $conn->query($cv);
  $file_info = $ex->fetch_assoc();

  $file_name = $file_info['file_name'];
  $file_path = 'upload/' . $file_name;

  // Open file and read its contents
  $file_handle = fopen($file_path, 'rb');
  $file_contents = fread($file_handle, filesize($file_path));
  fclose($file_handle);

  // Do something with file contents
  if ($file_info['type'] == 'application/pdf') {

    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $file_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file_path));
    header('Accept-Ranges: bytes');
    echo $file_contents;
  } elseif ($file_info['type'] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || $file_info['type'] == 'ppt') {
    // Download PowerPoint file
    header('Content-type: application/vnd.ms-powerpoint');
    header('Content-Disposition: attachment; filename="' . $file_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file_path));
    header('Accept-Ranges: bytes');
    echo $file_contents;
  } else {
    echo 'no file';
  }
}
if (isset($_GET['accept'])) {
  $accept = $_GET['accept'];
  if (isset($_GET['id'])) {
    $sql = "UPDATE job_applications SET status='rejected' WHERE id=" . $accept;
    $query = $conn->query($sql);
  } else {
    $sql = "UPDATE job_applications SET status='accepted' WHERE id=" . $accept;
    $query = $conn->query($sql);
  }
}
if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];
  $sql = "DELETE FROM `jobs` WHERE id=" . $delete;
  $query = $conn->query($sql);
}
// Query the jobs table
$jobs_query = "SELECT * FROM jobs";
$jobs_result = mysqli_query($conn, $jobs_query);

// Fetch all rows from the result set as an array
$jobs = mysqli_fetch_all($jobs_result, MYSQLI_ASSOC);

// Query the applications table
$applications_query = "SELECT * FROM users";
$applications_result = mysqli_query($conn, $applications_query);

// Fetch all rows from the result set as an array
$applicants = mysqli_fetch_all($applications_result, MYSQLI_ASSOC);



   $sql = "SELECT count(*) As count from job_applications WHERE status!='rejected' AND company = " . $_SESSION["id"];

  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc())
    $len = $row['count'];
 


   $query = "SELECT users.*,job_applications.* FROM users JOIN job_applications ON job_applications.user_id = users.id and job_applications.company = " . $_SESSION["id"];
  $result = $conn->query($query);
  while ($row = $result->fetch_assoc()) {
    if ($row['status'] != 'rejected') {
      $sql = "SELECT * FROM jobs WHERE id =" . $row['job_id'];
      $querys = $conn->query($sql);
      $rows = $querys->fetch_assoc();
    }
  }
