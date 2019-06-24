<?php
include_once('dbconnect.php');
if(isset($_POST['submit'])){
 	$title = $_POST['register_title'];
	$first_name = $_POST['register_first_name'];
	$middle_name = $_POST['register_middle_name']; 
	$last_name = $_POST['register_surname']; 
	$nickname = $_POST['register_nickname']; 
	$id_number = $_POST['register_id_number']; 
	$completion_year	= $_POST['register_year'];	 
	$email =	$_POST['register_email']; 
	$postal_address = $_POST['register_postal']; 
	$town= $_POST['register_town']; 
	$postal_code = $_POST['register_code']; 
	$county = $_POST['register_county']; 
	$country = $_POST['register_country'];	
	$phone_number = $_POST['register_phone'];
    $password = md5($_POST['register_password']);

$target_dir = "assets/img/committee/";
      $target_file = $target_dir .basename($_FILES["register_file"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["register_file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "webp") {
        echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $profile = basename($_FILES["register_file"]["name"]);
        echo $profile;

        $uploadOk = 0;
      }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";

      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["register_file"]["tmp_name"], $target_file)) {
          echo "The file ".basename( $_FILES["register_file"]["name"]). " has been uploaded.";

          $sql = "INSERT INTO members (title, first_name, middle_name, last_name, nickname, profile , id_number, completion_year, email, postal_address, town, postal_code, county, country, phone_number, password)
           VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$nickname', '$profile' ,'$id_number', '$completion_year', '$email', '$postal_address', '$town', '$postal_code', '$county', '$country', '$phone_number', '$password')";
          
          if($con->query($sql)==true){
           header("location: login.html");
          }
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
}
?>