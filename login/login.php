<?php include('../login/processlogin.php');?>
<!DOCTYPE html>
<html>
<style>
    <?php include('../style/loginreg.css')?>
</style>
<head>
    <title>Login Page</title>
<body>
    <?php include('../includes/header.php');?>
    <?php include('../includes/navigation.php');?>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form-header">Log In</div>
            <form method="post">
                <label>Email:</label>
                <input type="text" name="email" value="" placeholder="Email"><br><br>
                <label>Password:</label>
                <input type="password" name="password" value="" placeholder="Password"><br><br>
                <input type="submit" name="login" value="Log In">
            </form><br>
            <label>Don't Have an Account?</label>
            <button onclick=gotoreg() class="reg">Register now</button>
        </div>
    </div>

    <?php include('../includes/footer.php');?>
    
    <script>
        function gotoreg(){
            window.location.href="../register/register";
        }
        var modal = document.getElementById("myModal");

        window.onload = function() {
            modal.style.display = "block";
        }

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
            window.location.href="../home/home";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
