<?php
/*
/*this file works in tandem with
Gen_Emp_Update.html
Change the <form> tag of the html page put
<form action='deleteEmp.php' method = "post"> */
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


$empFName = mysqli_real_escape_string($conn, $_POST['Emp_F_Name']);
$empLName = mysqli_real_escape_string($conn, $_POST['Emp_L_Name']);



/*
$sql = "UPDATE TABLE employee (employee_fname, employee_lname, employee_role) VALUES ('$empFName', '$empLName',  '$empRole')";
*/
/*
$sql = "INSERT INTO employee (employee_fname, employee_lname, employee_address, employee_role) VALUES ('$empFName', '$empLName', '$empNum', '$empAddr', '$empRole')";
*/
/*Commented out stuff*/

/*
$sql = "INSERT INTO employee ". "('employee_fname', 'employee_lname', 'employee_address', 'employee_role')".
" VALUES ('$empFName', '$empLName', '$empNum', '$empAddr', '$empRole';";
*/
//CURRENTLY is not inserting values to table
/*If time allows this will change to
INSERT...ON DUPLICATE KEY UPDATE for both
new and updated entries*/

//connects and submits the query to db
/*$mysql_query($conn, $sql);*/

/*$retval = $mysql_query($conn, $sql);
*/


$query = "DELETE FROM employee
   WHERE employee_lname = '$empLName'
   AND   employee_fname = '$empFName' ";

$stmt = $conn->prepare($query);
$stmt->execute();

//displayed if data is not submitted

if ($stmt->affected_rows >0) {
    echo " <p> User Updated/Deleted </p>";
    }else {
      echo " <p> User did not Update </p>";
      }
 /*
if(!$stmt){
	die('Could not enter data due to error: ' . mysqli_connect_error());
} */


$conn->close();
/*mysqli_close($conn);*/


?>