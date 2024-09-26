<?php include('../includes/session.php'
)?>
<html>
<style>
	<?php include('../style/style1.css')?>
</style>
<header>
<?php include('../includes/header.php');?>
</header>
<body>
<?php include('../includes/navigation.php')?>
<table>
	<tr>
		<th>Song</th>
		<th>Artist</th>
		<th>Genre</th>
		<th>View Detail</th>
		<th>Remove</th>
	</tr>
	<content>
		<?php include('../music/processdisplayfav.php')?>
	</content>
</table>
</body>
<footer>
<?php include('../includes/footer.php');?>
</footer>
</html>