<?php
$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

$id =$_GET["id"];

$firstname = "";
$lastname= "";
$email= "";
$linkedin= "";
$position="";
$startdate="";
$mobile="";
$cityname="";
$lastcompany="";
$comments="";


$res = mysqli_query($link, "select * from submissions where id=$id");

while($row=mysqli_fetch_array($res))
{
    $firstname=$row["first_name"];
    $lastname=$row["last_name"];
    $email=$row["email"];
    $linkedin= $row["linkedin"];
    $position=$row["position"];
    $startdate=$row["start_date"];
    $mobile=$row["mobile"];
    $cityname=$row["city_name"];
    $lastcompany=$row["last_company"];
    $comments=$row["comments"];


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
   
<div class="col-sm-12">
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
        $position ?>">  <button type="button" class="btn btn-primary">Developer <span class="badge">7</span></button>
        <button type="button" class="btn btn-danger">HR <span class="badge">3</span></button>    
        <button type="button" class="btn btn-success">Testing <span class="badge">5</span></button>        </input>
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="start_date">Start date:</label>
        <input required  type="date" class="form-control"  placeholder="Start date" name="start_date" value="<?php echo
        $startdate ?>">
      </div>   </div> <br>
      <div class="form-group">
       <div class="col-sm-12">
             <label for="mobile">Mobile:</label>
        <input required  type="tel" class="form-control"  placeholder="Mobile" name="mobile" value="<?php echo
        $mobile ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="city_name">City name:</label>
        <input required  type="text" class="form-control"  placeholder="City name" name="city_name" value="<?php echo
        $cityname ?>">
      </div>  </div>  <br>
      <div class="form-group">
 <div class="col-sm-12">

        <label for="last_company">Last Company:</label>
        <input required  type="text" class="form-control"  placeholder="Last company" name="last_company" value="<?php echo
        $lastcompany ?>">
      </div> </div>
      <div class="form-group">
           <div class="col-md-12">

        <label for="comments">Comments:</label>
        <input required  type="text" class="form-control"  placeholder="Comments" name="comments" value="<?php echo
        $comments ?>">
      </div>
      </div>
   <div class="form-group">
           <div class="col-md-12">
<br>
           <button type="submit" name="update" class="btn btn-warning btn-block">Update</button>
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
    

mysqli_query($link, "UPDATE  submissions set first_name= '$_POST[firstname]', last_name='$_POST[lastname]',
email='$_POST[email]',linkedin='$_POST[linkedin]',position='$_POST[position]',`start_date`='$_POST[start_date]',
mobile=$_POST[mobile] ,city_name= '$_POST[city_name]',last_company='$_POST[last_company]',comments='$_POST[comments]' 
where id='$_GET[id]'")or die (mysqli_error($link));        



?>
<script type="text/javascript">
window.location="appview.php";

</script>

<?php
}

?>
</html>
