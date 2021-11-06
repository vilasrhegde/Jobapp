

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
 
</style>


<center>
    <br>
<div class="container">
  <h2>Get your info</h2>
  <form class="form-inline" action="" method="post">
  <div class="form-group">
      <label for="fname">Email:</label>
      <input type="email" class="form-control" id="fname" placeholder="Enter Email" name="email">
    </div>
    <input type="submit" name="submit" class="btn btn-primary"></input>
  </form>
</div>


</center>
<br><br><hr>


<center>

<div class="col-lg-12">
<h2>Your details:</h2>
<table class="table table-striped table-hover  table-responsive">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Linkedin</th>
        <th>Position</th>
        <th>Start Date</th>
        <th>Mobile</th>
        <th>City Name</th>
        <th>Last Company</th>
        <th>Comments</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php

if(isset($_POST['submit']))
{
    $res = mysqli_query($link, "SELECT * from submissions WHERE email= '$_POST[email]' ");
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["first_name"]; echo "</td>";
        echo "<td>"; echo $row["last_name"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["start_date"]; echo "</td>";
        echo "<td>"; echo $row["mobile"]; echo "</td>";
        echo "<td>"; echo $row["city_name"]; echo "</td>";
        echo "<td>"; echo $row["last_company"]; echo "</td>";
        echo "<td>"; echo $row["comments"]; echo "</td>";
    
        echo "<td>"; ?><a href="viewsome.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="appdelete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
    }
    
}



?>

    </tbody>
  </table>
<center>
  <div class="container  text-center"  style="margin: auto;">
    <br>
  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo" style="margin: auto;">Policy</button>
  <div style="text-align: center;" id="demo" class="collapse">
These informations will not be shared or altered in any cases. Give right informations accordingly whenever asked.
<p style="text-align: center;color: rgba(0, 0, 0, 0.493);bottom: 5%">&copy; <script>document.write(new Date().getFullYear())</script> Vilas Hegde All Rights Reserved</p>

  </div>

</center>
  </div>

</div>
</center>

<style>
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