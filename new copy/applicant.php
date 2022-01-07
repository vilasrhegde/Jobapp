<?php
include "connection.php";

$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));
$id= $_POST["id"];
$firstname = "";
$lastname= "";
$email= "";
$linkedin="";
$position="";
$start_date="";
$mobile="";
$city_name="";
$last_company="";
$comments="";

$res = mysqli_query($link, "select * from submissions where id=$id");

while($row=mysqli_fetch_array($res))
{

    $first_name =$_POST['firstname'];
    $last_name  =$_POST['lastname'];
    $email=$_POST['email'];
    $linkedin=$_POST['linkedin'];
    $position=$_POST['position'];
    $start_date=$_POST['start_date'];
    $mobile=$_POST['mobile'];
    $city_name=$_POST['city_name'];
    $last_company=$_POST['last_company'];
    $comments=$_POST['comments'];


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
    <div class="col-lg-4">
    <h2>Basic form details</h2>
  <form action="" name="form1" method="post">
 
  <div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter First name" name="firstname" value="<?php echo
      $firstname ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="lastname" value="<?php echo
      $lastname ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo
      $email ?>">
    </div>
    <div class="form-group">
      <label for="linkedin">Linkedin:</label>
      <input type="url" class="form-control" id="linkedin" placeholder="Enter Linkedin link" name="linkedin" value="<?php echo
      $linkedin ?>">
    </div>
    <div class="form-group">
      <label for="position">Position:</label>
      <input type="text" class="form-control" id="posiiton" placeholder="Enter Position" name="posiiton" value="<?php echo
      $position ?>">
    </div>
    <div class="form-group">
      <label for="start_date">Start date:</label>
      <input type="date" class="form-control"  placeholder="Start date" name="start_date">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="tel" class="form-control"  placeholder="Mobile" name="mobile">
    </div>
    <div class="form-group">
      <label for="city_name">City name:</label>
      <input type="text" class="form-control"  placeholder="City name" name="city_name">
    </div>
    <div class="form-group">
      <label for="last_company">Last Company:</label>
      <input type="text" class="form-control"  placeholder="Last company" name="last-company">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
  </form>
    </div>
</div>
  
</div>

<div class="col-lg-4">

<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
$res = mysqli_query($link, "select * from table1");
while($row=mysqli_fetch_array($res))
{
    echo "<tr>";
    echo "<td>"; echo $row["id"]; echo "</td>";
    echo "<td>";?> <img src="<?php echo $row["image1"]?>" height="100" width="100" >  <?php echo "</td>";
    echo "<td>"; echo $row["firstname"]; echo "</td>";
    echo "<td>"; echo $row["lastname"]; echo "</td>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["contact"]; echo "</td>";
    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

    echo "</tr>";
}

?>
    </tbody>
  </table>
    
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
    
mysqli_query($link, "update table1 set firstname='$_POST[first_name]', lastname='$_POST[last_name]', email='$_POST[email]', contact='$_POST[contact]' where id=$id ");

?>
<script type="text/javascript">
window.location="index.php";

</script>

<?php
}

?>
</html>
