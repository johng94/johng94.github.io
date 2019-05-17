<?php
/*
/*this file works in tandem with
Gen_Emp_Update.html
Change the <form> tag of the html page put
<form action='POM_Report.php' method = "post"> */

/*include("config.php");*/
session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Generico";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);




$sql = "SELECT purchase_order_number, purchase_order.supplier_id, supplier_name,purchase_order.material_id,
material_description, item_quantity
FROM purchase_order, supplier, material_master
 WHERE purchase_order.material_id = material_master.material_id
 AND purchase_order.supplier_id = supplier.supplier_id ";





$result = $conn->query($sql);

//displayed if data is not submitted

if ($result->num_rows >0) {
    while($row = $result->fetch_assoc()) {
    echo "PO: " . $row["purchase_order_number"]. " - Supplier ID " . $row["supplier_id"]. "  " .
                  $row["supplier_name"]. " -Item Desc " . $row["material_description"]. " - Qty " .
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