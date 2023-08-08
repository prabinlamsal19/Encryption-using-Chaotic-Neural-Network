<?php  include 'download.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cryptify</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="global.css">
	  <link rel="stylesheet" type="text/css" href="../share.css">
</head>
<body>

	<div class="topnav" id="myTopnav">
  <a href="../cryptify.html" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	<div class="wrapper">
		<div class="upload-console">
			<h2 class="upload-console-header">Upload your file here to encrypt</h2>

			<div class="upload-console-body">
				<h3>Seclect one file at a time from your computer</h3>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="files[]" id="standard-upload-files" multiple>
			<input type="submit"  value="Upload files" id="standard-upload"> 
				</form>

				<h3>Or drag and drop file below</h3>
				<div class="upload-console-drop" id="drop-zone">
					Just drag your file here
				</div>
				<div class="bar">
					<div class="bar-fill" id="bar-fill">
						<div class="bar-fill-text" id="bar-fill-text">
						</div>
					</div>
				</div>
				<div  id="uploads-finished" class="hidden">
					<h3>Your file is now ready</h3>
					<BUTTON id=reloader ONCLICK="ShowAndHide()">Click me</BUTTON>
					<DIV ID="content" STYLE="display:none">
						<div id="row">
                					<?php
               
                					while($row = mysqli_fetch_array($result)) { ?>
                					<tr>
                
                    					<td><?php echo $row['file_name']; ?></td>

                    					<td><a href="uploads/<?php echo $row['file_name']; ?>" download>Download</a></td>
                					</tr>
                					<?php } ?>
                		</div>
                	</DIV>
				</div>
			</div>
		</div>
	</div>
	  <button id="shareButton" onclick="share(this)">
    <i class="fas fa-share-alt"></i>
    <i class="fas fa-times"></i>
    <div class="container">
      <div class="addthis_inline_share_toolbox"></div>
      
      <!--for old users of AddThis-->
      <div class="addthis_sharing_toolbox"></div>
    </div>
  </button>
  <script src="jquery.js"></script>
  <script>
    $("#reloader").click(function(){
      $("#row").load(" #row");
    });


function ShowAndHide() {
    var x = document.getElementById('content');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>


	
	<script src="../share.js"></script>
	<script src="upload.js"></script>
	<script src="global.js"></script>
</body>
</html>