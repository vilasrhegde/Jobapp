

<?php
$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));


?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">          
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/webp" sizes="32x32"  href="J.png">   
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Application Status</title>
</head>
<body onoffline="alert('You are offline')">
<br><br>
<div class="home">
<a href="./index.html" target="">HOME</a>
</div>



<style>
 .home a{
  padding: 10px;background:#111;border-radius:5px;margin:10px;color:#fff;text-decoration:none;
}
 .home a:hover{
  text-decoration: none;
  color: #fff;
}
h2{
  text-shadow: 0 4px 5px rgba(0, 0, 0, 0.493);
}
 
</style>


<center>
    <br>
<div class="container col-sm-4">
  <h2>Get your info</h2><br>
  <form class="form-inline " action="" method="post">
  <div class="form-group ">
      <label for="fname"></label>
      <input type="text" class="form-control" id="fname" placeholder="Phone,Linkedin,Email," name="name" value="<?php if(isset($_POST['submit'])) echo $_POST['name']; ?>">
      <br>
    </div>
    
    <input type="submit" name="submit" class="btn btn-primary"></input>
  </form>
</div>


</center>
<br><br><hr>


<center>

<div class="col-md-12 ">

<!-- 
<table class="table table-striped table-hover  table-responsive">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Linkedin</th>
        <th>Position</th>
        <th>Branch Name</th>
        <th>Mobile</th>
        <th>Birth Date</th>
        <th>Last Company</th>
        <th>Experience</th>
        <th>Skills</th>
        <th>Relocate</th>
        <th>Visions</th>
      </tr>
    </thead>
    <tbody> -->
<?php

date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$firstname = "";
$lastname= "";
$email= "";
$linkedin= "";
$position="";
$branch="";
$mobile="";
$dob="";
$lastcompany="";
$xp="";
$skill="";
$relocate="";
$vision="";


if(isset($_POST['submit']))
{
//   CREATE view total as(  SELECT  `s`.`id` AS `id`,`s`.`fname` AS `fname`,`a`.`photo` AS `photo`,`s`.`lname` AS `lname`,`s`.`email` AS `email`,
//   `s`.`linkedin` AS `linkedin`,`s`.`position` AS `position`,`s`.`branch` AS `branch`,`s`.`relocate` AS `relocate`,
//   `a`.`dob` AS `dob`,`b`.`lwc` AS `lwc`,`b`.`xp` AS `xp`,`b`.`skill` AS `skill`,`l`.`mobile` AS `mobile`,`v`.`vision` AS `vision`
//    from `submissions` `s` ,`applicant` `a`,`locate` `l` ,
//  `background` `b`,`visions` `v` where `s`.`id` = `a`.`app_id` 
//    and `s`.`id` = `l`.`id` and `s`.`id` = `v`.`id`)


// $views=mysqli_query($link,"INSERT into total values( SELECT  `s`.`id` AS `id`,`s`.`fname` AS `fname`,`a`.`photo` AS `photo`,`s`.`lname` AS `lname`,`s`.`email` AS `email`,
// `s`.`linkedin` AS `linkedin`,`s`.`position` AS `position`,`s`.`branch` AS `branch`,`s`.`relocate` AS `relocate`,
// `a`.`dob` AS `dob`,`b`.`lwc` AS `lwc`,`b`.`xp` AS `xp`,`b`.`skill` AS `skill`,`l`.`mobile` AS `mobile`,`v`.`vision` AS `vision`
//  from ((((`jobapp1`.`submissions` `s` join `jobapp1`.`applicant` `a`) join `jobapp1`.`locate` `l`) 
//  join `jobapp1`.`background` `b`) join `jobapp1`.`visions` `v`) where `s`.`id` = `a`.`app_id` 
//  and `s`.`id` = `l`.`id` and `s`.`id` = `v`.`id`)");



    $res = mysqli_query($link, "SELECT  `s`.`id` AS `id`,`s`.`fname` AS `fname`,`a`.`photo` AS `photo`,`s`.`lname` AS `lname`,`s`.`email` AS `email`,
       `s`.`linkedin` AS `linkedin`,`s`.`position` AS `position`,`s`.`branch` AS `branch`,`s`.`relocate` AS `relocate`,
       `a`.`dob` AS `dob`,`b`.`lwc` AS `lwc`,`b`.`xp` AS `xp`,`b`.`skill` AS `skill`,`l`.`mobile` AS `mobile`,`v`.`vision` AS `vision` from `submissions` `s` ,`applicant` `a`,`locate` `l` ,
  `background` `b`,`visions` `v` where s.linkedin='$_POST[name]' or s.email='$_POST[name]' or a.mob='$_POST[name]' ;");
    $num=mysqli_num_rows($res);
    if($num>0){
      while($row=mysqli_fetch_array($res))
      {
       
          // echo "<tr>"; 
          // echo "<td>";
          // echo "<td>"; echo $row["fname"]; echo "</td>";
          // echo "<td>"; echo $row["lname"]; echo "</td>";
          // echo "<td>"; echo $row["email"]; echo "</td>";
          // echo "<td>"; echo $row["linkedin"]; echo "</td>";
          // echo "<td>"; echo $row["position"]; echo "</td>";
          // echo "<td>"; echo $row["branch"]; echo "</td>";
          // echo "<td>"; echo $row["mobile"]; echo "</td>";
          // echo "<td>"; echo $row["dob"]; echo "</td>";
          // echo "<td>"; echo $row["lwc"]; echo "</td>";
          // echo "<td>"; echo $row["xp"]; echo "</td>";
          // echo "<td>"; echo $row["skill"]; echo "</td>";
          // echo "<td>"; echo $row["relocate"]; echo "</td>";
          // echo "<td>"; echo $row["vision"]; echo "</td>"; 
          // echo "</tr>";      
          // echo "<td>"; 
          // echo "</tr>";   
          $photo=$row["photo"];
          $fname= $row["fname"];
          $lastname= $row["lname"]; 
          $email= $row["email"]; 
          $linkedin= $row["linkedin"]; 
          $position= $row["position"];
          $branch= $row["branch"]; 
          $mobile= $row["mobile"];
          $dob= $row["dob"];
         $lwc= $row["lwc"]; 
          $xp= $row["xp"];
          $skill= $row["skill"];
          $relocate= $row["relocate"]; 
         $vision= $row["vision"];  
         $id=$row['id'];
      }
     
      ?>
      <div class="details">
      <img src="images/<?php echo $photo; ?>" alt="<?php echo $photo;  ?>" /> 
      <br><br>
      <div class="col-md-5 mb-3">
      <div class="input-group">
          <div class="input-group-prepend">
            
            <span class="input-group-text" id="">First Name</span>
        </div>
        <input type="text" class="form-control"  value="<?php echo $fname;  ?>">
        <span class="input-group-text" id="">Last Name</span>
        <input type="text" class="form-control" value="<?php echo $lastname;  ?>"   >
        </div>
      </div>
      <br>
      <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Email</span>
              </div>
              <input  value="<?php echo $email;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="email" aria-describedby="inputGroupPrepend2" >
            </div>
      </div>
      <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Mobile</span>
              </div>
              <input  value="<?php echo $mobile;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Phone" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
        <div class="form-row">
        <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Position</span>
              </div>
              <input  value="<?php echo $position;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Position" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Date of Birth</span>
              </div>
              <input  value="<?php echo $dob;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Last Company</span>
              </div>
              <input  value="<?php echo $lwc;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Last Worked Company" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Experience</span>
              </div>
              <input  value="<?php echo $xp;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Experience" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Linkedin</span>
              </div>
              <input  value="<?php echo $linkedin;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Linkedin" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Skills</span>
              </div>
              <input  value="<?php echo $skill;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Skills" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Relocate</span>
              </div>
              <input  value="<?php echo $relocate;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Relocate?" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">Branch</span>
              </div>
              <input  value="<?php echo $branch;  ?>" type="text" class="form-control" id="validationDefaultUsername" placeholder="Relocate?" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <textarea   type="text" class="form-control" id="vision" placeholder="Any visions?" aria-describedby="inputGroupPrepend2"  ><?php echo $vision;  ?></textarea>
            </div>
          </div>
       
      </div>
      
      <div class="col-md-4 mb-3">
            <div class="input-group">
            <a style="width: 100%;"  href="viewsome.php?id=<?php echo $id; ?>"><button style="width: 100%;"  type="text/javascript" class="btn btn-outline-success" >Edit</button></a> 
            </div>
          </div>
      
      
        <br><br>
      </div>  
    <?php     

    }//innser if num>0
    else{
      echo "<script>alert('No results found for $_POST[name]')</script>";
    }
    
}




?>  
<!-- main php end -->

    <!-- </tbody>
  </table> -->
<br>
 






<br>
<br>

<!-- <center>
  <div class="container text-center"  style="margin: auto;">
    <br>
  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo" style="margin: auto;">Policy</button>
  <div style="text-align: center;" id="demo" class="collapse">
These informations will not be shared or altered in any cases. Give right informations accordingly whenever asked.
<p style="text-align: center;color: rgba(0, 0, 0, 0.493);bottom: 5%">&copy; <script>document.write(new Date().getFullYear())</script> Vilas Hegde All Rights Reserved</p>

  </div>
  </div>
</center> -->

<style>
img{
  width: 200px;
  height: 200px;
  border-radius: 50%;
  box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.4);
  background-size: contain;
  object-fit:fill;
}
body{
  user-select: none;
}
.details input,textarea{
  pointer-events: none;
  user-zoom: none;
  user-select: none;
  cursor:not-allowed;

}
input,span,textarea{
  box-shadow: 0 2px 2px 0px;  
}

  @media(max-width:900px){
  tr{
    display: flex;
    flex-direction: column;
    
  } 
  td{
    display: flex;
    flex-direction: column;

  }
  th{

    display: none;
    font-size: 10px;
  }
  td button{
    width: 100%;
  }

}




</style>



</body>
</html>