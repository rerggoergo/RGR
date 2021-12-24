<?php include("includes/header.php"); ?>
<div class="container mregister">
	<div id="login">
		<h1>Регистрация!</h1>
		<form action="register.php" id="registerform" method="post"name="registerform">
			
					<p><label for="user_name">Имя<br>
						<input class="input" id="full_name" name="full_name"size="20" type="text" value=""></label></p>

						<p><label for="e_mail">Почта<br>
						<input class="input" id="email" name="email"size="20" type="email" value=""></label></p>

						<p><label for="user_pass">Пароль<br>
							<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
								<p><label for="user_role">Роль<br>
									<input class="input" id="role" name="role"size="32"   type="text" value=""></label></p>

							<p class="submit"><input class="button" id="register" name= "register" type="submit" value="LET ME IN!"></p>
							<p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя</a>!</p>
						</form>
					</div>
				</div>

				<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
  $full_name= htmlspecialchars($_POST['full_name']);
  $email= htmlspecialchars($_POST['email']);
 $role=htmlspecialchars($_POST['role']);
 $password=htmlspecialchars($_POST['password']);
 $full_name=filter_var($full_name,FILTER_SANITIZE_EMAIL);
 $email=filter_var($email,FILTER_SANITIZE_EMAIL);
 $role=filter_var($role,FILTER_SANITIZE_EMAIL);
 $password=filter_var($password,FILTER_SANITIZE_EMAIL);


 $query=mysqli_query($con, "SELECT * FROM customers WHERE name='".$full_name."'");
  $numrows=mysqli_num_rows($query);
  //if (!$query || mysqli_num_rows($query) == 0)
if($numrows==0)
   {
	$sql="INSERT INTO customers
  (name, email, role, password)
	VALUES('$full_name', '$email', '$role', '$password')";
  $result=mysqli_query($con, $sql);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	?>

	<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>


				<?php include("includes/footer.php"); ?>
