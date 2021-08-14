<?php
$hostname = "localhost";
$user = "db_user";
$pass = "db_pass";

$db_connection = mysqli_connect($hostname, $user, $pass);

if (!$db_connection)
{
  die("Connection to database failed." . mysqli_connect_error());
}
echo "Connection to database was successful!";
mysqli_close($db_connection);
?>

