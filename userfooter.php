<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
footer{
    width: 100%;
    background: #eaeaea;
    height: 100%;
}

footer .footer_main{
    width: 100%;
    display: flex;
    justify-content: space-around;
}

footer .footer_main .tag{
    margin: 10px 0;
}

footer .footer_main .tag img{
    width: 300px;
    margin-bottom: 10px;
    margin-left :40px;
}

footer .footer_main .tag h2,h4 {
    font-family :  'Poppins', sans-serif;
}

footer .footer_main .tag p{
    width: 250px;
    line-height: 22px;
    text-align: justify;
}

footer .footer_main .tag h1{
    font-size: 25px;
    margin: 25px 0;
    color: #000;
}

footer .footer_main .tag a{
    display: block;
    color: black;
    text-decoration: none;
    margin: 10px 0;
}

footer .footer_main .tag i{
    margin-right: 10px;
}

footer .footer_main .tag .social_link i{
    margin: 0 5px;
}

footer .footer_main .tag .search_bar{
    width: 230px;
    height: 30px;
    background: rgba(202,202,202);
    border-radius: 25px;
}

footer .footer_main .tag .search_bar input{
    width: 200px;
    padding: 2px 0;
    position: relative;
    top: 17%;
    left: 6%;
    border: none;
    outline: none;
    font-size: 13px;
    background: none;
}

footer .footer_main .tag .search_bar button{
    padding: 7px 15px;
    background: #089da1;
    border: none;
    margin-top: 15px;
    border-radius: 25px;
    color: #fff;
    cursor: pointer;
}

footer .end{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
    color: #000;
}

footer .end span{
    color: #089da1;
    margin-left: 10px;
}
</style>    
</head>
<body>
<footer>
    <div class="footer_main">
  
        <div class="tag">
            <img src="photos/logo4.png">
            
        </div>
  
        <div class="tag">
            <h1>Quick Link</h1>
            <a href="home.php">Home</a>
            <a href="userindex.php">All Books</a>
            <a href="bestseller.php">Bestseller</a>
            <a href="newrelease.php">Newrelease</a>
            <a href="contact.php">Contact us</a>
            <a href="login.php">Account</a>
            
        </div>
  
        <div class="tag">
            <h1>Contact Info</h1>
            <a href="#"><i class="fa-solid fa-phone"></i>+95 01 123 456 789</a>
            <a href="#"><i class="fa-solid fa-phone"></i>+95 09 123 456 789</a>
            <a href="#"><i class="fa-solid fa-envelope"></i>bookpalace@gmail.com</a>
            
        </div>
  
        <div class="tag">
            <h1>Follow Us</h1>
            <div class="social_link">
                <a href="bookproject/facebook login.html"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="bookproject/instagram.html"><i class="fa-brands fa-instagram"></i></a>
                <a href="bookproject/twitter.html"><i class="fa-brands fa-twitter"></i></a>
            </div>
            
        </div>        
        
    </div>
  
    <p class="end">Design By<span><i class="fa-solid fa-face-grin"></i> Group 1</span></p>
  
  </footer>

  
</body>
</html>
