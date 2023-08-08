<?php
include 'mutual.php';
if(isset($_POST['addbutton'])){
  $Email=$_SESSION['Email'];
    $query=$_POST['query'];
    if(!empty($query)){


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
			$SELECT ="SELECT Email FROM signup WHERE Email= ? LIMIT 1";
			$INSERT = "INSERT INTO ".$Email." (Email) VALUES (?)";

			//prepare statement for selecr query
			$stmt =$conn->prepare($SELECT);
			$stmt->bind_param("s",$Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;

			if($rnum==1){
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("s",$query);
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