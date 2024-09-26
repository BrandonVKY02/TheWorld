<?php include('../includes/session.php') ?>
<html>
<style>
	<?php include('../style/style1.css')?>
</style>
<script>
	function gotoaddmusic(){
		window.location.href="../music/addmusic.php";
	}
</script>
<header>
</header>
<body>
<?php include('../includes/navigation.php')?>
<form style="left:none;
	text-align:left;
	width:99%;
	height:auto;
	border:none;
	padding:20px;" method="post">
	<input type="text" name="content" id="content" placeholder="Search music" size="60%" class="searchbox">
		<select name="categories">
			<option value="songname">Song</option>
			<option value="artist">Artist</option>
		</select>
	<input type="submit" class="search-button" value="search" name="Search">
</form>
<?php 
if ($loggedin == true){ 
    echo'<button class="addmusicbutton" onclick="gotoaddmusic()">Add Music</button>';
} ?>
<table>
	<tr>
		<th>No</th>
		<th>Song</th>
		<th>Artist</th>
		<th>Genre</th>
		<th>Remove</th>
		<th>Edit</th>
	</tr>
	<content>
		<?php include('../music/displayyourmusic.php')?>
	</content>
</table>
</body>
<footer>
<?php include('../includes/footer.php');?>
</footer>
</html>