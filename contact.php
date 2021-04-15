<?php



$firstname  = filter_input(INPUT_POST,'firstname');
$lastname   = filter_input(INPUT_POST,'lastname');
$city       = filter_input(INPUT_POST,'city');
$subject    = filter_input(INPUT_POST,'subject');

if (!empty($username)) {
	if (!empty($lastname)) {
		if (!empty($city)) {
			if (!empty($subject)) {
				$host = "localhost"
				$dbusername = "root"
				$dbpassword = ""
				$dbname = "db_connect"
				
				
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if (mysqli_connect_error()) {
					die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
				}
				else{
					$sql = "INSERT INTO tbl_connect (firstname, lastname, city, subject)
					values ("$firstname", "$lastname", "$city", "$subject") ";
					if ($conn -> query($sql)) {

						echo "Thank you for contacting us will get back to you as soon as possible";
					}
					else{
						echo "Error:".$sql.<br>.$conn->error;	;
					}
					$conn -> close();
				}


			}
			else{
				echo "Please Write your Query in Subject Field";
				die();
			}
			
		}
		else{
			echo "Select a city";
			die();
		}

	}
	else{
		echo "Lastname should be empty";
		die();
	}
	
}
else{
	echo "Firstname Should not be empty";
	die();
}


?>
