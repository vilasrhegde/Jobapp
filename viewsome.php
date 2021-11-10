<?php
$link =new mysqli("localhost","root","","jobapp1");
date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$id =$_GET["id"];

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


$res = mysqli_query($link, "SELECT s.id, s.fname,s.lname,s.email,s.linkedin,s.position,s.branch,a.dob,b.lwc,b.xp,b.skill,
l.mobile,v.vision from submissions s,applicant a,`locate` l,background b,visions v
WHERE  s.id=$id ;") or mysqli_error($link) ; 

if($res!=""){
  while($rows=mysqli_fetch_array($res))
  {
    $firstname = $rows["fname"];
    $lastname= $rows["lname"];
    $email=$rows["email"];
    $linkedin= $rows["linkedin"];
    $position= $rows["position"];
    $branch= $rows["branch"];
    $mobile= $rows["mobile"];
    $dob= $rows["dob"];
    $lastcompany=  $rows["lwc"];
    $xp= $rows["xp"];
    $skill= $rows["skill"];
    $vision= $rows["vision"];
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="form-group">
    <form action="" method="post">
        <h1 style="text-align: center;text-shadow:4px 4px 5px rgba(0,0,0,0.4); font-weight:900;">Edit entries:</h1>
      <br>
   
<div class="col-md-12">
      <label for="firstname">First Name:</label>
      <input required type="text" class="form-control" id="firstname" placeholder="Enter First name" name="firstname" value="<?php echo
      $firstname ?>">
      </div> </div> <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="lastname" value="<?php echo
        $lastname ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="email">Email:</label>
        <input required  type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo
        $email ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="linkedin">Linkedin:</label>
        <input required  type="url" class="form-control" id="linkedin" placeholder="Enter Linkedin link" name="linkedin" value="<?php echo
        $linkedin ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="position">Position:</label>
        <input required  type="text" class="form-control" id="posiiton" placeholder="Enter Position" name="position" value="<?php echo
        $position ?>"></input>
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">
 <label for="branch">Branch name:</label>
        <input required  type="text" class="form-control"  placeholder="Branch city name" name="branch" value="<?php echo
        $branch ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">
 <div class="form-group">
       <div class="col-sm-12">
             <label for="mobile">Mobile:</label>
        <input required  type="tel" class="form-control"  placeholder="Mobile" name="mobile" value="<?php echo
        $mobile ?>">
      </div>  </div>  <br>

        <label for="dob">Birth date:</label>
        <input required  type="date" class="form-control"  placeholder="Birth date" name="dob" value="<?php echo
        $dob ?>">
      </div>   </div> <br>
    
      <div class="form-group">
 <div class="col-sm-12">
        <label for="last_company">Last Company:</label>
        <input required  type="text" class="form-control"  placeholder="Last company" name="last_company" value="<?php echo
        $lastcompany ?>">
      </div> </div>
      <div class="form-group">
           <div class="col-md-12">

        <label for="xp">Experience:</label>
        <input required  type="number" class="form-control"  placeholder="Field Experience" name="xp" value="<?php echo
        $xp ?>">
      </div>
      </div>
      <div class="form-group">
           <div class="col-md-12">

        <label for="skill">Skills:</label>
        <input required  type="text" class="form-control"  placeholder="Skills" name="skill" value="<?php echo
        $skill ?>">
      </div>
      </div>

      <div class="form-group">
           <div class="col-md-12">

        <label for="vision">Visions:</label>
        <input required  type="text" class="form-control"  placeholder="Visions" name="vision" value="<?php echo
        $vision ?>">
      </div>
      </div>
   <div class="form-group">
           <div class="col-md-12">
<br>
           <button type="submit" name="update" class="btn btn-warning btn-block">Update</button>
           <br><br>
      </div>
      </div>


    </form>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
</style>
</body>
<?php

if(isset($_POST["update"]))
{
  $id =$_GET["id"];

// mysqli_query($link, "UPDATE  submissions s,applicant a,`locate` l,background b,visions v 
//  set s.fname= '$_POST[firstname]', s.lname='$_POST[lastname]',a.name= '$_POST[firstname]',
// s.email='$_POST[email]',s.linkedin='$_POST[linkedin]',s.position='$_POST[position]',dob='$_POST[dob]',
// l.mobile=$_POST[mobile] ,l.branch= '$_POST[branch]',b.lwc='$_POST[last_company]',v.vision='$_POST[vision]' ,
// s.relocate='$_POST[relocate]',b.skill='$_POST[skill]',xp='$_POST[xp]'
// where s.id=$id and  s.fname= '$_POST[firstname]' and s.fname= a.name= l.name= b.name=v.name and s.id=a.id=l.id=b.id=v.id")or die (mysqli_error($link));        


 $sql= mysqli_query($link,"UPDATE `submissions` SET `fname`='$_POST[firstname]',`lname`='$_POST[lastname]',`email`='$_POST[email]',`linkedin`='$_POST[linkedin]',`position`='$_POST[position]',`branch`='$_POST[branch]',`date`='$curr_date' WHERE `id`=$id " );   


  $sql2=mysqli_query($link,"UPDATE `applicant` SET `name`='$_POST[firstname]',`email`='$_POST[email]',`mobile`=$_POST[mobile],`dob`='$_POST[dob]' WHERE `id`=$id");

  $sql3=mysqli_query($link,"UPDATE `background` SET `name`='$_POST[firstname]',`lwc`='$_POST[last_company]',`xp`=$_POST[xp],`skill`='$_POST[skill]' WHERE `id`=$id");

  $sql4=mysqli_query($link,"UPDATE `locate` SET `name`='$_POST[firstname]',`branch`='$_POST[branch]',`position`='$_POST[position]',`mobile`=$_POST[mobile]' WHERE `id`=$id");

  $sql5=mysqli_query($link,"UPDATE `visions` SET `name`='$_POST[firstname]',`vision`='$_POST[vision]',`skills`='$_POST[skill]' WHERE `id`=$id");

 ?>
 <script type="text/javascript">
 window.location.href="appview.php";
 </script>
 <?php




}

?>
</html>
