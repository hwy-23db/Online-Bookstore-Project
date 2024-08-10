<?php
session_start();
include 'admin/connect.php';
include 'userfunction.php';
if(isset($_POST['btnaddfeedback']))
{
    addfeedback();
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  
  <section>
    
    <div class="section-header">
      <div class="container">
        <h2>Contact Us</h2>
        <p>We'd love to hear from you! Whether you have a question, feedback, or need assistance, our team is here to help. Get in touch with us through any of the following methods: </p>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>Yangon</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>01-123-456-789</p>
              <p>09-123-456-789</p>
             
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>bookpalace@gmail.com</p>
            </div>

          </div>
        </div>
        
        
        <div class="contact-form">
          <form action="" method="post" id="contact-form">
            <h2>Feedback us</h2>
            <div class="input-box">
            <label for="">Username</label>
              <input type="text" required="true" name="name">              
            </div>
            
            <div class="input-box">
            <label for="">Email</label>
              <input type="email" required="true" name="email">             
            </div>

            <div class="input-box">
            <label for="">Phone</label>
            <input type="phone" required="true" name="phone">                           
            </div>
            
            <div class="input-box">
            <label for="">Message</label>
             <input type="textarea" name="message">
            </div>
            
            <div class="input-box">
              <input type="submit" value="Send" name="btnaddfeedback">
            </div>
            <div class="input-box">
            <a href="home.php" style="text-decoration:none;"><p style="color:black;">Back To Home</p></a>
            </div>
            
          </form>
        </div>
        
      </div>
    </div>
  </section>
  
</body>
</html>