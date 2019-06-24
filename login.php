<?php
include_once('dbconnect.php');
 if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $pass = md5($_POST['password']);

     $sql = mysqli_query($con, "SELECT * FROM members WHERE email='".$email."' AND password='".$pass."');
     if($row = mysqli_fetch_array($sql))
     {
         $_SESSION['user'] = $row['title'].'.'.$row['first_name'];
         $_SESSION['user_id'] = $row['member_id'];
         $_SESSION['sess_id'] = session_id();

         header('location: profile.php'); 
     }
     else
     {
         header('location: login.php?action=wrongpass');
     }
?>