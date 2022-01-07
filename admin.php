<?php
session_start();
$name="vilas";
$password="vilas";

$aname =$_POST['user'];
$apsw  =$_POST['psw'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{			
	if( $aname==$name && $apsw==$password)
    {
		$_SESSION['status']='Successful';
        header("Location: view.php");
		die;
	}
	else{
        header("Location: index.html");
	}
}
else{
	echo "<b>Something went wrong!</b>";
}





?>