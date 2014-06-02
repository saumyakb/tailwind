<?php
session_start();
$_SESSION['loggedin']=FALSE;

	$username = 'root';
	$password = 'root';
	
	
	//connection to the database
	try {
    $conn = new PDO('mysql:host=localhost;dbname=secure_login', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
    $data = $conn->query('SELECT * FROM members');
 
    foreach($data as $row) {
        if($_POST["uname"] == $row[1] && $_POST["pword"] ==$row[2]){
			$login = TRUE;
			break;
		}
		else { $login = FALSE;}
    }
	if ($login) {
		$_SESSION['loggedin']=TRUE;
		print "Logged In";
		header('location:page2.php');
	}
	else {
		$_SESSION['loggedin']= FALSE;
		header("Location: index.php");
		echo "Incorrect username or password. Try again.";
		
	}
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

	?>