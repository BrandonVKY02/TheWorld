<?php include('../includes/session.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>

  <style>
    <?php include('../style/style1.css');?>
    <?php include('../style/styleforcontact.css');?>
  </style>
</head>


<body>
  <?php include('../includes/header.php');?>
  <?php include('../includes/navigation.php');?>
  <?php include('../home/sendcontact.php');?>
  
  <div class="container">
    <h1 class="title">Contact Us</h1>

    <p class="description">We value your feedback and inquiries. Feel free to reach out to us using the methods below.</p>

    <h2 class="section-title">Contact Form</h2>

    <form class="contact-form" method="post">
      <div class="form-group">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" class="form-input" required>
      </div>
      
      <div class="form-group">
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" class="form-input" required>
      </div>

      <div class="form-group">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" class="form-input" rows="5" required></textarea>
      </div>

      <input type="submit" name="send" value="SEND" class="submit-button">
    </form>
  </div>

  <?php include('../includes/footer.php');?>
</body>
</html>
