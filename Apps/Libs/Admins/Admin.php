<?php  
	namespace Apps\Libs\Admins;
	use Apps\Libs\Database\Database;


	class Admin extends Database {
		

		// Admin  Registration 
		public function addInfo($name, $uname, $email, $hash_pass) {
			$sql ="INSERT INTO admins (admin_name, admin_uname, admin_email, admin_password, admin_status) VALUES ('$name','$uname','$email','$hash_pass','inactive')";
			$data = parent::connection() -> query($sql);

			if( $data ){
				return true;
			}
		}


		// User name check 
		public function userNameCheck($uname){
			$sql ="SELECT * FROM admins WHERE admin_uname='$uname'";
			$data = parent::connection() -> query($sql);

			$username_count  = $data -> num_rows;

			if($username_count > 0){
				return false;
			}else{
				return true;
			}
		}

		// Email Check
		public function emailCheck($email){
			$sql ="SELECT * FROM admins WHERE admin_email='$email'";
			$data = parent::connection() -> query($sql);

			$useremail_count  = $data -> num_rows;

			if($useremail_count > 0){
				return false;
			}else{
				return true;
			}
		}


		// Admin Login 
		public function userLogin($uname_email, $pass){
			$sql ="SELECT * FROM admins WHERE admin_uname='$uname_email' OR admin_email='$uname_email' ";
			$data = parent::connection() -> query($sql);
			$login_user_data = $data -> fetch_assoc();
			$useremail_count  = $data -> num_rows;

			if($useremail_count == 1){
					
				if( password_verify(  $pass , $login_user_data['admin_password'] ) ){
					$_SESSION['user_id'] = $login_user_data['user_id'];
					$_SESSION['admin_name'] = $login_user_data['admin_name'];
					header("location:dashboard.php");
				}else{
					return "<p class='alert alert-danger'>Wrong Password  !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}

			}else{
				return "<p class='alert alert-danger'>Username or Email is incorrect  !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}





	}








?>