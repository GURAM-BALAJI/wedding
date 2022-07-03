
<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$address_map = $_POST['map'];
		$website = $_POST['website'];
		$by=$admin['admin_id'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM photographer WHERE photographer_name=:name AND photographer_deleted='0'");
		$stmt->execute(['name' => $name]);
		$row = $stmt->fetch();

		if ($row['numrows'] > 0) {
			$_SESSION['error'] = 'photographer already exist';
		} else {
			try {
				date_default_timezone_set('Asia/Kolkata');
				$filename = $_FILES['banner']['name'];
				if (!empty($filename)) {
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					$filename = date('Y-m-d') . '_' . time() . '.' . $ext;
					move_uploaded_file($_FILES['banner']['tmp_name'], '../../photographer_posters/' . $filename);
				}
				$today = date('d-m-Y h:i:s a');
				$stmt = $conn->prepare("INSERT INTO photographer (photographer_name,photographer_banner,photographer_email,photographer_phone,photographer_address,photographer_address_map,photographer_website,photographer_updated_date,photographer_created_date,photographer_added_by) VALUES (:photographer_name,:photographer_banner,:photographer_email,:photographer_phone,:photographer_address,:photographer_address_map,:photographer_website,:photographer_updated_date,:photographer_created_date,:photographer_added_by)");
				$stmt->execute(['photographer_name' => $name, 'photographer_banner' => $filename, 'photographer_email' => $email, 'photographer_phone' => $phone, 'photographer_address' => $address, 'photographer_address_map' => $address_map, 'photographer_website' => $website, 'photographer_updated_date' => $today, 'photographer_created_date' => $today,'photographer_added_by'=>$by]);
				$_SESSION['success'] = 'photographer added successfully';
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up photographer form first';
	}
}

header('location: photographer.php');

?>