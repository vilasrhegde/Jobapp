<?php
include '../connection.php';
?>
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
      echo "<td>"; echo $row["app_id"]; echo "</td>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["email"]; echo "</td>";
      echo "<td>"; echo $row["mob"]; echo "</td>";
      echo "<td>"; echo $row["dob"]; echo "</td>";
    
      echo "</tr>";
    
      $appcount= $appcount+1;
  }
  echo "<b>Total applicants:</b> ". $appcount;

  $currentdate= date("Y-m-d");

  $query = mysqli_query($link,"SELECT count(*) as count from applicant where dob between '1970-01-01' and '1990-12-31' "); 
  while($row=mysqli_fetch_array($query)){
    $oldage=$row['count'];
  }
  $query1 = mysqli_query($link,"SELECT count(*) as count from applicant where dob between '1991-01-01' and '2010-12-31' "); 
  while($row=mysqli_fetch_array($query1)){
    $mid=$row['count'];
  }
  $query2 = mysqli_query($link,"SELECT count(*) as count from applicant where dob between '2011-01-01' and '2050-12-31' "); 
  while($row=mysqli_fetch_array($query2)){
    $youth=$row['count'];
  }
  // $today = new Datetime(date('m.d.y'));
  // $diff = $today->diff($oldage);
  // printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
  // printf("\n");  
  echo "<br>Aged people: " . $oldage . "<br>";
  echo "Mid aged: " . $mid . "<br>";
  echo "Youths: ". $youth ;
  ?>
</body>
</html>