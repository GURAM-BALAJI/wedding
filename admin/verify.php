<?php
	include '../includes/session.php';
	use PHPMailer\PHPMailer\PHPMailer;
	$conn = $pdo->open();

	if(isset($_POST['login']))
    {	
		$email = $_POST['email'];
		$password = $_POST['password'];
        
		try{
            
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM admin WHERE admin_email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
            
			if($row['numrows'] > 0){
                
				if($row['admin_status']){
					if(password_verify($password, $row['admin_password'])){
						$ipaddress=$_SERVER['REMOTE_ADDR'];
						
						$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ipaddress));
						$place_of_user= 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
$place_of_user.='City Name: ' . $ipdat->geoplugin_city . "\n";
$place_of_user.='Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
$place_of_user.='Latitude: ' . $ipdat->geoplugin_latitude . "\n";
$place_of_user.='Longitude: ' . $ipdat->geoplugin_longitude . "\n";
$place_of_user.='Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
$place_of_user.='Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
$place_of_user.='Timezone: ' . $ipdat->geoplugin_timezone;
						$message = "<center><h1>Logined in to:</h1><h3>$email</h3><h1>Ip Address:</h1><h3>$ipaddress</h3><h4>$place_of_user</h4> </center>";
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
		 $mail = new PHPMailer();
		 	        //Server settings
					 $mail->isSMTP();
					 $mail->Host = "smtp.hostinger.com";
					 $mail->SMTPAuth = true;
					 $mail->Username = "support@streaminginvitation.com"; //enter you email address
					 $mail->Password = 'SI@7softsolution'; //enter you email password
					 $mail->Port = 587;
									 $mail->SMTPOptions = array(
										 'ssl' => array(
										 'verify_peer' => false,
										 'verify_peer_name' => false,
										 'allow_self_signed' => true
										 )
									 );                                                       
			 
									 $mail->setFrom('support@streaminginvitation.com',$name);
									 
									 //Recipients
									 $mail->addAddress('support@streaminginvitation.com');              
									
									 //Content
									 $mail->isHTML(true);                                            
									 $mail->Subject = 'Logined In';
									 $mail->Body = $message;
									 $mail->send();
                        $_SESSION['never_admin']='True';
						$_SESSION['never_id_admin'] = $row['admin_id'];
					}
                    else{
						$_SESSION['error'] = 'Incorrect details';
					}
				}
				else{
					$_SESSION['error'] = 'Incorrect details';
				}
			}
            else{
				$_SESSION['error'] = 'Incorrect details';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}
	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: index.php');

?>