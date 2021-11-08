<?php
$link=new mysqli("localhost","root","","jobapp1");

$qbg= mysqli_query($link, "SELECT * from background ");

$bgcount=0;



  echo "<center>";
  echo "<table class='table col-md-12' border='5'>

<tr>
<th>#</th>
<th>Name</th>
<th>Last Company</th>
<th>Experience</th>
<th>Skills</th>
</tr>";
echo "</center>";


  while($row=mysqli_fetch_array($qbg))
  {
      echo "<tr>";
      echo "<td>"; echo $row["id"]; echo "</td>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["lwc"]; echo "</td>";
      echo "<td>"; echo $row["xp"]; echo "</td>";
      echo "<td>"; echo $row["skill"]; echo "</td>";
    
      echo "</tr>";
    
      $bgcount= $bgcount+1;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background</title>
</head>
<body>
<h2 style="text-align: center;text-shadow:0 4px 5px rgba(0,0,0,0.4);">Applicant table Details:</h2>


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
  echo "<b>Total applicants:</b> ". $bgcount;
  ?>
</body>
</html>
