<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$photographer_id = $_POST['photographer_id'];
		$name1 = $_POST['name1'];
		$name1_profession = $_POST['name1_profession'];
		$name1_social_media_1_Type = $_POST['name1_social_media_1_Type'];
		$name1_social_media_1 = $_POST['name1_social_media_1'];
		$name1_social_media_2_Type = $_POST['name1_social_media_2_Type'];
		$name1_social_media_2 = $_POST['name1_social_media_2'];
		$name2 = $_POST['name2'];
		$name2_profession = $_POST['name2_profession'];
		$name2_social_media_1_Type = $_POST['name2_social_media_1_Type'];
		$name2_social_media_1 = $_POST['name2_social_media_1'];
		$name2_social_media_2_Type = $_POST['name2_social_media_2_Type'];
		$name2_social_media_2 = $_POST['name2_social_media_2'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$youtube = $_POST['youtube'];
		$streaming_code = $_POST['streaming_code'];
		$streaming_password = $_POST['streaming_password'];
		$invitation_search_name = $_POST['invitation_search_name'];
		try {
			date_default_timezone_set('Asia/Kolkata');
			$today = date('d-m-Y h:i:s a');
			$stmt = $conn->prepare("UPDATE invitation SET
			invitation_photographer_id=:photographer_id,
			invitation_name1=:name1,
			invitation_name1_profession=:name1_profession,
			invitation_name1_social_media1_type=:name1_social_media_1_Type,
			invitation_name1_social_media1=:name1_social_media_1,
			invitation_name1_social_media2_type=:name1_social_media_2_Type,
			invitation_name1_social_media2=:name1_social_media_2,
			invitation_name2=:name2,
			invitation_name2_profession=:name2_profession,
			invitation_name2_social_media1_type=:name2_social_media_1_Type,
			invitation_name2_social_media1=:name2_social_media_1,
			invitation_name2_social_media2_type=:name2_social_media_2_Type,
			invitation_name2_social_media2=:name2_social_media_2,
			invitation_youtube_link=:youtube,
			invitation_date_time=:date_time,
			invitation_streaming_id=:streaming_code,
			invitation_streaming_password=:streaming_password,
			invitation_updated_date=:invitation_updated_date,
			invitation_search_name=:invitation_search_name WHERE invitation_id=:id");
			$stmt->execute([
				'photographer_id' => $photographer_id,
				'name1' => $name1,
				'name1_profession' => $name1_profession,
				'name1_social_media_1_Type' => $name1_social_media_1_Type,
				'name1_social_media_1' => $name1_social_media_1,
				'name1_social_media_2_Type' => $name1_social_media_2_Type,
				'name1_social_media_2' => $name1_social_media_2,
				'name2' => $name2,
				'name2_profession' => $name2_profession,
				'name2_social_media_1_Type' => $name2_social_media_1_Type,
				'name2_social_media_1' => $name2_social_media_1,
				'name2_social_media_2_Type' => $name2_social_media_2_Type,
				'name2_social_media_2' => $name2_social_media_2,
				'youtube' => $youtube,
				'date_time' => $date . '_' . $time,
				'streaming_code' => $streaming_code,
				'streaming_password' => $streaming_password,
				'invitation_updated_date' => $today,
				'invitation_search_name'=>$invitation_search_name,
				'id' => $id
			]);
			$_SESSION['success'] = 'Invitation updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up edit invitation form first';
	}
}

header('location: invitation.php');
