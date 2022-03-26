<?php

include 'connection.php';

$id=$_GET["id"];

mysqli_query($link, "DELETE from submissions where id=$id");
?>

<script type="text/javascript">
    window.location="view.php";
</script>

