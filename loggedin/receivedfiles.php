<!DOCTYPE html>
<html>
<head>
  <title>Cryptify</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="share.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="app.js"></script>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="cryptify.html" class="active">Home</a>
  <a href="#news">Mutual</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
    <a href="logout.php">Log Out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="search-container">
  <form action="addmutual.php" method="POST">
  <input type="text" name="query"/>
   <button><input type="submit" name="addbutton" value="Add" /></button>
  </form>
 </div>
 <p>Received Files are</p>
 <?php
  session_start();
  $Email=$_SESSION['Email'];
  $connect = new PDO('mysql:host=localhost;dbname=demos', 'root', '');
// Check connection
    // if ($connect->connect_error) {
    // die("Connection failed: " . $connect->connect_error);
    // }
$query = "
SELECT * FROM ".$Email."files";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $color = '';
 $output .= '
 </ul>
 <p style="color:rgb(226, 226, 226);margin-left:400px;"> <h4> Filename</h4> '.$row["Filename"].' <h4> Sent By</h4> '.$row["Sentby"].'</p>

 ';
}
echo $output;



?>



