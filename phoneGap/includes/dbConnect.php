<?php
//establish a connection, select the database, and set encoding

//Set database access information
DEFINE ('DB_HOST', 'mysql.cis230stagingarea.jtartt.com');
DEFINE ('DB_USER', 'jlslickt78');
DEFINE ('DB_PASSWORD', 'jailynn07292011');
DEFINE ('DB_NAME', 'dbcis2173');

//Make the connection
global $dbc;
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Set encoding..
mysqli_set_charset($dbc, "utf8");

if ($dbc->error) {
	die("Unable to connect to database!: $dbc->error");
}
session_start();
?>