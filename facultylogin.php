<?php
    session_start();
    session_destroy();
    session_start();
    ?>
<!DOCTYPE html>
<head>
<title>Faculty Login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    
     body
{
    margin:0;
    padding:0;
   background-color: #c7efcf;
        }
    img{
        width: 200px;
    }
    
    .content{
   	width: 60%;
   	margin: 20px auto;
       background-color: #fff;
        border-radius: 25px;
        text-align: center;
   }
    
    
    .form-group
    {
        padding: 10px;
        text-align: center;
       
    }
    .form-group input
    {
        width:100%;
         padding:5px auto;
    }
    
   form{
   	width: 100%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
  
    </style>
</head>
<body>
   
    <div class="content">
    <img src="logo_1.png" class="avatar">
    <h1>Login Portal</h1>
    <form action="checklogin.php" method="post">
        <div class="form-group">
        <input type="text" class="form-control"  name="tid" placeholder="Enter Faculty ID ">
        <br>
                <input type="password" name="pass" class="form-control" placeholder="Enter password">
            <br>
        <input type="submit" onclick="location:href.checklogin.php" value="Log In" class="btn btn-primary">
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
            </div>
        
    </form>
        </div>
</body>

</html>
                                                                   
                                                                       
              