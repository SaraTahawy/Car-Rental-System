
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CAR RENTAL</title>
     <!--  preventing them from going back to the previous page -->
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/style.css">
 <!--  preventing them from going back to the previous page -->
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>



<?php


require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
     
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
//   cheak if the user data = data in sql 
        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {   //move into another page
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }



                



            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }







?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CARS</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="aboutus.html">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    
                    <li><a href="contactus.html">CONTACT</a></li>
                  <li> <button class="adminbtn"><a href="adminlogin.php">ADMIN LOGIN</a></button></li>
                </ul>
            </div>
            
          
        </div>
        <div class="content">
            <h1>Rent Your <br><span>Dream Car</span></h1>
            
            <button class="cn"><a href="register.php">JOIN US</a></button>
            <div class="form">
                <h2>Login Here</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <input class="btnn" type="submit" value="Login" name="login"></input>
                </form>
                <p class="link">Don't have an account?<br>
                <a href="register.php">Sign up</a> here</a></p>
             
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
