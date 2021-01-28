<?php
  session_start();

  if (!isset($_SESSION['studdetail'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['studdetail']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>LabXplorer Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['studdetail'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['studdetail']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
</body>
</html>