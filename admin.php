<?php
$name="vilas";
$password="vilas";

if(isset($_POST['admin'])){
	$aname =$_POST['user'];
	$apsw  =$_POST['psw'];
	if( $aname==$name && $apsw==$password)
    {
		$_SESSION['status']='Successful';
        header("Location: view.php");
		
	}
	else{
        header("Location: index.html");
	}
}






?>