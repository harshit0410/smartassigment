<?php

include_once("pdo.php");
session_start();
if ( isset($_POST['tid']) && 
       isset($_POST['sid']) && isset($_POST['sname']) ) 
	{
	$tid= $_POST['tid'];
	$sid= $_POST['sid'];
	$sname= $_POST['sname'];
	$descrip = $_POST['descrip'];
	$afile = $_FILES['afile']['name'];
 
		
	$target = "assignment/".$afile;




  	if (move_uploaded_file($_FILES['afile']['tmp_name'], $target)) {
        
         $query=$pdo->prepare("insert into assignment (tid,sid,sname,description,afile) values (:a,:b,:c,:d,:e)");
       
                $query->execute(array(':a'=>$tid,':b'=>$sid,':c'=>$sname,':d'=>$descrip,':e'=>$afile));
                $_SESSION['success']="Uploaded Successfully"; 
        
  		$_SESSION['success'] = "Assignment uploaded successfully";
        header ("Location:redirect.php");
  	}
        else{
  		$_SESSION['error'] = "Failed to upload";
        header ("Location:redirect.php");
  	}
        
  }

?>