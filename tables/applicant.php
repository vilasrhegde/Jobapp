
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/webp" sizes="32x32"  href="../J.png">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Applicant table</title>
</head>
<body>
    <h2 style="text-align: center;text-shadow:0 4px 5px rgba(0,0,0,0.4);">Applicant table Details:</h2>
<?php

$link= new mysqli("localhost","root",'',"jobapp1");

$qapp= mysqli_query($link, "SELECT * from applicant ");

$appcount=0;



  echo "<center>";
  echo "<table class='table col-md-12' border='5'>

<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>DOB</th>
</tr>";
echo "</center>";


  while($row=mysqli_fetch_array($qapp))
  {
      echo "<tr>";
      echo "<td>"; echo $row["id"]; echo "</td>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["email"]; echo "</td>";
      echo "<td>"; echo $row["mobile"]; echo "</td>";
      echo "<td>"; echo $row["dob"]; echo "</td>";
    
      echo "</tr>";
    
      $appcount= $appcount+1;
  }
  echo "<b>Total applicants:</b> ". $appcount;
  ?>
</body>
</html>