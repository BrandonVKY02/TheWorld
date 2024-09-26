<?php include('../includes/session.php')?>
<html>
<style>
    <?php include('../style/loginreg.css')?>
</style>
<body>
    <?php include('../includes/header.php');?>
    <?php include('../includes/navigation.php')?>
    <?php include('../register/processregister.php')?>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form-header">Register</div>
            <form method="post">
                <label>Email:</label>
                <input type="text" name="email" value="" placeholder="Email" required><br><br>
                <label>Name:</label>
                <input type="text" name="name" value="" placeholder="Name" required><br><br>
                <label>Password:</label>
                <input type="password" name="password" value="" placeholder="Password" required><br><br>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
    </div>

    <?php include('../includes/footer.php');?>

    <script>
        // Get the modal and close button
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        // When the page loads, display the modal
        window.onload = function() {
            modal.style.display = "block";
        }

        // When the user clicks on the close button, hide the modal
        span.onclick = function() {
            modal.style.display = "none";
            window.location.href="../login/login";
        }

        // When the user clicks anywhere outside of the modal, hide it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
