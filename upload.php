<?php 
include_once "pdo.php";
session_start();

$sid=$_GET['sid'];
$q=$pdo->prepare("select * from assignment where sid=:s");
$q->execute(array(':s'=> $sid));

?>
<html>
<head>
    <title>Submit assignment</title>
    <meta name="viewport" content="width=device_width,initial_scale=1">
    
    </head>
    <body style="background-color: white;"><header style="background-color:lightskyblue;
    text-align: center;
    font-size: 30px;">
                  <h2 style="color:white">Assignment Submission</h2></header>
                  
                  
                  
                  
       <div class="div" style="text-align:center; font-family:sans-serif;">
          
          <?php
    if ( isset($_SESSION['error']) ) 
    {
                        echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
                        unset($_SESSION['error']);
                        }
                        if ( isset($_SESSION['success']) ) {
                            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
                        unset($_SESSION['success']);
                        }
        
        ?>
           <?php
           
        while($row=$q->fetch(PDO::FETCH_ASSOC))
        {
            echo "<h2>".$row['sid']."  ".$row['sname']."</h2><br>";
        echo $row['description'];
        
echo "<br><br><h3>Assignment question file:  </h3>
   <button style='padding:7px;'> <a href='images/". $row['afile']."' target='_blank'>download</a></button>
    <div style='height: 30px;
    background-color: white;'> 
      
      
        <form enctype='multipart/form-data' action='u.php?aid=".$row['aid']."&tid=".$row['tid']."&sid=".$row['sid']."' method='post'>";
     
      
    
         {
    echo "<p>
        <input type='file' name='docfile'>
            <button type='submit' name='btn-upload '>upload</button>
            </p>   </form>
        </div>
        <hr>";
     }
        //next($row);
        }          
           
           ?></div>
    </body>
</html>