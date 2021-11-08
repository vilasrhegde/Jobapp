<?php
$link = new mysqli("localhost","root",'',"jobapp1");

date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India


if(isset($_POST["submit"]))
{
    {


        $sql= "INSERT INTO `submissions`(`id`, `fname`, `lname`, `email`, `linkedin`, `position`, `branch`, `relocate`, `date`) 
         VALUES (NULL,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[linkedin]','$_POST[position]',
         '$_POST[branch]','$_POST[relocate]', '".$curr_date."' );" ;   
       
         if ($link->query($sql) === TRUE) {
         $last_id = $link->insert_id;
         $sql.="INSERT INTO `applicant`(`id`, `name`, `email`, `mobile`, `dob`)
         VALUES ( '$last_id','$_POST[fname]','$_POST[email]','$_POST[mobile]','$_POST[dob]');";
       
         $sql.="INSERT INTO `background`(`id`,`name`, `lwc`, `xp`, `skill`) 
         VALUES ( '$last_id','$_POST[fname]','$_POST[lwc]','$_POST[xp]','$_POST[skill]');";
       
         $sql.="INSERT INTO `locate`(`id`,`name`, `branch`, `position`, `mobile`) 
         VALUES ( '$last_id','$_POST[fname]','$_POST[branch]','$_POST[position]','$_POST[mobile]');";
       
         $sql.="INSERT INTO `visions`(`id`,`name`, `vision`, `skills`) 
         VALUES ( '$last_id','$_POST[fname]','$_POST[vision]','$_POST[skill]'); ";
       
       
       
       if (mysqli_multi_query($link, $sql)) {
        ?>
        <script type="text/javascript">
        window.location.href="info.html";
        </script>
        <?php
       } 
       else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
       }
       
       } else {
         echo "Error: " . $sql . "<br>" . $link->error;
       }
         
       
       $link -> close(); //error might start here
       }


        
 ?>
<script type="text/javascript">
window.location.href=window.location.href;
 </script>
 <?php

}


?>