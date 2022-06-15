<?php
	include '../includes/session.php';
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