 <?php
   

 // Connect to the database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "job_net";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }