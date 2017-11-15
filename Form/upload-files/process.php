<?php
	print_r($_FILES);
	
	//Folder to save to
	$target_path = 'uploads/';
	
	//Build the stored file path
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name'] );
	
			if ( move_uploaded_file( $_FILES['uploadedfile']['tmp_name'], $target_path ) ) {
			 echo '<p>The file was uploaded</p>';
			} else {
				echo '<p>There was an error uploading your file. Please try again.</p>';
			}
		

?>