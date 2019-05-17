<?php
/*
/*this file works in tandem with
Gen_Emp_Update.html
Change the <form> tag of the html page put
<form action='OM_Report.php' method = "post"> */

/*include("config.php");*/
session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Generico";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);




$sql = "SELECT sales_order_number , customer_fname, customer_lname, sales_order.customer_id,
 sales_order.material_id, material_description, item_quantity
FROM `sales_order`, `customer`, `material_master`
WHERE sales_order.material_id = material_master.material_id
AND sales_order.customer_id = customer.customer_id ";





$result = $conn->query($sql);

//displayed if data is not submitted

if ($result->num_rows >0) {
    while($row = $result->fetch_assoc()) {
    echo "PO: " . $row["sales_order_number"]. " - Customer ID " . $row["customer_id"]. "  " .
                  $row["customer_fname"]. " " . $row["customer_lname"]. " -Item Desc " . $row["material_description"]. " - Qty " .
                  $row["item_quantity"]. "<br>";
}
}else {
echo "0 results" ;
      }
 /*
if(!$stmt){
	die('Could not enter data due to error: ' . mysqli_connect_error());
} */


$conn->close();
/*mysqli_close($conn);*/


?>