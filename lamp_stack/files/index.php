<?php
$hostname = "localhost";
$user = "db_user";
$pass = "db_pass";

// check db connection
$db_connection = mysqli_connect($hostname, $user, $pass);

// if db connection fails
if (!$db_connection) {
  die("Connection to database failed." . mysqli_connect_error());
}

// db connection was successful
echo "Connection to database was successful!";

// check to see if connection count table exists
$table_check = mysqli_query($db_connection, "SELECT * FROM mysql.CONN_COUNT");

// if table check fails
if (!$table_check) {
  // create connection counter table
  mysqli_query($db_connection, "CREATE TABLE mysql.CONN_COUNT (ID INT, COUNT INT)");
  
  // insert first and only record into connection count table
  mysqli_query($db_connection, "INSERT INTO mysql.CONN_COUNT (ID, COUNT) VALUES (1, 0)");
}

// query connection count to get current value
$result = mysqli_query($db_connection, "SELECT COUNT FROM mysql.CONN_COUNT where ID=1");

// STOPPED HERE - need to figure out how to properly extract count value 
// then increment
// then update count in db
// then query again, extract, and print back to user

mysqli_close($db_connection);
?>

