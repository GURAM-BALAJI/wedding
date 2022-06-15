<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['ese_user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE user_id=:id");
			$stmt->execute(['id'=>$_SESSION['ese_id']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}
		$pdo->close();
	}
?>