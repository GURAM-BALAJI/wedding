<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$remark = $_POST['remark'];
		try {
			date_default_timezone_set('Asia/Kolkata');
			$today = date('d-m-Y h:i:s a');
			$stmt = $conn->prepare("UPDATE call_logs SET call_logs_name=:call_logs_name,call_logs_phone=:call_logs_phone,call_logs_remark=:call_logs_remark,call_logs_updated_date=:call_logs_updated_date WHERE call_logs_id=:id");
			$stmt->execute(['call_logs_name' => $name, 'call_logs_phone' => $phone, 'call_logs_remark' => $remark, 'call_logs_updated_date' => $today, 'id' => $id]);
			$_SESSION['success'] = 'Call logs updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up edit call logs form first';
	}
}

header('location: call_logs.php');
