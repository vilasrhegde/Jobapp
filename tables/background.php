<?php
include '../connection.php';

$tot= mysqli_query($link, "SELECT count(*) as count from background ");

$total="";

  while($row=mysqli_fetch_array($tot))
  {
      $total= $row['count'];
  }

$query1= mysqli_query($link,"SELECT count(*) as count from `background` where `xp`<1 ");
while($row=mysqli_fetch_array($query1)){
  $fresher=$row['count'];
}
$query2= mysqli_query($link,"SELECT count(*) as count from background where xp>1 and xp<10 ");
while($row=mysqli_fetch_array($query2)){
  $medium=$row['count'];
}
$query3= mysqli_query($link,"SELECT count(*) as count from background where xp>10 ");
while($row=mysqli_fetch_array($query3)){
  $senior=$row['count'];
}
$perfresh=round($fresher / $total * 100) ;
$permedium=round($medium / $total * 100) ;
$persenior= round($senior / $total * 100 );

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


<table class="graph">
	<caption> Experience of Appllicants</caption>
	<thead>
		<tr>
			<th scope="col">Persons</th>
			<th scope="col">Percent</th>
		</tr>
	</thead><tbody>
		<tr style="height:<?php echo $perfresh; ?>%">
			<th scope="row">Freshers</th>
			<td><span><?php echo $perfresh; ?> %</span></td>
		</tr>
		<tr style="height:<?php echo $permedium;?>%">
			<th scope="row">Medium (< 10)</th>
			<td><span><?php echo $permedium ?> %</span></td>
		</tr>
		<tr style="height:<?php echo $persenior; ?>%">
			<th scope="row">Seniors (> 10)</th>
			<td><span><?php echo $persenior  ; ?> %</span></td>
		</tr>
	</tbody>
</table>  
<br><br>
<br>
<style>
  


.graph {
	margin-bottom:1em;
  font:normal 100%/150% arial,helvetica,sans-serif;
  margin:3% auto;
}

.graph caption {
	font:bold 150%/120% arial,helvetica,sans-serif;
	padding-bottom:0.33em;
}

.graph tbody th {
	text-align:right;
}

@supports (display:grid) {

	@media (min-width:32em) {

		.graph {
			display:block;
      width:600px;
      height:300px;
		}

		.graph caption {
			display:block;
		}

		.graph thead {
			display:none;
		}

		.graph tbody {
			position:relative;
			display:grid;
			grid-template-columns:repeat(auto-fit, minmax(2em, 1fr));
			column-gap:2.5%;
			align-items:end;
			height:100%;
			margin:3em 0 1em 2.8em;
			padding:0 1em;
			border-bottom:2px solid rgba(0,0,0,0.5);
			background:repeating-linear-gradient(
				180deg,
				rgba(170,170,170,0.7) 0,
				rgba(170,170,170,0.7) 1px,
				transparent 1px,
				transparent 20%
			);
		}

		.graph tbody:before,
		.graph tbody:after {
			position:absolute;
			left:-3.2em;
			width:2.8em;
			text-align:right;
			font:bold 80%/120% arial,helvetica,sans-serif;
		}

		.graph tbody:before {
			content:"100%";
			top:-0.6em;
		}

		.graph tbody:after {
			content:"0%";
			bottom:-0.6em;
		}

		.graph tr {
			position:relative;
			display:block;
		}

		.graph tr:hover {
			z-index:999;
		}

		.graph th,
		.graph td {
			display:block;
			text-align:center;
		}

		.graph tbody th {
			position:absolute;
			top:-2em;
			left:0;
			width:100%;
			font-weight:normal;
			text-align:center;
      white-space:nowrap;
			text-indent:0;
      font-weight: 700;

		}

		.graph tbody th:after {
			content:"";
		}

		.graph td {
			width:100%;
			height:100%;
			background:#F63;
			border-radius:0.5em 0.5em 0 0;
			transition:background 0.5s;
		}

		.graph tr:hover td {
			opacity:0.7;
		}

		.graph td span {
			overflow:hidden;
			position:absolute;
			left:50%;
			top:50%;
			width:0;
			padding:0.5em 0;
			margin:-1em 0 0;
			font:normal 85%/120% arial,helvetica,sans-serif;
/* 			background:white; */
/* 			box-shadow:0 0 0.25em rgba(0,0,0,0.6); */
			font-weight:bold;
			opacity:0;
			transition:opacity 0.5s;
      color:white;
		}

		.toggleGraph:checked + table td span,
		.graph tr:hover td span {
			width:4em;
			margin-left:-2em; /* 1/2 the declared width */
			opacity:1;
      font-size: 1rem;
      font-weight: 700;
		}



    


	} /* min-width:32em */

} /* grid only */

.table{
  max-height: 10vh;
  overflow: scroll;
}
  </style>
<br><br><br><br>  
<div>
  
<h2 style="text-align: center;text-shadow:0 4px 5px rgba(0,0,0,0.4);">Applicant table Details:</h2>
<?php


$qbg= mysqli_query($link, "SELECT * from background ");

$bgcount=0;



  echo "<center>";
  echo "<table class='table  col-md-12' border='5'>

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




?>
</div>  
</body>
</html>
