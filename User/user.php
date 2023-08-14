<?php 
include ("database.php") ;
session_start();
if (!isset($_SESSION['email'])) {
  // If the user is not logged in, redirect to the sign-in page
  header('Location: signin.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/new.css">
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <h1 class="text-warning text-center pt-3"><?php echo $_SESSION['user_name'];?></h1>
  <a href="/job-portal/user.php?page=profile" id="profile">Profile</a>
  <a href="/job-portal/user.php?page=jobs" id="jobs">Jobs</a>
  <a href="/job-portal/user.php?page=appliedjob" id="appliedJobs">Applied Jobs</a>
  <a href="/job-portal/user.php?page=acceptedjob" id="acceptedJobs">Accepted Jobs</a>
  <a href="/job-portal/user.php?page=rejectedjob" id="rejectedJobs">Rejected Jobs</a>
</div>

<div class="main">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
      <div class="d-flex">
        <span class="navbar-text">
        <h1 class="text-warning text-center pt-3"><?php echo $_SESSION['user_name'];?></h1>
        </span>
        <a class="btn btn-outline-primary ms-2" href="logout.php">Log out</a>
      </div>
    </div>
  </nav>
  
  <div id="content">
    <!-- Content will be loaded here -->
    <?php 
      $page = '';
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 'jobs';
      }
      if($page == 'jobs') {
       
        include('jobs.php');
      } else if($page == 'appliedjob') {
       
        include('appliedjob.php');
      } else if($page == 'profile') {
      
        include('profile.php');
      } else if($page == 'acceptedjob') {
        
        include('acceptedjob.php');
      } else if($page == 'rejectedjob') {
        include('rejectedjob.php');
      }
    ?>
  </div>
</div>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }

  

  // Functions to load content for each section
  function loadJobs() {
    // Load jobs content here
    
  }

  function loadAppliedJobs() {
    // Load applied jobs content here
  }

  function loadProfile() {
    // Load profile content here
  }

  function loadAcceptedJobs() {
    // Load accepted jobs content here
  }

  function loadRejectedJobs() {
    // Load rejected jobs content here
  }
</script>

</body>
</html>