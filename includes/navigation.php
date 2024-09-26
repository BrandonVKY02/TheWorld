<!DOCTYPE html>
<html>
<style>
<?php include('../style/style1.css')?>
<?php include('../style/navstyle.css')?>
</style>

<head><title>The World Music</title></head>
<body>
<?php 
if ($loggedin == true){ 
    include('../includes/nav.php');
} else { 
    include('../includes/navout.php');
} ?>
</body>
</html>