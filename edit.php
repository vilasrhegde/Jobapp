<?php
$link = new mysqli("localhost","root",'',"jobapp1");
date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$id =$_GET["id"];

$firstname = "";
$lastname= "";
$email= "";
$linkedin= "";
$position="";
$branch="";


$res = mysqli_query($link, "SELECT * from submissions where `id`=$id");

while($row=mysqli_fetch_array($res))
{
    $firstname=$row["fname"];
    $lastname=$row["lname"];
    $email=$row["email"];
    $linkedin= $row["linkedin"];
    $position=$row["position"];
    $branch=$row["branch"];
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
        <input required  type="text" class="form-control" id="position" placeholder="Enter Position" name="position" value="<?php echo
        $position ?>">
      </div>  </div>  <br>


      <div class="form-group">
 <div class="col-sm-12">
        <label for="city_name">Branch:</label>
        <input required  type="text" class="form-control"  placeholder="City name" name="branch" value="<?php echo
        $branch ?>">
      </div>  </div>  <br>

      <div class="form-group">
        <div class="col-sm-12">
          <br> 
                  <label >Are you willing to relocate?</label>
                  <label> <input type="radio" name="relocate" value="Yes"> Yes </label>
                      <label> <input type="radio" aria-selected="true" name="relocate" value="No"> No </label>
                      <label> <input type="radio" name="relocate" aria-selected="true" value="Notsure"> Not Sure </label>
                      <!-- <input type="submit" name="submit" value="Submit" checked>  -->
        </div>
      </div>

      <div class="form-group">
 <div class="col-sm-12">
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
    

mysqli_query($link, "UPDATE  submissions set fname= '$_POST[firstname]', lname='$_POST[lastname]',
email='$_POST[email]',linkedin='$_POST[linkedin]',position='$_POST[position]',
branch= '$_POST[branch]' 
where id='$id' ")or die (mysqli_error($link));        



?>
<script type="text/javascript">
window.location="view.php";

</script>

<?php
}

?>
</html>
