<?php 
include ("database.php") ;
session_start();

if (!isset($_SESSION['Admin_name'])??'Admin') {
  // If the user is not logged in, redirect to the sign-in page
  header('Location: AdminLogin.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Admin</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >Job Net</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
            <a
          class="navbar-brand me-auto ms-lg-0 ms-3  fw-bold"
          href="#"
          > Admin </a>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Edit account</a></li>
                <li><a class="dropdown-item" href="logout.php">logout</a></li>
               
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                Admin
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"></span>
                <span><i class="bi bi-person" style="font-size: 80px;"></i></span>
                <br>&nbsp
                <?php echo $_SESSION['Admin_name'];?>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Tables
              </div>
            </li>
            <li>
              <a href="?value=jobs" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Jobs</span>
              </a>
            </li>
            <li>
              <a href="?value=company" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Company List</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Actions
              </div>
            </li>
            <li>
              <a href="logout.php?val=1" class="nav-link px-3">
                
                <span>Logout</span>
              </a>
            </li>
           
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <a href="?value=user">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">User List</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
             </a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="?value=company">
            <div class="card bg-warning text-dark h-100">
              <div class="card-body py-5">Company list</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div></a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="?value=jobs">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Job list</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div></a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="?value=accepted">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">Accepted</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
</a>
          </div>
        </div>
      
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table
              </div>
              <div class="card-body">
                <?php 
                if (isset($_GET['value'])) {
                  $field = $_GET['value'];
              
                  if ($field == 'jobs') {
                      // Modify the $sql variable to filter jobs by field
                      $query = "SELECT * FROM jobs ";
                      echo '<div class="table-responsive">
                      <table
                        id="example"
                        class="table table-striped data-table"
                        style="width: 100%"
                      >
                        <thead>
                          <tr>
                            <th>Job Title</th>
                            <th>Field</th>
                            <th>Job Description</th>
                            <th>Requirment</th>
                            
                          </tr>
                        </thead>
                        <tbody>';
                          $result=$conn->query($query);
                          while($row=$result->fetch_assoc()){
                           echo '<tr>';
                           echo '<td>'.$row['job_title'].'</td>';
                           echo '<td>'.$row['field'].'</td>';
                           echo '<td>'.$row['job_description'].'</td>';
                           echo '<td>'.$row['requirements'].'</td>';
                          echo '</tr>';}}

                  elseif($field=='Accepted'){
              echo '<div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>major</th>
                        
                      </tr>
                    </thead>
                    <tbody>';
                      
                    $query="SELECT users.*,job_applications.* FROM users JOIN job_applications ON
                     job_applications.user_id = users.id and job_applications.status='accepted'";
                      $result=$conn->query($query);
                      while($row=$result->fetch_assoc()){
                       echo '<tr>';
                       echo '<td>'.$row['user_name'].'</td>';
                       echo '<td>'.$row['Age'].'</td>';
                       echo '<td>'.$row['email'].'</td>';
                       echo '<td>'.$row['major'].'</td>';
                      echo '</tr>';}}
                      elseif($field=='company'){
                        echo '<div class="table-responsive">
                            <table
                              id="example"
                              class="table table-striped data-table"
                              style="width: 100%"
                            >
                              <thead>
                                <tr>
                                  <th>Company Name</th>
                                  <th>Email</th>
                                  <th>Description</th>
                                  <th>Location</th>
                                  
                                </tr>
                              </thead>
                              <tbody>';
                                
                                $query="SELECT * FROM companies";
                                $result=$conn->query($query);
                                while($row=$result->fetch_assoc()){
                                 echo '<tr>';
                                 echo '<td>'.$row['name'].'</td>';
                                 echo '<td>'.$row['email'].'</td>';
                                 echo '<td>'.$row['description'].'</td>';
                                 echo '<td>'.$row['location'].'</td>';
                                echo '</tr>';}}}?>
                                <?php 
                                 
                                  echo '<div class="table-responsive">
                                      <table
                                        id="example"
                                        class="table table-striped data-table"
                                        style="width: 100%"
                                      >
                                        <thead>
                                          <tr>
                                            <th>User Name</th>
                                            <th>Age</th>
                                            <th>Email</th>
                                            <th>major</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>';
                                          
                                          $query="SELECT * FROM users";
                                          $result=$conn->query($query);
                                          while($row=$result->fetch_assoc()){
                                           echo '<tr>';
                                           echo '<td>'.$row['user_name'].'</td>';
                                           echo '<td>'.$row['Age'].'</td>';
                                           echo '<td>'.$row['email'].'</td>';
                                           echo '<td>'.$row['major'].'</td>';
                                          echo '</tr>';}?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>
