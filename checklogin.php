
<?php
session_start();
include_once "pdo.php";
//$salt = 'XyZzy12*_';
  // Pw is php123
// Check to see if we have some POST data, if we do process it
if ( isset($_POST['tid']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['tid']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "tid and pass are required";
header("Location: index.php");
return;
    } else {
        //$check = hash('md5', $_POST['pass']);
        $check=$_POST['pass'];
        $stmt = $pdo->prepare('SELECT * FROM teacher where tid=:rn AND password=:pw');
$stmt->execute(array( ':rn' => $_POST['tid'], ':pw' => $check));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row !== false  ) 
            {
            // Redirect the browser to dashboard.php
     $_SESSION['name']=$row['name'];
     $_SESSION['tid']=$row['tid'];

            
            
             error_log("Login success ".$_POST['tid']);
            header("Location: redirect.php");
            return;
            }
        
        else {
            error_log("Login fail ".$_POST['tid']." $check");
          
            $_SESSION['error'] = "Incorrect password";
            header("Location: facultylogin.php");
            return;
            }
        }
       
    }

?>