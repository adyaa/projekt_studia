<?php
//sluzy do polaczenia sie z baza danych
$con = mysqli_connect("localhost","dbusername","dbpass","dbname");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
echo "";
}
?>
