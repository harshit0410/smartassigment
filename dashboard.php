<!DOCTYPE html>
<?php
include_once "pdo.php";
session_start();
if(!isset($_SESSION['roll']))
   {
       $_SESSION['error']="Please log in to continue.";
       header('Location: index.php');
   }
?>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>
        My Dashboard
    </title>
 
    <style>
        *{
            margin: 0;
        }
        .main {
           display: flex;
            text-align: center;
            padding: 20px;
             background-color: #e6e6e6;
                
                background-size: cover;
            background-position:center;
        }
     
        .cards{
            flex: 1;
            border-radius: 5%;
            width: 30vw;
            height: 75vh;
            margin: 0 5px;
            background-color: white;
        
        }
        .image img{
            border-radius: 5%;
            width: 100%;
        }
        .title{
            text-align: center;
        }
        .des {
            text-align: center;
            margin: 5px;
        }
         button{
            margin: 5px;
             padding: 10px;
        }
        .wrapper{
            
           
        }
        .dash{
            text-align: center;
            width: 100%;
            background-color: #e6e6e6;
            color:black;
        }
        .dash h1{
            margin: 0;
        }
        .display{
            background: url(images.jpg) ;
            height: 30vh;
            
            background-attachment: fixed;
            color: black;     
        }
        .content{
            text-align: center;
            
        }
       
    </style>
    
</head>
<body>
 <header>
    <div class="header">
         <div class="dash"><h1>DASHBOARD</h1></div>
         <div class="display">
    
         <div class="content">
        <br>
        <h2 style="font-size:2vw;"><?php
      echo htmlentities($_SESSION['name']);
    ?></h2>
        <h2 style="font-size:2vw;"><?php
      echo htmlentities($_SESSION['roll']);
    ?></h2>
 <br>
<form name="logoutForm" method="post" action="logout.php">
   <p><INPUT type="submit" value="Logout" name="logout" class="btn btn-primary" style="width:15%" ></p>
   </form>
    </div>
    </div>
     </div>
     </header>
    <!-- <div class="wrapper">
      <div class="main">  
<div class="cards" >
    <div class="image">
        <img src="cn.jpg" width="300px" height="300px" alt="cn">

    </div>
    
    <div class="title">
        <h2 style="font-size:2vw;">Computer Networks</h2>

    </div>
    <div class="des" id="1">
        <p style="font-size:2vw;">CS203
            <p>
        
                <a href="upload.php?sid=CS203"><button class="btn btn-primary" style="width:30%;"> Submit</button></a>

    </div>

</div>
<div class="cards" id="2">
    <div class="image">
        <img src="dotnet-services.png" width="300px" height="300px" alt="dotnet">

    </div>
    <div class="title">
        <h3 style="font-size:2vw;">Dot Net</h3>

    </div>
    <div class="des">
        <p style="font-size:2vw;">CS205
        <p>
                <a href="upload.php?sid=CS205"><button class="btn btn-primary" style="width:30%;" >Submit</button></a>
    </div>

</div>
<div class="cards" id="3">
    <div class="image">
        <img src="os.jpg"  width="300px" height="300px" alt="Operating System">

    </div>
    <div class="title">
        <h3 style="font-size:2vw;">Operating System</h3>

    </div>
    <div class="des">
        <p style="font-size:2vw;">CS214<p>
            
                 <a href="upload.php?sid=CS214"><button class="btn btn-primary" style="width:30%;">Submit</button></a>
    </div>
</div>
         </div><div class="main">
<div class="cards" id="4">
       <div class="image">
          <img src="toc.jpg"  width="300px" height="300px" alt="TOC">
           
       </div>
       <div class="title">
          <h3 style="font-size:2vw;">Theory of Computation</h3>
           
       </div>
       <div class="des">
          <p style="font-size:2vw;">CS213<p>
           <a href="upload.php?sid=CS213"><button class="btn btn-primary" style="width:30%;">Submit</button></a>
       </div>
        
    </div>
<div class="cards" id="5">
       <div class="image">
          <img src="calculator-791831_1920.jpg"  width="300px" height="300px"alt="Mathematics">
           
       </div>
       <div class="title">
          <h3 style="font-size:2vw;">Probability and Statistics</h3>
           
       </div>
       <div class="des">
          <p style="font-size:2vw;">MA204<p>
            <a href="upload.php?sid=MA204"><button class="btn btn-primary" style="width:30%;">Submit</button></a>
       </div>
        
    </div>

<div class="cards" id="6">
    <div class="image">
        <img src="psycho.jpg"  width="300px" height="300px" alt="Psychology">

    </div>
    <div class="title">
        <h3 style="font-size:2vw;">Psychology</h3>

    </div>
    <div class="des">
        <p style="font-size:2vw;">HS242
 <p>
     <a href="upload.php?sid=HS242"><button class="btn btn-primary" style="width:30%;">Submit</button></a>
    </div>

    </div>
    </div>
    </div>-->
    <?php
    
    echo "<table><thead><tr>
<th>Subject ID</th>
<th>Name</th>
<th>Action</th>
</tr></thead>\n";
    
    $s = $pdo->prepare("SELECT * FROM subject where sem=:s");
    try{
    $s->execute(array(':s'=> $_SESSION['sem']));
while($row = $s->fetch(PDO::FETCH_ASSOC)  ) {
    echo "<tr><td>";
    echo htmlentities($row['sid']);
    echo("</td><td>");
    echo htmlentities($row['sname']);
    echo("</td><td>");
    echo ('<a href="upload.php?sid='.$row['sid'].'">submit</a>');
    
    echo("</td></tr>\n");}}
        catch(PDOException $a){
            echo $_SESSION['sem'];
            
        }
echo"</table>";
    
    ?>
    </body>
    </html>