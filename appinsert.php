<?php
$link = new mysqli("localhost","root",'',"jobapp1");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India


if(isset($_POST["submit"]))
{
//     $target_dir = "images/";
//     $target_file = $target_dir . basename($_FILES["photo"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//     // Check if file already exists
//     if (file_exists($target_file)) {
//         echo "Sorry, file already exists.";
//         $uploadOk = 0;
//   }
// // Check file size
//     if ($_FILES["photo"]["size"] > 500000) {
//         echo "Sorry, your file is too large.";
//         $uploadOk = 0;
//   }
//   // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//      echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
//     }
//    else {
//         if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//             echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
//         } 
//         else {
//             echo "Sorry, there was an error uploading your file.";
//         }  
//     }


   
  
  
//   $filename = $_FILES["photo"]["name"];
//     $tempname = $_FILES["photo"]["tmp_name"];    
//         $folder = "images/". $filename;

$hash=md5(time() );
$fnm = $_FILES["photo"]["name"];
$dst = "./images/".$hash.$fnm;
// $dst1 = "images/".$tm.$fnm;
move_uploaded_file($_FILES["photo"]["tmp_name"],$dst);



    $em_check=mysqli_query($link,"SELECT * from submissions where email='$_POST[email]'");
    $present=mysqli_num_rows($em_check);

    if($present > 0){
        header("Location: error.html");
        die;

    }
    else{
        
        
        mysqli_begin_transaction($link);
     
     try
      {  
         $query1="INSERT INTO `submissions`(`id`, `fname`, `lname`, `email`, `linkedin`, `position`, `branch`, `relocate`, `date`) 
         VALUES (NULL,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[linkedin]','$_POST[position]',
         '$_POST[branch]','$_POST[relocate]', '".$curr_date."'  )";
//CREATE TRIGGER `delete_data` BEFORE DELETE ON `submissions`
//FOR EACH ROW INSERT into olddata SET name=OLD.fname,position=OLD.position,email=OLD.email,app_id=OLD.id,date=OLD.date
         $query2="INSERT INTO `applicant`(app_id,`photo`, `name`, `email`, `mob`, `dob`)
         VALUES (LAST_INSERT_ID(),'$dst','$_POST[fname]','$_POST[email]','$_POST[mobile]','$_POST[bdate]');";
//CREATE TRIGGER `insert_log` AFTER INSERT ON `applicant`
// FOR EACH ROW INSERT into insert_log SET app_id=NEW.app_id,name=NEW.name,photo=NEW.photo,mobile=NEW.mob
         $query3="INSERT INTO `locate`(`id`,`name`, `branch`, `position`, `mobile`) 
         VALUES ( LAST_INSERT_ID(),'$_POST[fname]','$_POST[branch]','$_POST[position]','$_POST[mobile]')";

         $query4="INSERT INTO `visions`(`id`,`name`, `vision`, `skills`) 
         VALUES ( LAST_INSERT_ID(),'$_POST[fname]','$_POST[vision]','$_POST[skill]')";

         $query5="INSERT INTO `background`(`id`,`name`, `lwc`, `xp`, `skill`) 
         VALUES (LAST_INSERT_ID() ,'$_POST[fname]','$_POST[lwc]','$_POST[xp]','$_POST[skill]' )";

$sql1 = mysqli_query($link,$query1);
$sql2 = mysqli_query($link,$query2);
$sql3 = mysqli_query($link,$query3);
$sql4 = mysqli_query($link,$query4);
$sql5 = mysqli_query($link,$query5);

mysqli_commit($link);
// echo "Data Submitted";
}
catch (mysqli_sql_exception $exception) 
{
 mysqli_rollback($link);
 throw $exception;
 echo "Error!";

} 
?>
<script type="text/javascript">
window.location.href="info.html";
</script>
<?php
       
    //   $link -> close(); error might start here
}
}


?>