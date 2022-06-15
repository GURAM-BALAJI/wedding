<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$address_map = $_POST['map'];
		$website = $_POST['website'];

		try {
			date_default_timezone_set('Asia/Kolkata');
			$today = date('d-m-Y h:i:s a');
			$stmt = $conn->prepare("UPDATE photographer SET photographer_name=:photographer_name,photographer_email=:photographer_email,photographer_phone=:photographer_phone,photographer_address=:photographer_address,photographer_address_map=:photographer_address_map,photographer_website=:photographer_website,photographer_updated_date=:photographer_updated_date WHERE photographer_id=:id");
			$stmt->execute(['photographer_name' => $name, 'photographer_email' => $email, 'photographer_phone' => $phone, 'photographer_address' => $address, 'photographer_address_map' => $address_map, 'photographer_website' => $website, 'photographer_updated_date' => $today, 'id' => $id]);
			$_SESSION['success'] = 'photographer updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up edit photographer form first';
	}
}

header('location: photographer.php');
