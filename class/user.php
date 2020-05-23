<?php 
	class user extends database{
		function __construct(){
			$this->table = 'users';
			database::__construct();
		}

		public function addUser($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getUserbyId($user_id,$is_die=false){
			$args = array(
				'fields' => "username, email,password",
				'where' => array(
						'or' => array(
							'id' => $user_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		public function getUserbyEmail($email,$is_die=false){
			$args = array(
				'fields' => "username, email,password",
				'where' => array(
						'or' => array(
							'email' => $email,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function updateUserByEmail($data,$email,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'email' => $email,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteUserByEmail($email,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'email' => $email,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
	}
 ?>