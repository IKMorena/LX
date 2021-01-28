<?php include "config/config.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LabXplorer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="LabXplorer">
  <meta name="author" content="LabXplorerTeam">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container right-panel-active">
		<!-- Sign Up -->
		<div class="container__form container--signup">
			<form method="post" action="index.php" class="form" id="form1">
				<h2 class="form__title">LabXplorer<br>Sign Up</h2>
				<label class="labels">First name</label>
				<input type="text" class="input" name="fname" value="<?php echo $firstname; ?>" required/>
				<label class="labels">Last Name</label>
				<input type="text" class="input"name="lname" value="<?php echo $lastname; ?>"  required/>
				<label class="labels">Student Number</label>
				<input type="text" class="input" name="studnum" value="<?php echo $studentnumber; ?>" required/>
				<label class="labels">Student Mail</label>
				<input type="email" class="input" name="studmail" value="<?php echo $studentmail; ?>" required/>
				<label class="labels">Password</label>
				<input type="password" class="input" name="passw" required/>
				<label class="labels">Confirm Password</label>
				<input type="password" class="input" name="confpassw" required/>
				<button class="btn" name="reg_user">Sign Up</button>
			</form>
		</div>
		<!-- Sign In -->
		<div class="container__form container--signin">
			<form method="post" action="index.php" class="form" id="form2">
				<h2 class="form__title">LabXplorer<br>Sign In</h2>
				<label class="labels">Student Number/Mail</label>
				<input type="text" class="input" name="studnum" required/>
				<label class="labels">Password</label>
				<input type="password" class="input" name="passw" required />
				<a href="#" class="link">Forgot your password?</a>
				<button name="login_user" class="btn">Sign In</button>
			</form>
		</div>
		<!-- Overlay -->
		<div class="container__overlay">
			<div class="overlay">
				<div class="overlay__panel overlay--left">
					<button class="btn" id="signIn">Sign In</button>
				</div>
				<div class="overlay__panel overlay--right">
					<button class="btn" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
    </div>
	<!--script-->
<script src="slide.js"></script>
</body>
</html>