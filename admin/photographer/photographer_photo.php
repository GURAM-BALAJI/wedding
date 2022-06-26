<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['upload'])) {
		$id = $_POST['id'];
		$filename = $_FILES['banner']['name'];

		$conn = $pdo->open();
		if (!empty($filename)) {
			$stmt = $conn->prepare("SELECT photographer_banner FROM photographer WHERE photographer_id=:id");
			$stmt->execute(['id' => $id]);
			foreach ($stmt as $row)
				unlink('../../photographer_posters/' . $row['photographer_banner']);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$filename = date('Y-m-d') . '_' . time() . '.' . $ext;
			move_uploaded_file($_FILES['banner']['tmp_name'], '../../photographer_posters/' . $filename);
		}
		try {
			$stmt = $conn->prepare("UPDATE photographer SET photographer_banner=:photo WHERE photographer_id=:id");
			$stmt->execute(['photo' => $filename, 'id' => $id]);
			$_SESSION['success'] = 'photographer banner updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Select photographer to update banner first';
	}
}

header('location: photographer.php');
