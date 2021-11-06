<?php
$link = new mysqli("localhost","root",'',"jobapp1");

date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

// $first_name =$_POST['fname'];
// $last_name  =$_POST['lname'];
// $email=$_POST['email'];
// $linkedin=$_POST['linkedin'];
// // $drupal=$_POST['drupal'];
// $position=$_POST['position'];
// $start_date=$_POST['startdate'];
// $mobile=$_POST['mobile'];
// // $current_city=$_POST['city'];
// $city_name=$_POST['cityname'];
// // $relocate=$_POST['relocate'];
// $last_company=$_POST['lastcompany'];
// $comments=$_POST['comments'];



if(isset($_POST["submit"]))
{

 mysqli_query($link,"  INSERT INTO `submissions`(`id`, `fname`, `lname`, `email`, `linkedin`, `position`, `branch`, `relocate`, `date`) 
 VALUES (NULL,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[linkedin]','$_POST[position]',
 '$_POST[branch]','$_POST[relocate]', '".$curr_date."' )" ) ;
header("location: applicant.html");
$link -> close();
// mysqli_query($link, "INSERT into `submissions` values( '$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[linkedin]','$_POST[position]',
//  '$_POST[branch]','$_POST[relocate]' ") or die (mysqli_error($link ));


// INSERT INTO background (id,`name`, pos, comp) SELECT id,first_name, position, last_company FROM submissions;
        
// ?>
// <script type="text/javascript">
// window.location.href=window.location.href;
// </script>
// <?php

}
// header("Location: info.html");
// $conn -> close();
// die;


?>