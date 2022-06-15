<?php
	include '../includes/session.php';
	include '../includes/req_start.php';
	if($req_per==1){
	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $admin['admin_password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $admin['admin_photo'];
			}

			if($password == $admin['admin_password']){
				$password = $admin['admin_password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE admin SET admin_email=:email, admin_password=:password, admin_name=:name, admin_photo=:photo WHERE admin_id=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'photo'=>$filename, 'id'=>$admin['admin_id']]);

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}
}

	header('location: ../home/home.php');

?>