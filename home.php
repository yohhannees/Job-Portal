<?php
include './database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css">
    <link  rel="stylesheet" href="./css/animation.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
</head>

<body>

    <body class="bbody">

        <header class="hheader">
            <h4>Job-Net</h4>
            <a href="user.php"><p>User</p>
            <a href="company.php"><p>Company</p>
            <a href="Admin.php"><p>Admin</p></a>
        </header>
        <div class="ccontainer">

            <div class="ppanel">
                <div class="front"></div>
                <div class="back"></div>
            </div>
            <div class="ppanel">
                <div class="front"></div>
                <div class="back"></div>
            </div>
            <div class="ppanel">
                <div class="front"></div>
                <div class="back"></div>
            </div>
            <div class="ppanel">
                <div class="front"></div>
                <div class="back"></div>
            </div>
        </div>
        <div class="layer">
            <h1>Find<span>Your</span>DreamJob</h1>
            <p class="replay">Login</p>
            <div class="cta">
                <p></p><br>
                <p ><a href="./signup.php" class="btn">Register</a></p>
            
            </div>
        </div>
       
   <div >

   </div>
       
   <div>

   </div>

    <!-- search section -->
    
    <div class="container find search">
        <form method="get" action="" class="search-container">
            <div class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                </div>
            </div>
        </form>
    </div>
    <!-- search section -->

    <!-- services section starts  -->
    <section class="services">
  
        <h1 class="heading-title">Categories</h1>
        <div class="box-container">
            <div class="box">
                <a href="?field=All">
                    <img src="images/all.png" alt="">
                    <h3>All Jobs</h3>
                </a>
            </div>
            <div class="box">
                <a href="?field=Technology">
                    <img src="images/technology.png" alt="">
                    <h3>Technology</h3>
                </a>
            </div>
            <a href="?field=Healthcare" class="box">
                <img src="images/healthcare.png" alt="">
                <h3>Healthcare</h3>
            </a>
            <!-- <a class="box">
            </div> -->
            <div class="box">
                <a href="?field=BusinessAndFinance">
                    <img src="images/business.png" alt="">
                    <h3>Business And Finance</h3>
                </a>
            </div>
            <div class="box">
                <a href="?field=ArtsandCulture">
                    <img src="images/download.png" alt="">
                    <h3>Arts and Culture</h3>
                </a>
            </div>
            <div class="box">
                <a href="?field=Education">
                    <img src="images/education.png" alt="">
                    <h3>Education</h3>
                </a>
            </div>
        </div>
    </section>
   
    <!-- services section ends   -->
    <?php
    // Define the $sql variable with a default value
    $sql = "SELECT * FROM jobs";

   

    // Check if the `query` parameter is set in the URL
  
         

    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
    
        echo '<section id="gallery">';
        echo ' <div class="container">';
        echo '<div class="row">';
        $data="SELECT * FROM companies
		JOIN jobs ON companies.id = jobs.company_id ";
        if (isset($_GET['field'])) {
            $field = $_GET['field'];
        
            if ($field != 'All') {
                // Modify the $sql variable to filter jobs by field
                $data="SELECT * FROM companies
                JOIN jobs ON companies.id = jobs.company_id WHERE field='$field'";
            }
        }  if (isset($_GET['query'])) {
            $query = $_GET['query'];
            // Modify the $data variable to search for matches in the job title and description fields
            $data .= " WHERE (job_title LIKE '%$query%' OR field LIKE '%$query%')";
        }
        
		$datas=$conn->query($data);
		
        while ($row = $datas->fetch_assoc() ) {
            $text = $row['job_description'];
            $max_length = 120; // The maximum length of the text before truncation

            if (strlen($text) > $max_length) {
           $truncated_text = substr($text, 0, $max_length) . "...";
            }
            else {
             $truncated_text = $text;
            }
     
            echo '<div class="col-lg-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title font-weight-bold">' . htmlspecialchars($row['job_title']) . '</h5>';
            echo '<h5 class="card-title font-weight-bold text-success">' . htmlspecialchars($row['field']) . '</h5>';
            echo '<i class="fas fa-building d-inline"></i><p class="card-text font-weight-bold d-inline" style="font-size: 14px;"> ' . htmlspecialchars($row['name']) . '</p>';
            echo '<p class="card-text font-weight-bold">' . htmlspecialchars( $truncated_text) . '</p>';
            echo '<i class="fas fa-users d-inline"></i><p class="card-text font-weight-bold d-inline text-danger" ><strong>Applicants :</strong> ';
            
            $query = "SELECT count(*) As counts from job_applications WHERE job_id = ".$row["id"];
                                  $result=$conn->query($query);
                                  while($rows=$result->fetch_assoc())
                                  $count=$rows['counts'];
                                  echo $count;
           echo ' </p><br>';
            echo '<a href="user.php" class="btn btn-outline-success btn-lg w-50">Apply</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</section>';
    } else {
        echo '<div class="alert alert-danger text-center font-weight-bold" role="alert" style=" margin: 0 auto;">No Jobs found.</div>';
    }

    $conn->close();
    ?>
    <!-- footer section starts -->
    <section class="footer ">
        <div class="box-container">
            <div class="box">
                <h3>User</h3>
                <a href="signup.php"> <i class="fas fa-angle-right"></i> Register</a>
                <a href="user.php"> <i class="fas fa-angle-right"></i>user </a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="Admin.php"> <i class="fas fa-angle-right"></i>Admin </a>
                <a href="company.php"> <i class="fas fa-angle-right"></i>Company</a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-envelope text-warning"></i> JobNet@gmail.com</a>
                <a href="#"> <i class="fas fa-map-marker-alt text-warning"></i> Ethiopia, AddisAbaba - 1000</a>
            </div>
        </div>
       
    </section>
    <!-- footer section ends  -->
    <!--  swiper js link-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="./js/script.js"></script>
    <script src="./js/animation.js"></script>
   
</body>

</html>
<?php
// setcookie("name", $name, time() + (86400 * 30), "/"); // 86400 = 1 day
// setcookie("job_title", $job_title, time() + (86400 * 30), "/");
// setcookie("company_name", $company_name, time() + (86400 * 30), "/");
// setcookie("email", $email, time() + (86400 * 30), "/");
?>