<?php
/*
/*this file works in tandem with
Gen_OM.html
Change the <form> tag of the html page put
<form action='OM_add.php' method = "post"> */
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


$orderNum = mysqli_real_escape_string($conn, $_POST['Purchase_Order_#']);
$supplierNum   = mysqli_real_escape_string($conn, $_POST['Supplier_#']);
$quantity  = mysqli_real_escape_string($conn, $_POST['Quantity']);
$item      = mysqli_real_escape_string($conn, $_POST['Item_Number']);
$line      = 1;



$query = "INSERT INTO purchase_order(supplier_id, material_id, item_quantity, purchase_order_line) VALUES (?,?,?,?)";



$stmt = $conn->prepare($query);
$stmt->bind_param('ssss', $supplierNum, $item, $quantity, $line);
$stmt->execute();

//displayed if data is not submitted

if ($stmt->affected_rows >0) {
    echo " <p> PO Created </p>";
    }else {
      echo " <p> PO did not Create </p>";
      }
 /*
if(!$stmt){
	die('Could not enter data due to error: ' . mysqli_connect_error());
} */


$conn->close();
/*mysqli_close($conn);*/


?>