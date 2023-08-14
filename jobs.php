<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Job</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<h1 class="text-Primary text-center pt-3" >All-Jobs</h1>
<?php
    // Define the $sql variable with a default value
    $sql = "SELECT * FROM jobs";

    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
    
        echo '<section id="gallery">';
        echo ' <div class="container">';
        echo '<div class="row">';
        $data="SELECT * FROM companies
		JOIN jobs ON companies.id = jobs.company_id ";
		$datas=$conn->query($data);
		
        while ($row = $datas->fetch_assoc() ) {
            $field = $row['field'];
            echo '<div class="col-lg-4 mb-4">';
            echo '<div class="card">';
               if ($field == 'BusinessAndFinance') {
                echo '<img src="./images/b2.avif" alt="" class="card-img-top equal-image">';
                } else if ($field == 'Education') {
                echo '<img src="./images/e2.avif" alt="" class="card-img-top equal-image">';
                } else if ($field == 'Technology') {
                echo '<img src="./images/t2.avif" alt="" class="card-img-top equal-image">';
                } else if ($field == 'Healthcare') {
                echo '<img src="./images/h3.avif" alt="" class="card-img-top equal-image">';
                } else if ($field == 'ArtsandCulture') {
                echo '<img src="./images/a2.evif" alt="" class="card-img-top equal-image">';
                } else {
                // Handle the case where the field is not recognized
                }
                $text = $row['job_description'];
                $max_length = 120; // The maximum length of the text before truncation
    
                if (strlen($text) > $max_length) {
               $truncated_text = substr($text, 0, $max_length) . "...";
                }
                else {
                 $truncated_text = $text;
                }
    
    
        
            echo '<div class="card-body">';
            echo '<h5 class="card-title font-weight-bold">' . htmlspecialchars($row['job_title']) . '</h5>';
            echo '<h5 class="card-title font-weight-bold text-success">' . htmlspecialchars($row['field']) . '</h5>';
            echo '<i class="fas fa-building d-inline"></i><p class="card-text font-weight-bold d-inline" style="font-size: 14px;"> ' . htmlspecialchars($row['name']) . '</p>';
            echo '<p class="card-text font-weight-bold">' . htmlspecialchars($truncated_text) . '</p>';
            echo '<i class="fas fa-users d-inline"></i><p class="card-text font-weight-bold d-inline text-danger" ><strong>Applicants :</strong> ';
            
            $query = "SELECT count(*) As counts from job_applications WHERE job_id = ".$row["id"];
                                  $result=$conn->query($query);
                                  while($rows=$result->fetch_assoc())
                                  $count=$rows['counts'];
                                  echo $count;
           echo ' </p><br>';
            echo '<a href="Apply.php" class="btn btn-outline-success btn-lg w-50">Apply</a>';
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
</body>
</html>