
<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$remark = $_POST['remark'];
		$by=$admin['admin_id'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM call_logs WHERE call_logs_phone=:phone AND call_logs_deleted='0'");
		$stmt->execute(['phone' => $phone]);
		$row = $stmt->fetch();

		if ($row['numrows'] > 0) {
			$_SESSION['error'] = 'Phone number already exist';
		} else {
			try {
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y h:i:s a');
				$date = date('d-m-Y');
				$stmt = $conn->prepare("INSERT INTO call_logs (call_logs_name,call_logs_phone,call_logs_remark,call_logs_updated_date,call_logs_created_date,call_logs_date,call_logs_by) VALUES (:call_logs_name,:call_logs_phone,:call_logs_remark,:call_logs_updated_date,:call_logs_created_date,:call_logs_date,:call_logs_by)");
				$stmt->execute(['call_logs_name' => $name, 'call_logs_phone' => $phone, 'call_logs_remark' => $remark, 'call_logs_updated_date' => $today, 'call_logs_created_date' => $today, 'call_logs_date' => $date,'call_logs_by'=>$by]);
				$_SESSION['success'] = 'Call logs added successfully';
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up call logs form first';
	}
}

header('location: call_logs.php');

?>