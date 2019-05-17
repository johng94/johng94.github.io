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

$empFName = mysqli_real_escape_string($conn, $_POST['Emp_F_Name']);

/*$old = $_POST['old'];*/
$empLName = mysqli_real_escape_string($conn, $_POST['Emp_L_Name']);
$empNum   = mysqli_real_escape_string($conn, $_POST['Emp_#']);
$empAddr  = mysqli_real_escape_string($conn, $_POST['Emp_Address']);
$empRole  = mysqli_real_escape_string($conn, $_POST['Emp_Position']);
$empPass =  'welcome';
$period  = '.';
$empUser =  $empFName.$period.$empLName;
echo $empUser;




$query = "INSERT INTO employee (password, employee_fname, employee_lname, username, employee_role) VALUES (?,?,?,?,?)";


$stmt = $conn->prepare($query);
$stmt->bind_param('sssss', $empPass, $empFName, $empLName, $empUser, $empRole);
$stmt->execute();

//displayed if data is not submitted

if ($stmt->affected_rows >0) {
    echo " <p> User Created or Updated/Deleted </p>";
    }else {
      echo " <p> User did not Create or Update </p>";
      }
 /*
if(!$stmt){
	die('Could not enter data due to error: ' . mysqli_connect_error());
} */


$conn->close();
/*mysqli_close($conn);*/


?>