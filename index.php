<?php
    session_start();
    
    
    ?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width", initial-scale=1>
    <title>Student Account</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        * {
            box-sizing: border-box;
        }
        
        
    
        .wrapper{
                background: url("https://static.careers360.mobi/media/presets/500X333/colleges/social-media/media-gallery/279/2017/10/14/8.jpg");
                height:100vh;
                background-size: cover;
                background-position: center;
            }
        .container {
            position: absolute;
            top: 29%;
            left: 25%;
            right: 25%;
            
            border-radius: 20px;
            background-color: rgb(255,255,255,0.8);
            padding: 20px 40px 30px 40px;
           
            box-sizing: border-box;
        }
        /* style inputs and link buttons */
        
        input,
        .btn {
            width: 45%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            margin: 5px 0;
            opacity: 0.85;
            display: inline-block;
            font-size: 17px;
            line-height: 20px;
            text-decoration: none;
        }
        
        input:hover,
        .btn:hover {
            opacity: 1;
        }
        /* style the submit button */
        
        input[type=submit] {
            background-color: royalblue;
            color: white;
        }
        
        input[type=submit]:hover {
            opacity: 0.8;
        }
        /* Two-column layout*/
        
        .col {
            float: left;
            width: 100%;
            margin: auto;
            padding: 0 0px;
            margin-top: 6px;
        }
        /* Clear floats after the columns */
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* vertical line */
        
        .vl {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            border: 2px solid #ddd;
            height: 175px;
        }
        /* text inside the vertical line */
        
        .vl-innertext {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 8px 10px;
        }
        /* hide some text on medium and large screens */
        
        .hide-md-lg {
            display: none;
        }
        /* bottom container */
        
        .bottom-container {
            text-align: center;
            background-color: #666;
            border-radius: 0px 0px 4px 4px;
        }
        
        .button {
            padding-left: 15px;
            padding-right: 15px;
            float: right;
            display: block;
            width: 20%;
            border: none;
            background-color: royalblue;
            color: white;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            position: absolute;
            top:60%;
            left:60%;
            border-radius: 10px;
        }
        
        button:hover {
            opacity: 0.8;
        }
        .avatar{
            position: absolute;
                    top:8%;
            border-radius: 30%;
            width: 150px;
            height: 150px;
            margin-left: 53%;
            
        }
        
        @media screen and (max-width: 700px) {
            .col {
                width: 100%;
                margin-top: 10px;
            }
            /* hide the vertical line */
            .vl {
                display: none;
            }
            /* show the hidden text on small screens */
            .hide-md-lg {
                display: block;
                text-align: center;
            }
            button{
                float:none;
            }
            
        }  img{
            
            margin-top: 8px;
            margin-left:400px;
            border-radius: 10px;
            
        }
   </style>
</head>
<body>

     <div class="wrapper">
    <div class="i1">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/DIT_University_Official_Logo.png" alt="dit-campus img" style="margin-left:590px" width=160 height="150">
    </div>
    <div class="container">
       <img src="graphic-3715443_1280.png" class="avatar" alt="avatar">
        <form action="signup.php" method="post">
            <div class="row">

                <div class="vl">
                    <span class="vl-innertext">or</span>
                </div>
                <input type="submit" value="SIGN UP">
            
            </div></form>
                <div class="col">
                    <div class="hide-md-lg">
                        <p>Or sign in manually:</p>
                    </div>
                    <form method="post" action="success.php">
                    <label><b>Enter University Roll No.</b></label>
                    <br>
                    <input type="text" name="roll" placeholder="170102001" required>
                    <br>
                    <label><b>Enter Your Password</b></label>
                    <br>
                    <input type="password" name="password" placeholder="**********" required>
                    <br>
                    <?php
                    if ( isset($_SESSION['error']) ) {
                        echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
                        unset($_SESSION['error']);
                        }
                        if ( isset($_SESSION['success']) ) {
                            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
                        unset($_SESSION['success']);
                        }
                    ?>
                    <br>
                    <input type="submit" value="Login">
                    <br></div></form>
                    <div class="col">
                        <a href="reset.php"> Forgot password?</a>
                        <br>
                        <a href="facultylogin.php"> Teacher's Login</a>
                        <a href="#" style="color:black" class="btn"> </a>
                    </div>
                </div>

            </div>
        
    </div>
</div>
    

</body>

</html>