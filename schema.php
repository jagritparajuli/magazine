<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$schema = new schema();
	$table = array(
		'users' => "
			CREATE TABLE IF NOT EXISTS users
			(
				id int not null AUTO_INCREMENT PRIMARY KEY,
				username varchar(50),
				email varchar(150) UNIQUE KEY,
				password varchar(200),
				session_token text,
				activate_token text,
				password_reset_token text,
				role enum('Admin','Staff') DEFAULT 'Staff',
				status enum('Active','Passive') DEFAULT 'Passive',
				added_by int,
				create_date datetime DEFAULT current_timestamp,
				updated_date datetime ON UPDATE current_timestamp
			)
		",
		'superuser' => "
			INSERT into users SET 
				username = 'Admin',
				email = 'admin@magazine.com',
				password = '".md5('admin@magazine.comadmin123')."',
				role = 'Admin',
				status = 'Active'
		"

	);

	foreach ($table as $key => $sql) {
		try{
			$success = $schema->create($sql);
			if ($success){
				echo "Query ".$key." Executed Successfully<br>";
			}
			else{
				echo "Error while executing query ".$key."<br>";
			}
		}catch(PDOException $e){
			error_log(Date("M d, Y h:i:s a").' : (run query) : '.$e->getMessage()."\r\n",3,ERROR_PATH.'error.log');
			return false;
		}
	}
 ?>