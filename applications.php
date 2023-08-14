<?php
include("company.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- <link rel='stylesheet' href='./applications.php'> -->
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4">Applicants</h3>
            <h6>Total nubmer of applicants:<?php echo $len; ?></h6>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $query = "SELECT users.*,job_applications.* FROM users JOIN job_applications ON job_applications.user_id = users.id and job_applications.company = " . $_SESSION["id"];
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    if ($row['status'] != 'rejected') {
                        $sql = "SELECT * FROM jobs WHERE id =" . $row['job_id'];
                        $querys = $conn->query($sql);
                        $rows = $querys->fetch_assoc();

                        echo  '<div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Name: ' . $row['user_name'] . ' </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Major: ' . $row['major'] . ' </p>
                                    <p class="card-text">Email: ' . $row['email'] . ' </p>
                                    <p class="card-text">Job Title:  ' . $rows['job_title'] . ' </p>
                                    <p class="card-text">cv Link:  ';
                        echo '<a href="?cv=' . $row['user_id'] . '">view file</a>';

                        echo ' </p>
                                    
                                  <a href="company.php?accept=' . $row['id'] . '"><button class="btn-accept">Accept</button></a>
                                  <a  href="company.php?id=' . $_SESSION['id'] . '&accept=' . $row['id'] . '"><button class="btn-accept" >Reject</button></a>
                                  
                                  
                                </div>
                            </div>
                        </div>';
                    }
                } ?>
</body>

</html>