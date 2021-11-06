<?php
$name="vilas";
$password="vilas";

$aname =$_POST['user'];
$apsw  =$_POST['psw'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{			
	if( $aname==$name && $apsw==$password)
    {
        header("Location: view.php");
		// header( "Location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=jobapp1&table=submissions&pos=0");
		die;
	}
	else{
        header("Location: admin.html");
        echo "Invalid!!!";
	}
}
else{
	echo "<b>Something went wrong!</b>";
}


?>