<?php
	include '../includes/session.php';
	include '../includes/req_start.php';
	if($req_per==1){
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE photographer set photographer_deleted='1' WHERE photographer_id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'photographer deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select photographer to delete first';
	}
}

	header('location: photographer.php');
	
?>