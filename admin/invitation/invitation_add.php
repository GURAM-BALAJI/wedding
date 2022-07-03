
<?php
include '../includes/session.php';
include '../includes/req_start.php';
if ($req_per == 1) {
	if (isset($_POST['add'])) {
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
		$invitation_search_name=strtoupper($name1).'_AND_'.strtoupper($name2);
		$by=$admin['admin_id'];
		$conn = $pdo->open();

		try {
			date_default_timezone_set('Asia/Kolkata');

			$single_image1 = $_FILES['single_image1']['name'];
			if (!empty($single_image1)) {
				$ext = pathinfo($single_image1, PATHINFO_EXTENSION);
				$single_image1 = date('Y-m-d') . '_1' . time() . '.' . $ext;
				move_uploaded_file($_FILES['single_image1']['tmp_name'], '../../images/' . $single_image1);
			}

			$single_image2 = $_FILES['single_image2']['name'];
			if (!empty($single_image2)) {
				$ext = pathinfo($single_image2, PATHINFO_EXTENSION);
				$single_image2 = date('Y-m-d') . '_2' . time() . '.' . $ext;
				move_uploaded_file($_FILES['single_image2']['tmp_name'], '../../images/' . $single_image2);
			}

			$square_image1 = $_FILES['square_image1']['name'];
			if (!empty($square_image1)) {
				$ext = pathinfo($square_image1, PATHINFO_EXTENSION);
				$square_image1 = date('Y-m-d') . 'sq_1' . time() . '.' . $ext;
				move_uploaded_file($_FILES['square_image1']['tmp_name'], '../../images/' . $square_image1);
			}
			$square_image2 = $_FILES['square_image2']['name'];
			if (!empty($square_image2)) {
				$ext = pathinfo($square_image2, PATHINFO_EXTENSION);
				$square_image2 = date('Y-m-d') . 'sq_2' . time() . '.' . $ext;
				move_uploaded_file($_FILES['square_image2']['tmp_name'], '../../images/' . $square_image2);
			}
			$square_image3 = $_FILES['square_image3']['name'];
			if (!empty($square_image3)) {
				$ext = pathinfo($square_image3, PATHINFO_EXTENSION);
				$square_image3 = date('Y-m-d') . 'sq_3' . time() . '.' . $ext;
				move_uploaded_file($_FILES['square_image3']['tmp_name'], '../../images/' . $square_image3);
			}

			$long_image1 = $_FILES['long_image1']['name'];
			if (!empty($long_image1)) {
				$ext = pathinfo($long_image1, PATHINFO_EXTENSION);
				$long_image1 = date('Y-m-d') . 'long_1' . time() . '.' . $ext;
				move_uploaded_file($_FILES['long_image1']['tmp_name'], '../../images/' . $long_image1);
			}
			$long_image2 = $_FILES['long_image2']['name'];
			if (!empty($long_image2)) {
				$ext = pathinfo($long_image2, PATHINFO_EXTENSION);
				$long_image2 = date('Y-m-d') . 'long_2' . time() . '.' . $ext;
				move_uploaded_file($_FILES['long_image2']['tmp_name'], '../../images/' . $long_image2);
			}
			$full_image1 = $_FILES['full_image1']['name'];
			if (!empty($full_image1)) {
				$ext = pathinfo($full_image1, PATHINFO_EXTENSION);
				$full_image1 = date('Y-m-d') . 'full_3' . time() . '.' . $ext;
				move_uploaded_file($_FILES['full_image1']['tmp_name'], '../../images/' . $full_image1);
			}


			$today = date('d-m-Y h:i:s a');
			$stmt = $conn->prepare("INSERT INTO invitation (invitation_search_name,invitation_photographer_id,invitation_name1,invitation_name2,invitation_name1_profession,invitation_name2_profession,invitation_name1_social_media1_type,invitation_name2_social_media1_type,invitation_name1_social_media1,invitation_name2_social_media1,invitation_name1_social_media2_type,invitation_name2_social_media2_type,invitation_name1_social_media2,invitation_name2_social_media2,invitation_single_image1,invitation_single_image2,invitation_date_time,invitation_youtube_link,invitation_sq_image1,invitation_sq_image2,invitation_sq_image3,invitation_long_image1,invitation_long_image2,invitation_full_image1,invitation_streaming_id,invitation_streaming_password,invitation_updated_date,invitation_created_date,invitation_added_by) VALUES (:invitation_search_name,:invitation_photographer_id,:invitation_name1,:invitation_name2,:invitation_name1_profession,:invitation_name2_profession,:invitation_name1_social_media1_type,:invitation_name2_social_media1_type,:invitation_name1_social_media1,:invitation_name2_social_media1,:invitation_name1_social_media2_type,:invitation_name2_social_media2_type,:invitation_name1_social_media2,:invitation_name2_social_media2,:invitation_single_image1,:invitation_single_image2,:invitation_date_time,:invitation_youtube_link,:invitation_sq_image1,:invitation_sq_image2,:invitation_sq_image3,:invitation_long_image1,:invitation_long_image2,:invitation_full_image1,:invitation_streaming_id,:invitation_streaming_password,:invitation_updated_date,:invitation_created_date,:invitation_added_by)");
			$stmt->execute(['invitation_search_name'=>$invitation_search_name,'invitation_photographer_id'=>$photographer_id,'invitation_name1'=>$name1,'invitation_name2'=>$name2,'invitation_name1_profession'=>$name1_profession,'invitation_name2_profession'=>$name2_profession,'invitation_name1_social_media1_type'=>$name1_social_media_1_Type,'invitation_name2_social_media1_type'=>$name2_social_media_1_Type,'invitation_name1_social_media1'=>$name1_social_media_1,'invitation_name2_social_media1'=>$name2_social_media_1,'invitation_name1_social_media2_type'=>$name1_social_media_2_Type,'invitation_name2_social_media2_type'=>$name2_social_media_2_Type,'invitation_name1_social_media2'=>$name1_social_media_2,'invitation_name2_social_media2'=>$name2_social_media_2, 'invitation_single_image1'=>$single_image1,'invitation_single_image2'=>$single_image2,'invitation_date_time'=>$date.'_'.$time,'invitation_youtube_link'=>$youtube,'invitation_sq_image1'=>$square_image1,'invitation_sq_image2'=>$square_image2,'invitation_sq_image3'=>$square_image3,'invitation_long_image1'=>$long_image1,'invitation_long_image2'=>$long_image2,'invitation_full_image1'=>$full_image1,'invitation_streaming_id'=>$streaming_code,'invitation_streaming_password'=>$streaming_password,'invitation_updated_date'=>$today,'invitation_created_date'=>$today,'invitation_added_by'=>$by]);

			$_SESSION['success'] = 'Invitation added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Fill up invitation form first';
	}
}

header('location: invitation.php');

?>