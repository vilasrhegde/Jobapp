<?php
$link=new mysqli("localhost","root","","jobapp1");

$qvision= mysqli_query($link, "SELECT * from visions ");

$vscount=0;



  echo "<center>";
  echo "<table class='table col-md-12' border='5'>

<tr>
<th>#</th>
<th>Name</th>
<th>Visions</th>
<th>Skills</th>
</tr>";
echo "</center>";


  while($row=mysqli_fetch_array($qvision))
  {
      echo "<tr>";
      echo "<td>"; echo $row["id"]; echo "</td>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["vision"]; echo "</td>";
      echo "<td>"; echo $row["skills"]; echo "</td>";
    
      echo "</tr>";
    
      $vscount= $vscount+1;
  }


$mxdev="40";
$mxhr="30";
$mxtest="20";
$count="40"; 
$rowd="100";
$rowh="80";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/webp" sizes="32x32"  href="../J.png">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visions</title>
</head>
<body>
<h2 style="text-align: center;text-shadow:0 4px 5px rgba(0,0,0,0.4);">Visions table Details:</h2>


<div class="container">
  <h3>Developers:</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $rowd; ?>" aria-valuemin="0" aria-valuemax="<?php echo $mxdev;?>" style="width:<?php echo $rowh;?>% ">
      <?php echo $rowh;?>
    </div>
  </div>
<br>
</div>
<div class="container">
  <h3>Testers:</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "10";?>% ">
      <?php echo "40";?>
    </div>
  </div>
<br>
</div>
<div class="container">
  <h3>Human Resources:</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $count;?>% ">
      <?php echo $count;?>
    </div>
  </div>    
  <br><br>
  <?php
  echo "<b>Total applicants:</b> ". $vscount;
  ?>
</body>
</html>
