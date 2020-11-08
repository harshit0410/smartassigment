<?php
session_start();
include_once "pdo.php";
$salt = 'XyZzy12*_';
  // Pw is php123
// Check to see if we have some POST data, if we do process it
if ( isset($_POST['roll']) && isset($_POST['password']) ) {
    if ( strlen($_POST['roll']) < 1 || strlen($_POST['password']) < 1 ) {
        $_SESSION['error'] = "roll and password are required";
header("Location: index.php");
return;
    } else {
        $check = hash('md5', $salt.$_POST['password']);
        
        $stmt = $pdo->prepare('SELECT * FROM student_info where roll=:rn AND password=:pw');
$stmt->execute(array( ':rn' => $_POST['roll'], ':pw' => $check));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row !== false  ) 
            {
            // Redirect the browser to dashboard.php
     $_SESSION['name']=$row['name'];
     $_SESSION['roll']=$row['roll'];
     $_SESSION['sapid']=$row['sapid'];
     $_SESSION['sem']=$row['sem'];
            
            
             error_log("Login success ".$_POST['roll']);
            header("Location: dashboard.php");
            return;
            } 
        else {
            error_log("Login fail ".$_POST['roll']." $check");
          
            $_SESSION['error'] = "Incorrect password";
            header("Location: index.php");
            return;
            }
        }
       
    }

?>

