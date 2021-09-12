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
echo "Connection to database was successful!<br/>";

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

// extract count value from query result
while($row = mysqli_fetch_array($result)) {
  $current_count = $row[0];
}

// increment current count
$current_count++;

// update connection count record with updated count value
mysqli_query($db_connection, "UPDATE mysql.CONN_COUNT SET COUNT=$current_count where ID=1");

// query connection count and get updated value from db
$result = mysqli_query($db_connection, "SELECT COUNT FROM mysql.CONN_COUNT where ID=1");

// extract count value from query result
while($row = mysqli_fetch_array($result)) {
  $current_count = $row[0];
}

// print out connection count info
echo "Total lifetime db connections established: $current_count";

// close database connection
mysqli_close($db_connection);
?>

