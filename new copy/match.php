<?php 
include "connection.php";
$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

// $firstname = "";
// $email= "";


// $res = mysqli_query($link, "select * from table1 where id=$id");

// while($row=mysqli_fetch_array($res))
// {
//     $firstname=$row["first_name"];
//     $email=$row["email"];
// }
if(isset($_POST['submit'])){
// $email= mysqli_query($link, "select * from submissions where email= '$_POST[email]'");
// $position= mysqli_query($link, "select * from submissions where position= '$_POST[position]'");
$result = mysqli_query($link,"SELECT * FROM submissions WHERE  email= '$_POST[email]' and posiiton= '$_POST[position]' ");
if($result!=NULL){
    header("Location: applicant.php");
}


// if($email and $position){
//     header("Location: applicant.php");
// }
// else{
//     header('Location: match.php');
// }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <title>Check data</title>
</head>
<body>
    
<div class="container">
  <h1>Enter your basic Details:</h1>
  <Br></Br>
  <form method="post" action="">
    <div class="input-group col-sm-12">
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
      <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>   
    </div>
    <br>
    <div class="input-group col-sm-12">
    <div class="form-group">
        <label for="sel1" class="text-center text-md-right">Choose:</label>
  <select aria-placeholder="Select your Role"  class="form-control " id="sel1" value="" disable selected name="position">
    <option>HR</option> 
    <option>Developer</option>
    <option>Testing</option>
    <option>Support</option>
  </select>

 
</div>
<div class="input-group">
<br><br>
    <input type="submit" name="submit" class="btn btn-primary" vlaue="Choose options">
</div>
  </form>
</div>


<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
        body{
            text-align: center;
        }
        h1{
            text-shadow: 3px 5px 4px rgba(0, 0, 0,0.3);
        }
</style>        
</body>
<?php





?>


</html>