<?php
	include '../includes/session.php';
	include '../includes/req_start.php';
	if($req_per==1){
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$conn = $pdo->open();
		try{
			$stmt = $conn->prepare("UPDATE call_logs set call_logs_deleted='1' WHERE call_logs_id=:id");
			$stmt->execute(['id'=>$id]);
			$_SESSION['success'] = 'Call logs deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select call logs to delete first';
	}
}
	header('location: call_logs.php');
	
?>