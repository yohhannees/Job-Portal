<?php 
include ("company.php") ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All-Jobs</title>
</head>

<body>
<div class="container">
  <div class="row">
    <?php foreach ($jobs as $job) : ?>
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body">
            <?php if($job["company_id"] != $_SESSION['id']) continue; ?> 
            <h5 class="card-title"><i class="bi bi-briefcase"></i> <?php echo $job['job_title']; ?></h5>
            <p class="card-text"><i class="bi bi-file-earmark-text"></i> <?php echo $job['job_description']; ?></p>
            <p class="card-text"><i class="bi bi-briefcase-fill"></i> <?php echo $job['field']; ?></p>
            <p class="card-text"><i class="bi bi-check-square-fill"></i> Requirements:</p>
            <ul class="list-group list-group-flush">
              <?php foreach (explode("\n", $job['requirements']) as $requirement) : ?>
                <li class="list-group-item"><i class="bi bi-check"></i> <?php echo $requirement; ?></li>
              <?php endforeach; ?>
            </ul>
            <p class="card-text"><i class="bi bi-people-fill"></i> No. of People Applied:
              <?php  
                $query = "SELECT count(*) As counts from job_applications WHERE job_id = ".$job["id"];
                $result=$conn->query($query);
                while($row=$result->fetch_assoc())
                  $count=$row['counts'];
                echo $count;
              ?>
            </p>
            <a href="CompanyHome.php?delete=<?php echo $job['id']; ?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</body>

</html>