<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
<h3><a href="update.php">Перейти к редактировнию!</a></h3>
</div>
	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
