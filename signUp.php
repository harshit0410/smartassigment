<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
         SignUp Page
        </title>
        <style>
            .wrapper{
                background: url("./books-1163695_1920.jpg");
                height: 100vh;
                background-size: cover;
                background-position: center;
            }
            .container{
                position: absolute;
                top: 50%;
                left: 50%;
                right: 50%;
                transform: translate(-50%,-50%);
                background-color: white;
                color: black;
                position: relative;
                padding: 16px 0 30px 0;
                font-size: 20px;
                box-sizing: border-box;
               max-width: 600px;
                text-align: center;
                
            }
            input[type=text],[type=password]{
                background-color: whitesmoke;
                border-collapse: collapse;
                font-size: 15px;
                padding:5px 5px 5px 5px;
                border:none;
            }
             
                
            .button{
                box-sizing: border-box;
                font-size: 25px;
                background-color: gray;
            }
            .button:hover{
                background-color: cadetblue;
                
            }
        
        </style>
    </head>
    <body>
     <div class="wrapper">    
          <div class="container">
           <h2>SIGN UP FORM</h2><hr>
            <form action="register.php" method="POST">
                <label>
                    <a>FullName</a><br>
                    <input type="text" name="name" placeholder="Enter name" required>
                </label><br>
                <label>
                    <a>Roll No.</a><br>
                    <input type="text" name="roll" placeholder="Enter Roll No." required >
                </label><br>
                <label>
                    <a>SAP ID</a><br>
                    <input type="text" name="sapid" placeholder="EnterSAP ID" required >
                </label><br>
                <label>
                    <a>Semester</a><br>
                    <input type="text" name="sem" placeholder="Enter Semester" required >
                </label><br>
                 <label>
                    <a>Email</a><br>
                    <input type="text" name="email" placeholder="Enter email" required >
                </label><br>
                <label>
                    <a>Password</a><br>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </label><br>
                <hr><p>By creating an account you agree to our <a href="#" style="color:dodgerblue" >Terms & Privacy</a>.</p>
                <label>
                  <?php
                    if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
                    ?>
                   <input type="submit" value='SUBMIT' class="button">

                </label><br>
            </form>
        </div></div>
    
    </body>
</html>