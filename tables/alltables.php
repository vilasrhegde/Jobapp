<?php
$link=new mysqli("localhost","root","","jobapp1");


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
<table class="table table-striped table-hover  table-responsive">
    <thead>
      <tr>
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
      </tr>
    </thead>
    <tbody>
<?php
$count=0;
    $res = mysqli_query($link, "SELECT s.id, s.fname,s.lname,s.email,s.linkedin,s.position,s.branch,s.relocate,a.dob,b.lwc,b.xp,b.skill,
    l.mobile,v.vision from submissions s,applicant a,`locate` l,background b,visions v where s.fname=a.name and s.fname=l.name and s.fname=b.name and s.fname=v.name and s.id=a.id;");
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
?>

    </tbody>
  </table>
  

</body>
</html>