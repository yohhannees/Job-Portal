<?php
include './database.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Post Job</title>
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
            <figure><img src="images/postjob.jpg" alt="sing up image"></figure>
            <a href="./company.php" class="signup-image-link"> Company Portal</a>
            <a href="./home.php" class="signup-image-link"> home Page</a>
            
          </div>

          <div class="signin-form">
            <h2 class="form-title">Create Job Post</h2>
            <form method="POST" class="register-form" id="post-form" action="postjob.php">
              <div class="form-group">
                <label for="job_title"><i class="zmdi zmdi-assignment material-icons-name"></i></label>
                <input type="text" name="job_title" id="job_title" placeholder="Job Title" />
              </div>
              <div class="form-group">
                <label for="company_name"><i class="zmdi zmdi-case material-icons-name"></i></label>
                <input type="text" name="company_name" id="company_name" value="<?php echo $_SESSION['name'];?>" />
              </div>
              <div class="form-group d-flex">
              <i class="zmdi zmdi-comment-text material-icons-name mr-2 mt-1"></i>
                <label for="field" class="mr-5 pr-4"></label>
                    <select id="field" name="field">
                      <option value="Technology">Technology</option>
                      <option value="Healthcare">Healthcare</option>
                      <option value="BusinessAndFinance">Business And Finance</option>
                      <option value="ArtsandCulture">Arts and Culture</option>
                      <option value="Education">Education</option>
                    </select>
              </div>
              <div class="form-group">
                
                <label for="job_description"></label>
                <textarea name="job_description" id="job_description" placeholder="Job Description"></textarea>
              </div>
              <div class="form-group">
                <label for="requirements"></label>
                <textarea name="requirements" id="requirements" placeholder="Requirement"></textarea>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="post_job" id="post_job" class="form-submit" value="Post" />
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
include './database.php';

// Check if the form has been submitted
if (isset($_POST['post_job'])) {
    // Get the form data
    $job_title = $_POST['job_title'];
    $company_id=$_SESSION['id'];
    $field = $_POST['field'];
    $job_description = $_POST['job_description'];
    $requirments = $_POST['requirements'];

    $sql = "INSERT INTO jobs (job_title, field, job_description, requirements,company_id) VALUES ('$job_title', '$field', '$job_description', '$requirments','$company_id')";
    $query=$conn->query($sql);
    
    if ($query) {
        echo '<div class="alert alert-success text-center font-weight-bold" role="alert" style=" margin: 0 auto;">Job posted successfully.</div>';
        header("location: companyHome.php");
    } else {
        echo '<div class="alert alert-danger text-center font-weight-bold" role="alert" style=" margin: 0 auto;">Error posting job: ' . $conn->error . '</div>';
    }
}


?>