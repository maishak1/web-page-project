<?php
//see https://www.w3schools.com/php/func_mysqli_connect.asp
//see https://www.cloudways.com/blog/connect-mysql-with-php/
$dbhost = 'localhost'; //this is the hostname of the database server, in this case it is localhost because the database is running on the same machine as the PHP code
$dbuser = 'your_actual_username'; //this is the username of the database user, you should replace it with your own database username
$dbpass = 'your_actual_password'; //this is the password of the database user, you should replace it with your own database password
$dbname = 'your_database'; //this is the name of the database you want to connect to, you should replace it with your own database name
//create a DB connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if the DB connection fails, display an error message and exit
if (!$conn)
{
die('Could not connect: ' . mysqli_error($conn));
}
//select the database
mysqli_select_db($conn, $dbname);
?>
