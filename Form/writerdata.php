
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<?php
$servername = "localhost";
$username = "thedaily_eyeinfo";
$password = "l?FRn%Kp*M75";
$dbname = "thedaily_dailyeye";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<table class=" table table-striped">
<div class="container">                     
    <div class="table responsive">
        <thead>
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email ID</th>
              <th>Mobile NO.</th>
              <th>Topic</th>
              <th>Headline</th>
              <th>Content</th>
              <th>Artical Image</th>
              <th>Video Link</th>
              <th>Writer Info.</th>
              <th>Writer Photo</th>
              <th>Document</th>
            </tr>
        </thead>
        <tbody>
<?php 

$sql = "SELECT * FROM info";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {	
    // output data of each row
    while($row = $result->fetch_assoc()) {
				echo '
				<tr>
                  <td scope="row">' . $row["id"]. '</td>
                  <td> '.$row["date"] .'</td>
                  <td>' . $row["fname"] .'</td>
                  <td> '.$row["lname"] .'</td>
 				  <td>' . $row["email"] .'</td>
                  <td> '.$row["mobno"] .'</td>
                  <td>' . $row["topic"] .'</td>
                  <td> '.$row["headline"] .'</td>
 				  <td>' . $row["containt"] .'</td>
 				  <td> '.$row["image"] .'</td>
                  <td>' . $row["videolink"] .'</td>
                  <td> '.$row["writerintro"] .'</td>
 				  <td>' . $row["writerimg"] .'</td>
 				  <td>' . $row["docimg"] .'</td>
                </tr>';
}
} else {
    echo "0 results";
} 
?>
       </tbody>
    </div>
    </div>
</table>

</body>
</html>