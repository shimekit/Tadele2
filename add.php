<?php 
define("HOST","localhost");
define("USER","root");
define("PWD", "")
define("DB_NAME","sampl_db");
$con = new mysqli(HOST, USER, PWD, DB_NAME);
if($con->connect_errno)
{
    echo "connection failed: " . $con->connect_error;
    exit();

}

$uname=$con->real_escape_string($_POST['un']);
$passwd =$con->real_escape_string($_POST['pdw']);
$query="INSERT INTO users(usernam, password) VALUES($uname,$passwd)";
$result=$con->query($query);
if(!$result)
{
    $err=1;
}
$con->close();
if(isset($err))
{
    header("location: insert.php?err=1");
}
else{
    header("location:insert.php");
}

?>