<?php
$con=mysqli_connect("localhost","root","","student");
$query="select email,password from student_info where rollno=".$_POST['rollno'].";";
$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);
$to=$row['email'];
$subject="Forgotten Password";
$txt="Your Password is:".$row['password'];
$header="From:dit_university@gmail.com";
$m=mail($to,$subject,$txt,$header);
echo $m;
echo "mail sent";
?>