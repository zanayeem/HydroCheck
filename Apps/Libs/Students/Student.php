<?php  
	namespace Apps\Libs\Students;
	use Apps\Libs\Database\Database;

	class Student extends Database {
		


		// Add new student 
		public function addStudents($sname, $roll, $reg, $board, $ins, $sphotot, $u_pic_name ){
			$sql ="INSERT INTO students_info (name, roll, reg, board, institute, photo) VALUES ('$sname','$roll','$reg','$board','$ins','$u_pic_name')";
			$data = parent::connection() -> query($sql);

			move_uploaded_file( $sphotot ,  'assets/profile_photos/students/' . $u_pic_name );

			if( $data ){
				return "<p class='alert alert-success'>Students add successfull !<button class='close' data-dismiss='alert'>&times;</button></p>";;
			}
		}
		
	}








?>