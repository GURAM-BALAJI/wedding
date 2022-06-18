<?php
include '../includes/session.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM invitation WHERE invitation_id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	$invitation_photographer_id = "<select class='form-control' id='photographer_id' name='photographer_id' required>";
	$stmt1 = $conn->prepare("SELECT * FROM photographer WHERE photographer_deleted='0'");
	$stmt1->execute();
	foreach ($stmt1 as $row1) {
		$id = $row1['photographer_id'];
		$name = $row1['photographer_name'];
		$phone = $row1['photographer_phone'];
		if ($id == $row['invitation_photographer_id'])
			$invitation_photographer_id .= "<option value='$id' selected>$name ( $phone )</option>";
		else
			$invitation_photographer_id .= "<option value='$id'>$name ( $phone )</option>";
	}
	$invitation_photographer_id .= "</select>";

	$name1_sm1_t = $row['invitation_name1_social_media1_type'];
	$invitation_name1_social_media1_type = "<select name='name1_social_media_1_Type' class='form-control'>";
	if ($name1_sm1_t == 'facebook')
		$invitation_name1_social_media1_type .= "<option value='facebook' selected>FaceBook</option>";
	else
		$invitation_name1_social_media1_type .= "<option value='facebook'>FaceBook</option>";
	if ($name1_sm1_t == 'instagram')
		$invitation_name1_social_media1_type .= "<option value='instagram' selected>Instagram</option>";
	else
		$invitation_name1_social_media1_type .= "<option value='instagram'>Instagram</option>";
	if ($name1_sm1_t == 'twitter')
		$invitation_name1_social_media1_type .= "<option value='twitter' selected>Twitter</option>";
	else
		$invitation_name1_social_media1_type .= "<option value='twitter'>Twitter</option>";
	if ($name1_sm1_t == 'linkedin')
		$invitation_name1_social_media1_type .= "<option value='linkedin' selected>Linkedin</option>";
	else
		$invitation_name1_social_media1_type .= "<option value='linkedin'>Linkedin</option>";
	$invitation_name1_social_media1_type .= "</select>";

	$name1_sm2_t = $row['invitation_name1_social_media2_type'];
	$invitation_name1_social_media2_type = "<select name='name1_social_media_2_Type' class='form-control'>";
	if ($name1_sm2_t == 'facebook')
		$invitation_name1_social_media2_type .= "<option value='facebook' selected>FaceBook</option>";
	else
		$invitation_name1_social_media2_type .= "<option value='facebook'>FaceBook</option>";
	if ($name1_sm2_t == 'instagram')
		$invitation_name1_social_media2_type .= "<option value='instagram' selected>Instagram</option>";
	else
		$invitation_name1_social_media2_type .= "<option value='instagram'>Instagram</option>";
	if ($name1_sm2_t == 'twitter')
		$invitation_name1_social_media2_type .= "<option value='twitter' selected>Twitter</option>";
	else
		$invitation_name1_social_media2_type .= "<option value='twitter'>Twitter</option>";
	if ($name1_sm2_t == 'linkedin')
		$invitation_name1_social_media2_type .= "<option value='linkedin' selected>Linkedin</option>";
	else
		$invitation_name1_social_media2_type .= "<option value='linkedin'>Linkedin</option>";
	$invitation_name1_social_media2_type .= "</select>";

	$name2_sm1_t = $row['invitation_name2_social_media1_type'];
	$invitation_name2_social_media1_type = "<select name='name2_social_media_1_Type' class='form-control'>";
	if ($name2_sm1_t == 'facebook')
		$invitation_name2_social_media1_type .= "<option value='facebook' selected>FaceBook</option>";
	else
		$invitation_name2_social_media1_type .= "<option value='facebook'>FaceBook</option>";
	if ($name2_sm1_t == 'instagram')
		$invitation_name2_social_media1_type .= "<option value='instagram' selected>Instagram</option>";
	else
		$invitation_name2_social_media1_type .= "<option value='instagram'>Instagram</option>";
	if ($name2_sm1_t == 'twitter')
		$invitation_name2_social_media1_type .= "<option value='twitter' selected>Twitter</option>";
	else
		$invitation_name2_social_media1_type .= "<option value='twitter'>Twitter</option>";
	if ($name2_sm1_t == 'linkedin')
		$invitation_name2_social_media1_type .= "<option value='linkedin' selected>Linkedin</option>";
	else
		$invitation_name2_social_media1_type .= "<option value='linkedin'>Linkedin</option>";
	$invitation_name2_social_media1_type .= "</select>";

	$name2_sm2_t = $row['invitation_name2_social_media2_type'];
	$invitation_name2_social_media2_type = "<select name='name2_social_media_2_Type' class='form-control'>";
	if ($name2_sm2_t == 'facebook')
		$invitation_name2_social_media2_type .= "<option value='facebook' selected>FaceBook</option>";
	else
		$invitation_name2_social_media2_type .= "<option value='facebook'>FaceBook</option>";
	if ($name2_sm2_t == 'instagram')
		$invitation_name2_social_media2_type .= "<option value='instagram' selected>Instagram</option>";
	else
		$invitation_name2_social_media2_type .= "<option value='instagram'>Instagram</option>";
	if ($name2_sm2_t == 'twitter')
		$invitation_name2_social_media2_type .= "<option value='twitter' selected>Twitter</option>";
	else
		$invitation_name2_social_media2_type .= "<option value='twitter'>Twitter</option>";
	if ($name2_sm2_t == 'linkedin')
		$invitation_name2_social_media2_type .= "<option value='linkedin' selected>Linkedin</option>";
	else
		$invitation_name2_social_media2_type .= "<option value='linkedin'>Linkedin</option>";
	$invitation_name2_social_media2_type .= "</select>";
	$date_time = explode('_', $row['invitation_date_time']);
	$row = array(
		'invitation_id' => $row['invitation_id'],
		'invitation_photographer_id' => $invitation_photographer_id,
		'invitation_name1_social_media1_type' => $invitation_name1_social_media1_type,
		'invitation_name1_social_media2_type' => $invitation_name1_social_media2_type,
		'invitation_name2_social_media1_type' => $invitation_name2_social_media1_type,
		'invitation_name2_social_media2_type' => $invitation_name2_social_media2_type,
		'invitation_date' => $date_time[0],
		'invitation_time' => $date_time[1],
		'invitation_name1' => $row['invitation_name1'],
		'invitation_name1_profession' => $row['invitation_name1_profession'],
		'invitation_name1_social_media1' => $row['invitation_name1_social_media1'],
		'invitation_name1_social_media2' => $row['invitation_name1_social_media2'],
		'invitation_name2' => $row['invitation_name2'],
		'invitation_name2_profession' => $row['invitation_name2_profession'],
		'invitation_name2_social_media1' => $row['invitation_name2_social_media1'],
		'invitation_name2_social_media2' => $row['invitation_name2_social_media2'],
		'invitation_youtube_link' => $row['invitation_youtube_link'],
		'invitation_streaming_id' => $row['invitation_streaming_id'],
		'invitation_streaming_password' => $row['invitation_streaming_password'],
		'invitation_search_name' => $row['invitation_search_name'],
	);

	$pdo->close();

	echo json_encode($row);
}
