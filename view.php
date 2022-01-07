
<?php
session_start();


if($_SESSION['status']=='Successful'){
  // echo "<script>alert('Logged in!')</script>";
  echo "";
}
else{
  header("Location: index.html");
}


$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India
?>


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
  <title>Admin View</title>
</head>
<body>


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
<div class="topnav" id="topnav" >

<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">☰ Admin Panel
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li class="dropdown-header" aria-disabled="">Database tables</li>

      <li><a href="./tables/applicant.php">Applicant</a></li>
      <li><a href="./tables/background.php">Background</a></li>
      <li><a href="./tables/locate.php">Locate</a></li>
      <li><a href="./tables/visions.php">Vision</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Complete log</li>
      <li><a href="./tables/alltables.php">View all</a></li>
    </ul>
</div>



  <div class="tab">
  <a class="active"  href="index.html">Home</a>
  <a href="#table"><span>Table</span></a>
  <a href="#bottom"><span>Bottom</span></a> 
  <a href="#hold" onclick="ins()">Insert</a>
  </div>
<form action="" method="post">
<div class="input-group" >
    <input type="text" name="value" placeholder="Seach..." class="searc"></input>
   <input type="submit" name="search" value="🔍" class="sicon"></input>
</div>
</form>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>


</div>  
  <br><br><br><br>
  
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
  .topnav{
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(10px);
    padding: 10px;
    position: fixed;
    width: 100%;
    z-index: 100;
  }
  .tab a{
    color: #fff;
    font-size: 25px;
    margin: 0 20px;
    transition: .5s;
    padding: 15px 30px;
    border-radius:50px 50px 0 0;
    background: rgba(0,0,0,0.1);
    text-shadow: 0 5px 4px rgba(0,0,0,0.3);
  }
  .tab a:hover{
    text-decoration: none;
    background: #fff;
    color: #000;
    border-radius: 0 0 50px 50px  ;
  }
  .searc{
    padding: 10px 30px;
  }
  .sicon{
    background: #fff;
    font-size: 25px;
    margin:0 5px;
    border-radius: 50%;
  }

</style>

<?php
  $link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
  mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

if(isset($_POST['search']))
{
  $count=0;
  
  $link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));


    $res = mysqli_query($link, "SELECT * from submissions WHERE fname= '$_POST[value]' ");
    $las = mysqli_query($link, "SELECT * from submissions WHERE lname= '$_POST[value]' ");
    $pos = mysqli_query($link, "SELECT * from submissions WHERE position like '%$_POST[value]%' ");
    $city = mysqli_query($link, "SELECT * from submissions WHERE branch  like '%$_POST[value]%' ");

    // $lwc = mysqli_query($link, "SELECT * from background where lwc like '%$_POST[value]%'");
    // $xp = mysqli_query($link, "SELECT * from background where xp = '$_POST[value]'");
    // $skil = mysqli_query($link, "SELECT * from background where skill like '%$_POST[value]%'");

    
    echo "<center>";
    echo "<table class='table' border='5'>

  <tr>
  <th>First name</th>
  <th>Last name</th>  
  <th>Email</th>
  <th>LinkedIn</th>
  <th>Position</th>
  <th>Branch</th>
  <th>Edit</th>
  <th>Delete</th>
  </tr>";
  echo "</center>";


    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";  
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";
    
        echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
        $count= $count+1;
    }
    while($row=mysqli_fetch_array($las))
    {
        echo "<tr>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";
    
        echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
        $count= $count+1;
    }

    while($row=mysqli_fetch_array($pos))
    {
        echo "<tr>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";
    
        echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
        $count= $count+1;
    }
    while($row=mysqli_fetch_array($city))
    {
        echo "<tr>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";

    
        echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
        $count= $count+1;
    }
    

    
  }//if search





?>

</div>

<div id="pg1" class="col-md-12 text-center">
<form action="" method="post">
  <h2>Sort by Applied Date</h2>
  <label class="mx-3" for="from">From:</label>
  <input style="padding: 5px;border-radius:5px;" id="from" type="date" name="from" placeholder="Date from">
  <label style="margin-left:25px;" for="to">To:</label>
  <input style="padding: 5px;border-radius:5px;" id="to" type="date"  name="to"  placeholder="Date To">
  <input class="p-2 rounded mx-5" style="padding:  5px;margin-left:10px;background:#222; color:#fff" type="submit"  class="mx-3" name="dsort" value="Submit">
</form>
<hr>
<br>

<form action="" method="post">
<div class="center">
<input type="submit" class="btn btn-primary mx-5 px-4" name="job" value="Developer"></input>
        <input type="submit" class="btn btn-danger mx-5 px-5" name="job" value="HR"> </input>    
        <input type="submit" class="btn btn-success mx-5 px-5" name="job" value="Tester"> </input>
        <input type="submit" class="btn btn-warning mx-5 px-5" name="ot" value="Other"> </input> 
</div>   
</form>
<style>
  .center input{
    padding: 5px 20px;
    margin:0 10px;
  }
  h2{
    text-align: center  ;
  }

</style>
<br><br>

<?php


if(isset($_POST['dsort'])){
  $count=0;
  $link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

  $date = mysqli_query($link, "SELECT * from submissions WHERE `date` BETWEEN  '$_POST[from]' AND '$_POST[to]' group by(date) ");

  echo "<center>";
  echo "<table class='table' border='5'>

<tr>
<th>First name</th>
<th>Last name</th>
<th>Email</th>
<th>LinkedIn</th>
<th>Position</th>
<th>Branch</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
echo "</center>";
    

while($row=mysqli_fetch_array($date))
{
    echo "<tr>";
    echo "<td>"; echo $row["fname"]; echo "</td>";
    echo "<td>"; echo $row["lname"]; echo "</td>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["linkedin"]; echo "</td>";
    echo "<td>"; echo $row["position"]; echo "</td>";
    echo "<td>"; echo $row["branch"]; echo "</td>";
    echo "<td>"; echo $row["date"]; echo "</td>";

    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

    echo "</tr>";
    $count= $count+1;
}
echo "<h2>";
echo   "From " ."<span style='font-weight:900';>". $_POST['from'] . "</span>"." To " ."<span style='font-weight:900';>"  . $_POST['to'] ."</span>". " : " . $count . " Entries";
echo "</h2>";
   echo "</table>";
}




if(isset($_POST['ot'])){
  $count=0;
  $link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

  $oth = mysqli_query($link, "SELECT * from submissions WHERE position not like 'developer' 
  and position not like 'tester' and position not like 'hr' ");
echo "<center>";
      echo "<table class='table' border='5'>

    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>LinkedIn</th>
    <th>Position</th>
    <th>Branch</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>";
    echo "</center>";

while($row=mysqli_fetch_array($oth))
{
    echo "<tr>";
    echo "<td>"; echo $row["fname"]; echo "</td>";
    echo "<td>"; echo $row["lname"]; echo "</td>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["linkedin"]; echo "</td>";
    echo "<td>"; echo $row["position"]; echo "</td>";
    echo "<td>"; echo $row["branch"]; echo "</td>";


    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

    echo "</tr>";
    $count= $count+1;
}
echo "<h2>";
echo "Total Search results: " . $count;
echo "</h2>";
   echo "</table>";
}

if(isset($_POST['job']))
{
  $count=0;
  $link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

    $pos = mysqli_query($link, "SELECT * from submissions WHERE position = '$_POST[job]' ");
    $dev= mysqli_query($link,"SELECT COUNT(*) FROM submissions WHERE position='developer' ");
    $test= mysqli_query($link,"SELECT COUNT(*) FROM submissions WHERE position='tester' ");
    $hr= mysqli_query($link,"SELECT COUNT(*) FROM submissions WHERE position='hr' ");

    


    echo "<center>";
    echo "<table class='table' border='5'>

  <tr>
  <th>First name</th>
  <th>Last name</th>
  <th>Email</th>
  <th>LinkedIn</th>
  <th>Position</th>
  <th>Branch</th>
  <th>Edit</th>
  <th>Delete</th>
  </tr>";
  echo "</center>";

    while($row=mysqli_fetch_array($pos))
    {
        echo "<tr>";
        echo "<td>"; echo $row["fname"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["linkedin"]; echo "</td>";
        echo "<td>"; echo $row["position"]; echo "</td>";
        echo "<td>"; echo $row["branch"]; echo "</td>";
    
        echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
        echo "</tr>";
        $count= $count+1;
    }
    echo "<h2>";
    echo "Total Search results: " . $count;
    echo "</h2>";
    echo "</table>";
 
  }    
   ?>
<br>    
</div></div>
<br><br>
<?php

$fetchmax=mysqli_query($link,"SELECT * from recruit where id =1");
while($row=mysqli_fetch_array($fetchmax)){
  $mxdv=$row['dev'];
  $mhr=$row['hr'];
  $mxtest=$row['test'];
  $support=$row['support'];
}

$totalneed=$mxdv + $mhr + $mxtest + $support;
?>
<div class="col-sm-12" >
  

<form class="form-row " method="post" action="">

    <div class="form-group">  
  <h2>Set required Spots</h2>

      <label class="col-sm-12 control-label">For Developer</label>
      <div class="col-sm-12">   
        <input class="form-control center" id="dev" type="number"  name="dev" value="<?php echo $mxdv; ?>" >
      </div>

    <div class="form-group">  
      <label class="col-sm-12 control-label">For Human Resources</label>
      <div class="col-sm-12">   
        <input class="form-control" id="hr" type="number"  name="hr" value="<?php echo $mhr; ?>" >
      </div>

    <div class="form-group">  
      <label class="col-sm-12 control-label">For Testers</label>
      <div class="col-sm-12">   
        <input class="form-control" id="test" type="number"  name="test" value="<?php echo $mxtest; ?>" >
        <br><br>
      </div>
    </div>
    <input type="submit" name="setmax" style="width: 100%;background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);" class="btn btn-primary btn-lg btn-block"   />
</form>
</div>
<?php
if(isset($_POST['setmax'])){
  $mxdev=$_POST['dev'];
  $mxhr=$_POST['hr'];
  $mxtester=$_POST['test'];

  $set= mysqli_query($link, "UPDATE `recruit` SET `dev`='$mxdev',`test`='$mxtester',`hr`='$mxhr' WHERE id=1");

  ?>
<script>
  window.location.href="view.php";
  </script>
<?php
}
?>



<div class="hold" id="hold">

<div  class="container col-sm-12"  >
  <h2>Insert data</h2>

  <form class="form-row " method="post" action="">

    <div class="form-group">  
      <label class="col-sm-12 control-label">First Name</label>
      <div class="col-sm-12">   
        <input class="form-control" id="firstname" type="text" value="" name="fname" placeholder="First name" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-12 control-label" for="lastname">Last name</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="lastname" type="text" name="lname" placeholder="Last name" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="email">Email</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="linkedin">LinkedIn</label>
      <div class="col-sm-12">
        <input type="url" class="form-control" name="linkedin" id="linkedin" placeholder="LinkedIn" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="dob">Date of Birth</label>
      <div class="col-sm-12">
        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of birth" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="position">Position</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="position" id="position" placeholder="Position" >
       </input>
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="mobile">Mobile</label>
      <div class="col-sm-12">
        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="city_name">Branch Name</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="city_name" name="branch" placeholder="City" >
      </div></div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="last_company">Last Company</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="lwc" id="last_company" placeholder="Last company" >
      </div></div>
      <div class="form-group">
      <label class="col-sm-12 control-label" for="rel" >Are you willing to relocate?</label>
      <div class="col-sm-12">
  <input type="radio" name="relocate" value="Yes"   class="form-control-row"  id="rel"> Yes </label>
                    <input type="radio" aria-selected="true" id="rel"  class="form-control-row"  name="relocate" value="No"> No 
                      <input type="radio" name="relocate" id="rel"  class="form-control-row"  aria-selected="true" value="Notsure"> Not Sure 
      </div>     
      </div>
    </div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="xp">Experience</label>
      <div class="col-sm-12">
        <input type="number" class="form-control" name="xp" id="xp" placeholder="Experience" >
      </div>
    </div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="skill">Skill</label>
      <div class="col-sm-12">
        <input type="textarea" class="form-control" name="skill" id="skill" placeholder="Skills" >
      </div>
    </div>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-12 control-label" for="vision">Visions</label>
      <div class="col-sm-12">
        <input type="textarea" class="form-control" name="vision" id="vision" placeholder="Any aims" >
      </div>
    </div>
    <input type="submit" name="insert" style="width: 100%;background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);margin:10px 0;" class="btn btn-primary btn-lg btn-block"   />
  
  </form>
</div>

</div>
<style>
  #hold{
    max-height: 100%;
    width: 100%;
    display: none;
    flex-direction: column;
    position: relative;
    overflow: hidden;
  }
</style>
<script>
function ins(){
  document.getElementById("hold").style.display="flex";
}
</script>


<br><br>

<div  id="table" class="col-lg-12">

<table class="table table-dark table-hover ">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Linkedin</th>
        <th>Position</th>
        <th>Branch</th>
        <th>Relocate</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php

$mn = mysqli_query($link, "SELECT * from `submissions` ");
$count=0;
while($row=mysqli_fetch_array($mn))
{
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

    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    
    echo "</tr>"; 
    $count= $count+1;
}
echo "<h2>";
echo "Total Submissions: " . $count;
echo "</h2>";
?>
    </tbody>
  </table>
    


  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body, html{
  scroll-behavior: smooth;
}
label{
  margin-top: 20px;
}
h2{
  text-shadow: 4px 4px 4px rgba(0,0,0,0.3);
}
#firsta:hover{
      border-radius: 0;
    }
    a{
      text-decoration: none;
    }
    a:hover{
      text-decoration: none;
    }
</style>


<div class="container" id="bottom">
  <?php
   
  ?>
  <h2>Total Recruitment:</h2>
  <p></p> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $count; ?>" aria-valuemin="0" aria-valuemax="<?php echo $totalneed; ?>" style="width:<?php echo $count;?>% ">
      <?php echo $count;?>
    </div>
  </div>
<br>
</div>

<br>
</div>

<br>
<div class="chart">

<div id="piechart">
  
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Skill', 'Number of persons'],
  ['Problem Solving', <?php $prob=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%solv%';");
$row=mysqli_fetch_array($prob);
echo $row["skill"];  ?>],
  ['Ethical Hacking',  <?php $hack=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%hack%';");
$row=mysqli_fetch_array($hack);
echo $row["skill"];  ?>],
  ['Data Science and Analysis',  <?php $data=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%data%';");
$row=mysqli_fetch_array($data);
echo $row["skill"];  ?>],
  ['Web Development',  <?php $web=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%web%';");
$row=mysqli_fetch_array($web);
echo $row["skill"];  ?>],
  ['Debugging',  <?php $bug=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%bug%';");
$row=mysqli_fetch_array($bug);
echo $row["skill"];  ?>],
  ['Coding',  <?php $cod=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%cod%';");
$row=mysqli_fetch_array($cod);
echo $row["skill"];  ?>],
  ['Big data',  <?php $big=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill like '%big data%';");
$row=mysqli_fetch_array($big);
echo $row["skill"];  ?>],
  ['Other',  <?php $other=mysqli_query($link, "SELECT count(*) skill FROM `background` WHERE skill not like '%solv%' and '%data%' and '%web%'  ;");
$row=mysqli_fetch_array($other);
echo $row["skill"];  ?>]


]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'The Skills applicants mentioned', 'width':600, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</div>

<style>
  .chart{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
  }
</style>
 



<div  class="center">
        <p style="text-align: center;color: rgba(0, 0, 0, 0.493);bottom: 5%;">&copy; <script>document.write(new Date().getFullYear())</script> Vilas Hegde All Rights Reserved</p>
</div>






</body>
<?php

if(isset($_POST["insert"]))
{


 $sql= "INSERT INTO `submissions`(`id`, `fname`, `lname`, `email`, `linkedin`, `position`, `branch`, `relocate`, `date`) 
  VALUES (NULL,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[linkedin]','$_POST[position]',
  '$_POST[branch]','$_POST[relocate]', '".$curr_date."' );" ;   

  if ($link->query($sql) === TRUE) {
  $last_id = $link->insert_id;
  $sql1=mysqli_query($link,"INSERT INTO `applicant`(`id`, `name`, `email`, `mobile`, `dob`)
  VALUES ( '$last_id','$_POST[fname]','$_POST[email]','$_POST[mobile]','$_POST[dob]');");

  $sql2=mysqli_query($link,"INSERT INTO `background`(`id`,`name`, `lwc`, `xp`, `skill`) 
  VALUES ( '$last_id','$_POST[fname]','$_POST[lwc]','$_POST[xp]','$_POST[skill]');");

  $sql3=mysqli_query($link,"INSERT INTO `locate`(`id`,`name`, `branch`, `position`, `mobile`) 
  VALUES ( '$last_id','$_POST[fname]','$_POST[branch]','$_POST[position]','$_POST[mobile]');");

  $sql4=mysqli_query($link,"INSERT INTO `visions`(`id`,`name`, `vision`, `skills`) 
  VALUES ( '$last_id','$_POST[fname]','$_POST[vision]','$_POST[skill]'); ");
$link -> close();
 ?>
 <script type="text/javascript">
 window.location.href='view.php';
 </script>
 <?php

} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
  


}
?>


<?php

if(isset($_POST["delete"]))
{
mysqli_query($link, "DELETE from submissions where first_name='".$firstname."' and email='".$email."' ") or die (mysqli_error($link));
?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}


if(isset($_POST["update"]))
{
mysqli_query($link, "UPDATE submissions set first_name='$_POST[firstname]' where first_name='$_POST[firstname]'") or die (mysqli_error($link ));
?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}


?>




</html>