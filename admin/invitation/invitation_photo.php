<?php
	include '../includes/session.php';
	include '../includes/req_start.php';
	if($req_per==1){
	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$name = $_POST['image_name'];
		$filename = $_FILES['image']['name'];
		$conn = $pdo->open();
		if(!empty($filename)){
			$stmt = $conn->prepare("SELECT $name FROM invitation WHERE invitation_id=:id");
			$stmt->execute(['id' => $id]);
			foreach ($stmt as $row)
				unlink('../../images/' . $row[$name]);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $filename=date('Y-m-d').'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['image']['tmp_name'], '../../images/'.$filename);

		}
		
		try{
			$stmt = $conn->prepare("UPDATE invitation SET $name=:photo WHERE invitation_id=:id");
			$stmt->execute(['photo'=>$filename, 'id'=>$id]);
			$_SESSION['success'] = 'invitation '.$name.' image updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select invitation to update image first';
	}
}

	header('location: invitation_full_image_view.php?id='.$id);
?>