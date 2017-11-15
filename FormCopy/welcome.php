<?php 
 
$link = mysqli_connect("localhost", "","","");
 
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

    $filename = 'myfile'; 
    $path = $target_docpath;
    $file = $target_docpath;

    $mailto = 'ankush.sarage@gmail.com';
    $subject = 'test mail';
    $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
    $headers .= "CC: vishaldhateria@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if ($containt=="" ) { $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));
		 			}
    $separator = md5(time());
     $eol = "\r\n";
    
    $message = '<html><body>';
    $message .= '<img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Details of Writer" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10;" border="1">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fname']) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']).  "</td></tr>";
    $message .= "<tr><td><strong>Mobile No:</strong> </td><td>" . strip_tags($_POST['mobno']) . "</td></tr>";
    $message .= "<tr><td><strong>Topic:</strong> </td><td>" . strip_tags($_POST['topic']) . "</td></tr>";
    $message .= "<tr><td><strong>Headline:</strong> </td><td>" .strip_tags($_POST['headline']) . "</td></tr>"; 
    $message .= "<tr><td><strong>Text Content:</strong> </td><td>" .strip_tags($_POST['containt']) . "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";
     // attachment
    //  if ($containt=='' ) {
    //  $message .= "--" . $separator . $eol;
    //  $message .= "Content-Type: application/octet-stream; name=\"" . $file. "\"" . $eol;
    //  $message .= "Content-Transfer-Encoding: base64" . $eol;
    //  $message .= "Content-Disposition: attachment" . $eol;
    //  $message .= $content . $eol;
    //  $message .= "--" . $separator . "--";
    //  }
    
if ($containt=="" ) {{ $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));
			 			}
   // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: name <ankush.sarage@gmail.com>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // attachment
    if ($containt=='' ) {	
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $file. "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    }
   $message=$message. $eol. $body;
 }

    //SEND Mail
    if (mail($mailto, $subject, $message, $headers)) {  
        echo "mail sent sucessfully"; // or use booleans here
    } else {
        echo "Mail not sent ERROR!";
        print_r( error_get_last() );
    }

?>