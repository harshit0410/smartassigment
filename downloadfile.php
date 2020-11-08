<?php 
include_once "pdo.php";
session_start();
if(!isset($_SESSION['tid']))
   {
       $_SESSION['error']="Please log in to continue.";
       header('Location: facultylogin.php');
   }
if(isset($_POST['aid']) && isset($_POST['sid'])){

$q=$pdo->prepare("select * from submit where aid=:a and sid=:s");
$q->execute(array(':a'=>$_POST['aid'] ,':s'=> $_POST['sid']));
}
else
{
    $_SESSION['error']="Please fill tid and sid.";
    header('Location: redirect.php');
    
}
?>
<!DOCTYPE>

<head>
    <title>Faculty Assignment Access Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body
{
    margin:0;
    padding:0;
   background-color: #c7efcf;
        }
h2
{
    color: azure;
    font-family: sans-serif;
    font-size: 25px;
}
 .table
    {
        width:60%;
        padding:10px;
        border-radius: 25px; 
        margin: 20px auto;
        background-color: #fff;
        text-align: center;
    }
 table {
        border-collapse: collapse;
        width: 100%;
    }
       
        
    th, td {
    text-align: left;
        padding: 8px;
    }

tr:nth-child(even){background-color: #fbf8fc}

th {
  background-color: #f3c1b8;
  color: white;
}
    </style>
</head>
    <body>
     
        
        <?php



echo "<div class='table'>"; 
     echo "<div class='heading'>";
        echo "<h1 class='display-4' style='font-size:2.6rem;'>ASSIGNMENTS SUBMISSION PORTAL</h1>";
         echo "</div>";
    echo "<hr>";
echo "<table>";
  echo "<tr>";
   echo "<th>"; 	echo "Submission"; 	echo "</th>";
	echo "<th>"; 	echo "Name";	echo "</th>"; 
    echo "<th>"; 	echo "Roll No."; 	echo "</th>";
    
 echo "</tr>";
        

if ($q->rowCount()>0) {
    while($row = $q->fetch(PDO::FETCH_ASSOC)) 
    {
        
        echo "<tr>";
        echo "<td>";echo $row['name'];echo "  "; echo "</td>";
        echo "<td>";echo $row['roll']; echo "  ";echo "</td>";
        echo "<td>"; 
       
     echo  "<a href='uploads/".$row['sfile']."'  target='_blank'>Download file</a>";
              
       
        echo "</td>";
       echo "<br>";
        echo "</tr>";
        
            
    }
    echo "</table>";
      
} else {
    echo "0 results";
}

?>
    </body>

</html>