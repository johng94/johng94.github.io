<?php
/*
/*this file works in tandem with
Gen_Emp_Update.html
Change the <form> tag of the html page put
<form action='insertEmp.php' method = "post"> */
echo "beginning";
/*include("config.php");*/
session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Generico";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
	die('Could not connect to DB: ' . mysqli_connect_error());
}

echo "DB Connection Success... ";

echo "just a test";