<?php
$link=new mysqli("localhost","root","","jobapp1");
$lccount= 0;
$qlocate= mysqli_query($link, "SELECT * from `locate` ");

$fetchmax=mysqli_query($link,"SELECT * from recruit where id =1");
while($row=mysqli_fetch_array($fetchmax)){
  $mxdv=$row['dev'];
  $mhr=$row['hr'];
  $mxtest=$row['test'];
  $mxsupport=$row['support'];
}



  echo "<center>";
  echo "<table class='table col-md-12' border='5'>

<tr>
<th>#</th>
<th>Name</th>
<th>Branch</th>
<th>Position</th>
<th>Mobile</th>
</tr>";
echo "</center>";


  while($row=mysqli_fetch_array($qlocate))
  {
      echo "<tr>";
      echo "<td>"; echo $row["id"]; echo "</td>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["branch"]; echo "</td>";
      echo "<td>"; echo $row["position"]; echo "</td>";
      echo "<td>"; echo $row["mobile"]; echo "</td>";
    
      echo "</tr>";
    
      $lccount= $lccount+1;
  }
$query= mysqli_query($link,"SELECT count(*) as count from `locate` where position like '%developer%' or position like '%web%' ");
while($row=mysqli_fetch_array($query)){
  $mxdev=$row['count'];
}
$query1= mysqli_query($link,"SELECT count(*) as count from `locate` where position like '%test%' ");
while($row=mysqli_fetch_array($query1)){
  $mxtester=$row['count'];
}
$query2= mysqli_query($link,"SELECT count(*) as count from `locate` where position like '%hr%' ");
while($row=mysqli_fetch_array($query2)){
  $mxhr=$row['count'];
}
$query3= mysqli_query($link,"SELECT count(*) as count from `locate` where position != 'developer' and position != 'tester' and position !='hr' ");
while($row=mysqli_fetch_array($query3)){
  $support=$row['count'];
}



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
    <title>Locate</title>
</head>
<body>
<h2 style="text-align: center;text-shadow:0 4px 5px rgba(0,0,0,0.4);">Locate table Details:</h2>


<div class="container">
  <h3>Developers:(<?php echo $mxdv ; ?>)</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $mxdev; ?>" aria-valuemin="0" aria-valuemax="<?php echo $mxdv;?>" style="width:<?php echo $mxdev;?>% ">
      <?php echo $mxdev;?>
    </div>
  </div>
<br>
</div>
<div class="container">
  <h3>Testers:(<?php echo $mxtest ; ?>)</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $mxtester; ?>" aria-valuemin="0" aria-valuemax="<?php echo $mxtest; ?>" style="width:<?php echo $mxtester;?>% ">
      <?php echo $mxtester;?>
    </div>
  </div>
<br>
</div>
<div class="container">
  <h3>Human Resources:(<?php echo $mhr ; ?>)</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $mxhr; ?>" aria-valuemin="0" aria-valuemax="<?php echo $mhr; ?>" style="width:<?php echo $mxhr;?>% ">
      <?php echo $mxhr;?>
    </div>
  </div>    
  <br>
  <div class="container">
  <h3>Support/Other:(<?php echo $mxsupport ; ?>)</h3>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $support; ?>" aria-valuemin="0" aria-valuemax="<?php echo $mxsupport; ?>" style="width:<?php echo $support;?> ">
      <?php echo $support;?>
    </div>
  </div>  
  <br><br>
  <?php
  echo "<b>Total applicants:</b> ". $lccount;
  ?>
</body>
</html>
