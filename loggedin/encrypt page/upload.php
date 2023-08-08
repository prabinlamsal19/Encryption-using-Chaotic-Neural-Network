<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demos";
$conn = mysqli_connect($servername, $username, $password, $dbname);

header('Content-Type: application/jason');

$allowed =['rtf','jpg', 'txt', 'zip', 'pdf', 'doc', 'docx'];
$processed =[];

foreach ($_FILES['files']['name'] as $key => $name) {
	if($_FILES['files']['error'][$key] ===0){

		$temp = $_FILES['files']['tmp_name'][$key];

		$ext = explode('.', $name);
		$ext = strtolower(end($ext));

		$file = uniqid('', true) . time() . '.' . $ext;	

		if(in_array($ext, $allowed) && move_uploaded_file($temp, 'uploads/' . $file)




	){
			$processed[] = array(
				'name' => $name,
				'file' => $file,
				'uploaded' => true
			);
		} else{
			$processed[] = array(
				'name' => $name,
				'uploaded' => false
			);
		}
	}
}
$mysql_insert = "INSERT INTO uploads (file_name, upload_time)VALUES('".$file."','".date("Y-m-d H:i:s")."')";
		
		mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));

echo json_encode($processed);


