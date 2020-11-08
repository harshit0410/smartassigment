<?php
include_once "pdo.php";

session_start();
$salt = 'XyZzy12*_';

if(isset($_POST['name']) &&isset($_POST['email']) && isset($_POST['sapid']) && isset($_POST['password']) && isset($_POST['sem']) && isset($_POST['roll'])){
    if(strlen($_POST['name'])<1 ||strlen($_POST['email'])<1 ||strlen($_POST['sapid'])<1 ||strlen($_POST['password'])<1 ||strlen($_POST['sem'])<1 ||strlen($_POST['roll'])<1 ){
        
        $_SESSION['error']="All field are required";
        header('Location: signUp.php');
    }
    else{
        
        $check = hash('md5', $salt.$_POST['password']);

$stmt=$pdo->prepare('INSERT INTO student_info (name,email,sapid,password,sem,roll) VALUES (:a,:b,:c,:d,:e,:f)');
try{
        $stmt->execute(array(':a' => $_POST['name'],
                    ':b' => $_POST['email'],
                    ':c' => $_POST['sapid'],
                    ':d' => $check,
                    ':e' => $_POST['sem'],
                    ':f' => $_POST['roll']));
            
    
                $_SESSION['success']="Sign Up successfully.";
            header('Location:index.php');
            
        }
        catch(PDOException $a ){
$_SESSION['error']="Already Registered";
            header('Location:signUp.php');
         }
        }
    }

?>