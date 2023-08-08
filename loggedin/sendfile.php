<?php
include 'mutual.php';
if(isset($_POST['addfilebutton'])){
  $Email=$_SESSION['Email'];
    $Text=$_POST['Text'];
    $Username=$_POST['Email'];
    if(!empty($Text)||!empty($Username)){


		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

		}else{
			//decleration of dbname....
			$host="localhost";
			$db_user="root";
			$db_pass="";
			$db_name="demos";
	//connection creation


			$conn = new mysqli($host,$db_user,$db_pass,$db_name);
			$SELECT ="SELECT Email FROM ".$Username." WHERE Email= ? LIMIT 1";
			$INSERT = "INSERT INTO ".$Username."files (Filename,Sentby) VALUES (?,?)";

			//prepare statement for selecr query
			$stmt =$conn->prepare($SELECT);
			$stmt->bind_param("s",$Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;

			// $SELECT1 ="SELECT Email FROM ".$query." WHERE Email= ? LIMIT 1";

			// //prepare statement for selecr query
			// $stmt1 =$conn->prepare($SELECT1);
			// $stmt1->bind_param("s",$Email);
			// $stmt1->execute();
			// $stmt1->bind_result($Email);
			// $stmt1->store_result();
			// $rnum1=$stmt1->num_rows;

			if($rnum > 0){
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("ss",$Text,$Email);
				$stmt->execute();

				
			}else{
				echo "Someone already registered using this email";
			}
			$stmt->close();
			$conn->close();

			}




	}else{
			echo "All fields are required";
	}
}else{
		echo"off";
}

?>