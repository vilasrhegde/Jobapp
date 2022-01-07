<?php
$link = mysqli_connect("localhost", "root" , "") or die (mysqli_error($link));
mysqli_select_db($link, "jobapp1") or die(mysqli_error($link));

$id=$_GET["id"];

mysqli_query($link, "DELETE from submissions where id=$id");
?>

<script type="text/javascript">
    window.location="view.php";
</script>

