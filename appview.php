

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
h2{
  text-shadow: 0 4px 5px rgba(0, 0, 0, 0.493);
}
 
</style>


<center>
    <br>
<div class="container">
  <h2>Get your info</h2><br>
  <form class="form-inline" action="" method="post">
  <div class="form-group">
      <label for="fname">Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="name">
    </div>
    <input type="submit" name="submit" class="btn btn-primary"></input>
  </form>
</div>


</center>
<br><br><hr>


<center>

<div class="col-md-12 ">
<h2>Your details:</h2>
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

date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$firstname = "";
$lastname= "";
$email= "";
$linkedin= "";
$position="";
$branch="";
$mobile="";
$dob="";
$lastcompany="";
$xp="";
$skill="";
$relocate="";
$vision="";


if(isset($_POST['submit']))
{
    $res = mysqli_query($link, "SELECT s.id, s.fname,s.lname,s.email,s.linkedin,s.position,s.branch,s.relocate,a.dob,b.lwc,b.xp,b.skill,
    l.mobile,v.vision from submissions s,applicant a,`locate` l,background b,visions v WHERE  s.fname= '$_POST[name]' and  a.name='$_POST[name]' 
    and l.name='$_POST[name]' and  b.name='$_POST[name]' and v.name='$_POST[name]' and s.id=a.id and s.id =l.id and s.id= b.id and s.id =v.id ;");
   while($row=mysqli_fetch_array($res))
    {
     
        echo "<tr>"; 
       
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

        echo "<td>"; ?><a href="viewsome.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success btn-block" style="width: 100%;">Edit</button></a> <?php echo "</td>";
       
       
       
        echo "</tr>";   
  
    }
}




?>

    </tbody>
  </table>
<center>
  <div class="container text-center"  style="margin: auto;">
    <br>
  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo" style="margin: auto;">Policy</button>
  <div style="text-align: center;" id="demo" class="collapse">
These informations will not be shared or altered in any cases. Give right informations accordingly whenever asked.
<p style="text-align: center;color: rgba(0, 0, 0, 0.493);bottom: 5%">&copy; <script>document.write(new Date().getFullYear())</script> Vilas Hegde All Rights Reserved</p>

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