<?php
	include '../includes/session.php';
	include '../includes/req_start.php';
	if($req_per==1){
	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['banner']['name'];
		if(!empty($filename)){
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $filename=date('Y-m-d').'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['banner']['tmp_name'], '../../photographer_posters/'.$filename);	
		}
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE photographer SET photographer_banner=:photo WHERE photographer_id=:id");
			$stmt->execute(['photo'=>$filename, 'id'=>$id]);
			$_SESSION['success'] = 'photographer banner updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select photographer to update banner first';
	}
}

	header('location: photographer.php');
?>