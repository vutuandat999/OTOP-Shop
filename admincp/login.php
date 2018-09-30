<?php 
@session_start();
$_loginform = '<div class="login wrapper100">
	<h1 class="h1">Login</h1>
	<form class="form" method="post">
	<div class="wrapper70">
		<label class="label">User Name: </label>
		<input class="input100" type="text" name="user" value="" required>
		<label class="label">Password: </label>
		<input class="input100" type="password" name="pwd" value="" required>
	</div>
	<div class="sidebar30">
		<input class="btngreenwhite input" type="submit" name="login" value="Login"/>
	</div>
	</form>
</div>';
if (isset($_SESSION['user'])){
	header("location: ?url=newitem");
}
else if (isset($_POST['login'])){
	$_user = trim($_POST['user']);
	$_pwd = trim($_POST['pwd']);
	$_sql = "SELECT * FROM user WHERE user_name = '".$_user."' AND user_pwd = '".$_pwd."'"; 
	$_rs = mysql_query($_sql);
	if (@mysql_num_rows( $_rs) <= 0 ){
		echo '<script>alert("Wrong username or password !");</script>';
		echo $_loginform;
		exit;
	}else{
		$_SESSION['user'] = $_user;
		header("Location: ?url=newitem");
	}
}else{
	echo $_loginform;
}
?>