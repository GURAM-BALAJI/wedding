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
			$stmt = $conn->prepare("UPDATE invitation SET invitation_name=:invitation_name,invitation_email=:invitation_email,invitation_phone=:invitation_phone,invitation_address=:invitation_address,invitation_address_map=:invitation_address_map,invitation_website=:invitation_website,invitation_updated_date=:invitation_updated_date WHERE invitation_id=:id");
			$stmt->execute(['invitation_name' => $name, 'invitation_email' => $email, 'invitation_phone' => $phone, 'invitation_address' => $address, 'invitation_address_map' => $address_map, 'invitation_website' => $website, 'invitation_updated_date' => $today, 'id' => $id]);
			$_SESSION['success'] = 'invitation updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up edit invitation form first';
	}
}

header('location: invitation.php');
