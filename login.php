<?php
	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Generico";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die('Could not connect to DB: '. mysqli_connect_error());
	}
	//echo "DB Connection Success";

	$myusername = mysqli_real_escape_string($conn, $_POST['Login']);
	$mypassword = mysqli_real_escape_string($conn, $_POST['Password']);

	$sql = "SELECT empNum FROM employee WHERE username = '$myusername' and password = '$mypassword'";
	$stmt = mysqli_query($conn, $sql);
	//$stmt->bind_param('s', $myusername, $mypassword);
	if (!$stmt) {
		die('Login Failed'. mysqli_connect_error());
		header("location: Gen_Login.html");
	}else{
		//if time allows make if statements to redirect
		//based on user level
		header("location: Gen_POM.html");
	}
	//if (mysqli_stmt_execute($stmt)) {
		//mysqli_stmt_store_result($stmt);

		//session_start();
		//$_SESSION['login_user'] = $myusername;
	//}else{
	//	$error = "Your Login Name or Password is invalid";
	//}

?>