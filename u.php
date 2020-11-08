<?php
include_once("pdo.php");
session_start();
if(isset($_POST['btn-upload']))
{
    $file=rand(1000,100000)."-".$_FILES['docfile']['name'];
    $file_loc=$_FILES['docfile']['tmp_name'];
    $file_type=$_FILES['docfile']['type'];
    $folder="uploads/";
    
    if($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")
    {
        if(file_exists($folder.$file))
        {
            echo "File already exists...";
        }
        else{
    
            
            
            
  
           
            $q=$pdo->prepare("select * from submit where aid=:a and roll=:r");
 $q->execute(array(':a'=>$_GET['aid'],':r'=>$_SESSION['roll']));
            
    
            if($q->fetch(PDO::FETCH_ASSOC))
            {
                
                $_SESSION['error']="File is already uploaded";
                header ("Location:upload.php?sid=".$_GET['sid']);
                }
            else{
            if($_FILES['docfile']['error']==0)
            
            {
      move_uploaded_file($file_loc,$folder.$file) or die("ERRORS!");
                $query=$pdo->prepare("insert into submit values (:a,:b,:c,:d,:e,:f)");
       
                $query->execute(array(':a'=>$_GET['aid'],':b'=>$_GET['tid'],':c'=>$_GET['sid'],':d'=>$_SESSION['name'],':e'=>$_SESSION['roll'],':f'=>$file));
                $_SESSION['success']="Uploaded Successfully";
           header ("Location:upload.php?sid=".$_GET['sid']);
            

            }}
            
            
            
            
        }}
    else
    {
        echo "Error occured while uploading file:".$_FILES['docfile']['name']."</br>";
        echo "Extension should be docx!"."</br>";
        echo "Error code:".$_FILES['docfile']['error'];
        
    }
}
?>