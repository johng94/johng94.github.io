<?php
/*this file works in tandem with
Gen_Emp_Update.html
Change the <form> tag of the html page put
<form action='insertEmp.php' method = "post"> */
include("config.php");
session_start();
/*If db connection cannot be made
this will pop up first after 
form submission*/
if ($conn === false) {
	die("error: could not connect. " .mysqli_connect_error());
}

/*These variables take values
from html text boxes to post
to the database*/
$empFName = mysqli_real_escape_string($conn, $_POST['Emp_F_Name']);
$empLName = mysqli_real_escape_string($conn, $_POST['Emp_L_Name']);
$empNum   = mysqli_real_escape_string($conn, $_POST['Emp_#']);
$empAddr  = mysqli_real_escape_string($conn, $_POST['Emp_Address']);
$empRole  = mysqli_real_escape_string($conn, $_POST['Emp_Position']);

/*This is an sql query to insert
the values into the employee table*/
$sql = "INSERT INTO employee ". "('employee_fname', 'employee_lname', 'employee_address', 'employee_role')". " VALUES ('$empFName', '$empLName', '$empNum', '$empAddr', '$empRole';";
//CURRENTLY is not inserting values to table
/*If time allows this will change to
INSERT...ON DUPLICATE KEY UPDATE for both 
new and updated entries*/


//connects and submits the query to db
$retval = mysqli_query($conn, $sql);

//displayed if data is not submitted
if(!$retval){
	die('Could not enter data: ' . mysqli_connect_error());
}

echo "Entered data successfully";

mysqli_close($conn);
?>