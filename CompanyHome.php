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
  <!-- <p class="text-white text-center"><?php echo $_SESSION['user_name'];?></p> -->
  <a href="/job-portal/CompanyHome.php?page=postjob" id="postjob">Post A Job</a>
  <a href="/job-portal/CompanyHome.php?page=postedjob" id="postedjob">Jobs</a>
  <a href="/job-portal/CompanyHome.php?page=applications" id="applications">Applications</a>
  <a href="/job-portal/CompanyHome.php?page=rejected" id="rejected">Rejected</a>
  <a href="/job-portal/CompanyHome.php?page=accepted" id="accepted">Accepted</a>
</div>

<div class="main">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
      <div class="d-flex">
        <span class="navbar-text">
        <!-- <h1 class="text-warning text-center pt-3"><?php echo $_SESSION['user_name'];?></h1> -->
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
        $page = 'postjob';
      }
      if($page == 'postjob') {
       
        include('postjob.php');
      } else if($page == 'applications') {
       
        include('applications.php');
      } else if($page == 'accepted') {
      
        include('accepted.php');
      } else if($page == 'rejected') {
        
        include('rejected.php');
      } 
      else if($page == 'postedjob') {
        include('postedjob.php');
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

  


</script>

</body>
</html>