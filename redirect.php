<?php
include_once("pdo.php");
session_start();
if(!isset($_SESSION['tid']))
   {
       $_SESSION['error']="Please log in to continue.";
       header('Location: facultylogin.php');
   }


	



?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
    
    body{
        background-color: #c7efcf;
    }
   #content{
   	width: 60%;
   	margin: 20px auto;
       background-color: #fff;
        border-radius: 25px;
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
  
    .third-column
    {
        width:60%;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 25px;
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
<div id="content">
    <form name="logoutForm" method="post" action="logout.php">
   <p><INPUT type="submit" value="Logout" name="logout" class="btn btn-primary" style="width:15%" ></p>
   </form>
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
 <form method="POST" action="assupload.php" enctype="multipart/form-data">
     <div class="form-group">
  	<div class="heading">
            
        <h1 class="display-4" style="font-size: 2.8rem;">Upload an Assignment</h1>
         </div>
         <hr>
      
		<input type="text" class='form-control' placeholder="Teacher Id" name="tid" >
		
         <br>
	
		<input type="text" class='form-control'  placeholder="Subject Id" name="sid">
		
		<br>
		
		<input type="text" class='form-control'  placeholder="Subject name" name="sname">
		
		
		<br>
		<span class="btn  btn-light btn-rounded ">

  	  <input type="file" name="afile"  >
         </span>
  	<br>
       
      <textarea 
      	id="text" 
      	cols="58" 
      	rows="4" 
      	name="descrip" 
      	placeholder="Description about the project" style="border-radius:12px; margin-top:8px;"></textarea>
  	
  	<br>
  		<button type="submit" class ="btn btn-success "  name="upload" style="width:30%; margin-top:8px;    ">POST</button>

     </div>
  </form>
</div>
<?php
    
$tid=$_SESSION['tid'];
$q=$pdo->prepare("select * from assignment where tid=:s");
$q->execute(array(':s'=>$_SESSION['tid']));
echo "<div class='table'>";
    echo "<div class='heading'>";
        echo "<h1 class='display-4' style='font-size: 2.8rem; '>Assignments till date</h1>";
         echo "</div>";
    echo "<hr>";
echo "<table>";
  echo "<tr>";
    echo "<th>"; 	echo "Assignment ID"; 	echo "</th>";
  echo "<th>";	echo " Subject ID";	echo " </th>";
	echo "<th>"; 	echo "Subject Name";	echo "</th>"; 
    echo "<th>"; 	echo "Description"; 	echo "</th>";
    echo "</tr>";
 //if($r->num_rows > 0)
 while($row=$q->fetch(PDO::FETCH_ASSOC))
 {
 echo "<tr>";
 echo "<td>";	echo $row['aid'];	echo " </td>";    
 echo "<td>";	echo $row['sid'];	echo " </td>";
echo "<td>"; 	echo $row['sname'];	echo "</td>"; 
	echo "<td>"; 	echo $row['description']; 	echo "</td>";
echo "</tr>";
}
echo "</table>";


echo "</div>";
?>


<?php
echo "<div class='third-column'>";
     echo "<div class='heading'>";
        echo "<h1 class='display-4' style='font-size: 2.8rem; '>Check Submissions</h1>";
         echo "</div>";
    echo "<hr>";
echo "<form action='downloadfile.php' method='POST'>";
    echo "<div class='form-group ' >";
echo "<input type='text' class='form-control' placeholder='Assignment ID' name='aid'>";
echo "<br>";
echo "<input type='text' class='form-control' placeholder='Subject ID' name='sid'>";
echo "<br> ";
echo "<input type='submit' onclick='location:href.downloadfile.php'  value='Check' class='btn btn-success' style='width: 30%;'>";
    echo "</div";
echo "</form>";
echo "</div>";

?>
</body>
</html>