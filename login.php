
<?php
session_start();
if(isset($_POST['loggedin'])){
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$id='';

	if(!empty($Email)||!empty($Password)){


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
			// $SELECT ="SELECT Email FROM signup WHERE Email= ? LIMIT 1";
			$SELECT="SELECT * from signup WHERE Email='".$Email."' AND Password='".$Password."' limit 1";

			//prepare statement for selecr query
			$stmt =$conn->prepare($SELECT);
			// $stmt->bind_param("s",$Email);
			$stmt->execute();
			$stmt->store_result();
			$rnum=$stmt->num_rows;

			if($rnum==1){
				$_SESSION['Email']=$Email;
				$sql = "SELECT id FROM signup WHERE Email = '".$Email."'";
				$result = mysqli_query($conn,$sql);
				$rs = mysqli_fetch_array($result);

				$id = $rs['id'];	
				// $statement = $connect->prepare($query);
				// $statement->execute();
				// $result = $statement->fetchAll();
				// $output = '';
				// foreach($result as $row)
				// 	{
						$_SESSION['id']=$id;
						echo $id;
									$INSERT = "UPDATE  id SET ID='".$id."'";

			//prepare statement for selecr query
									$stmt=$conn->prepare($INSERT);
									// $stmt->bind_param("ii",$id,$id);
									//$stmt->execute();
						// $sql1 = "INSERT into id VALUES ID='".$id."' sn='".$id."'";
						// // $stmt=$conn->prepare($sql1);
						// // $stmt->execute();
						// $result=mysqli_query($conn,$sql1) or die("BAD CREATE:$sql1");

						// if (mysqli_query($conn,$sql1) === TRUE) {
						//     echo "Record updated successfully";
						// } else {
						//     echo "Error updating record: " . $conn->error;
						// }

				//	}
				//$id = "SELECT id FROM signup WHERE Email = '".$Email."'";
				//$result = mysqli_fetch_array($id);
				// $id = "SELECT id from signup WHERE Email='".$Email."'";
				// $stmt=$conn->prepare($id);
				// $stmt->execute();
				// $stmt->store_result();
				// $rnum=$stmt->num_rows;
				//echo $result['id'];	
				//$_SESSION['id']=$id;
				header("location:loggedin/cryptify.html");

				echo $Email;
				
				
			}else{
				echo "incorrect email or password";
			}
			$conn->close();

			}




	}else{
			echo "All fields are required";
	}
}/*else{
		echo"off";
}
*/
?>