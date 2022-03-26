<?php
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/webp" sizes="32x32"  href="../J.png">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <title>View All</title>
</head>
<body>

<div class="col-md-12 ">
<h2>All details:</h2>
<a href="#er">ER Model</a><br>
<a href="#schema">Schema</a><br>
<form action="" method="post">
  <input class="todays" type="submit" name="todays" value="Get Today's"></input>
</form>




<?php


if(isset($_POST['todays'])){
  $sql = "CALL `get_today_submissions`(@p0);";
  $sql1 = mysqli_query($link,$sql);

  echo "<center>";
  echo "<table class='table table-striped table-hover  table-responsive'>

  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Surname</th>
  <th>Email</th>
  <th>Linkedin</th>
  <th>Position</th>
  <th>Branch</th>
  <th>Relocate</th>
  <th>Date</th>
  </tr>";
  echo "</center>";

  while($row=mysqli_fetch_array($sql1)){
    echo "<tr>";
    echo "<td>"; echo $row["id"]; echo "</td>";
    echo "<td>"; echo $row["fname"]; echo "</td>";
    echo "<td>"; echo $row["lname"]; echo "</td>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["linkedin"]; echo "</td>";
    echo "<td>"; echo $row["position"]; echo "</td>";
    echo "<td>"; echo $row["branch"]; echo "</td>";
    echo "<td>"; echo $row["relocate"]; echo "</td>";
    echo "<td>"; echo $row["date"]; echo "</td>";
    echo "</tr>";
  }
  echo "</table>";

}
else{
  $count=0;
  $res = mysqli_query($link, "select * from total");

  echo "<table class='table table-dark'>
  <thead>
  <tr>
    <th>#</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Linkedin</th>
    <th>Position</th>
    <th>Branch Name</th>
    <th>Mobile</th>
    <th>Birth Date</th>
    <th>Last Company</th>
    <th>Experience</th>
    <th>Skills</th>
    <th>Relocate</th>
    <th>Visions</th>
  </tr>";
echo "</thead>";

    while($row=mysqli_fetch_array($res))
    {

        echo "<tr>"; 
        echo "<td>"; echo $row["id"]; echo "</td>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";
        echo "<td>"; echo $row["mobile"]; echo "</td>";
        echo "<td>"; echo $row["dob"]; echo "</td>";
        echo "<td>"; echo $row["lwc"]; echo "</td>";
        echo "<td>"; echo $row["xp"]; echo "</td>";
        echo "<td>"; echo $row["skill"]; echo "</td>";
        echo "<td>"; echo $row["relocate"]; echo "</td>";
        echo "<td>"; echo $row["vision"]; echo "</td>";        
    
        echo "</tr>";
        $count+=1;
     
    }
  
 
echo "Total:". $count . " tuples";
}


?>


<table class="table table-striped table-hover  table-responsive">

   
  </table>
  
<div class="er" id="er">
  <img src="../ER Diagram DBMS.drawio (1).png" alt="Entity relationship diagram">
</div><br>
<div class="schema" id="schema">
  <img src="../Schema.jpg" alt="Schema diagram">
</div>

<style>
  .er{
    width: 100%;
    position: relative;
  }
  .er img{
    width: 100%;
    position: relative;
    height: fit-content  ;
  }
  .schema{
    position: relative;
    width: fit-content;
  }
  .schema img{
    position: relative;
    width: fit-content;
    max-width: 100%;
  }
  .todays{
    display: inline;
    text-align: center;
    width: 100%;
    background: #000;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
  }
</style>

</body>
</html>