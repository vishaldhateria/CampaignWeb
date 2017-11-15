<?php 
 
$link = mysqli_connect("localhost", "thedaily_eyeinfo","l?FRn%Kp*M75","thedaily_dailyeye");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobno = $_POST['mobno'];
$topic = $_POST['topic'];
$headline = $_POST['headline'];
$containt = $_POST['containt']; 
$image = isset($_POST['image']);
$docimg = isset($_POST['docimg']);
$filetype = $_FILES["image"]["type"];
$filetype1 = $_FILES["docimg"]["type"];
mkdir("Img.$mobno");
$target_path="Img.$mobno/";
mkdir("Doc.$mobno");
$target_docpath="Doc.$mobno/";
$target_path = $target_path . basename( $_FILES['image']['name'] ); 
$randString = md5(time()); //encode the timestamp - returns a 32 chars long string
  $fileName = $_FILES["image"]["name"]; //the original file name
  $splitName = explode(".", $fileName); //split the file name by the dot
  $fileExt = end($splitName); //get the file extension
  $newFileName  = strtolower($randString.'.time()'.$fileExt); //join file name and ext.

if ( move_uploaded_file( $_FILES['image']['tmp_name'], $target_path)) {
			
			} else {
				
			}
           $target_docpath = $target_docpath . basename( $_FILES['docimg']['name'] );

if ( move_uploaded_file( $_FILES['docimg']['tmp_name'], $target_docpath ) ) {
			 			} else {
				
			}
// attempt insert query execution
$sql = "INSERT INTO info (date,fname,lname,email,mobno,topic,headline,containt,image,docimg) VALUES (NOW(),'$fname','$lname','$email','$mobno','$topic','$headline','$containt','$filetype','$filetype1')";
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

?>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css1/style.css">
</head>

<body>
    <div class="title">
        <h1 style="color:white; font-size:100px;">THANK YOU</h1>
        <?php 
   echo '<h1 style="color:white;" font-size:90px;>'; echo $fname  ; echo " "; echo $lname; echo '</h1> ';
  
  ?>
        <h2 style="color:white; font-size:50px; font-family:Arial">You’re story will be uploaded only after approval by The Daily Eye Editorial Team. We will send you a mail with links
            to you’re work when it is approved and uploaded on our social media platforms and The Daily Eye website. </h2>
        <br>
        <br>
        <br>
        <br>
        <a style="text-align: center; font-size:30px; background-color:green" target="_blank" href="http://thedailyeye.info/demo/"
            class="white-mode">Go back to the Website</a>
    </div>
    <div class="more-pens">


    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script src="js1/index.js"></script>

</body>

</html>


<?php 
        $emailTo = 'ankush.sarage@gmail.com';
        $emailBody .= '<html><body>';
        $emailBody .= '<img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Details of Writer" />';
        $emailBody .= '<table rules="all" style="border-color: #666;" cellpadding="10;" border="1">';
        $emailBody .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fname']) . "</td></tr>";
        $emailBody .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email'].  "</td></tr>";
        $emailBody .= "<tr><td><strong>Mobile No:</strong> </td><td>" . strip_tags($_POST['mobno']) . "</td></tr>";
        $emailBody .= "<tr><td><strong>Topic:</strong> </td><td>" . strip_tags($_POST['topic']) . "</td></tr>";
        $emailBody .= "<tr><td><strong>Headline:</strong> </td><td>" .strip_tags($_POST['headline']) . "</td></tr>"; 
        $emailBody .= "<tr><td><strong>Text Content:</strong> </td><td>" .strip_tags($_POST['containt']) . "</td></tr>";
        $emailBody .= "</table>";
        $emailBody .= "</body></html>";

        $emailSubject = "Test Mail";
        $attachment = $target_docpath;

        $boundary = md5(time());

        $header = "From: Name <ankush.sarage@gmail.com>\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed;boundary=\"" . $boundary . "\"\r\n";

        $output = "--".$boundary."\r\n";
        $output .= "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document; name=\"result.docx\";\r\n";
        $output .= "Content-Disposition: attachment;\r\n\r\n";
        $output .= $attachment."\r\n\r\n";
        $output .= "--".$boundary."\r\n";
        $output .= "Content-type: text/html; charset=\"utf-8\"\r\n";
        $output .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $output .= $emailBody."\r\n\r\n";
        $output .= "--".$boundary."--\r\n\r\n";

        
if (mail($emailTo, $emailSubject, $output, $header)) {  
       echo "mail sent sucessfully"; // or use booleans here
   } else {
        echo "Mail not sent ERROR!";
       print_r( error_get_last() );
   }

?>