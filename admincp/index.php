<?php 
@session_start();
require_once('../config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$_sitetitle;?></title>
	<link rel="stylesheet" type="text/css" href="../style.css" media="screen" />
</head>
<body>
<div class="header">
	<div class="topcontent">
		<h1><?=$_sitetitle;?></h1>
		<h2>Admin Control Panel</h2>
	</div>
</div>
<div class="menu">
	<ul>
		<li><a href="?url=newitem">New Item</a></li>
		<li><a href="?url=listitem">List Item</a></li>
		<li><a href="?url=history">History</a></li>
		<li><a href="?url=contact">Contact</a></li>
		<?php if (isset($_SESSION['user'])){ ?>
		<li><a href="?url=logout">Logout</a></li>
		<?php } ?>
	</ul>
</div>
<div class="content">
<?php 
$_url = $_GET['url'];
if(empty($_url)){
	include_once('newitem.php');
}else{
	include_once($_url.'.php');
}
?>
</div>
<div class="footer">
	© 2018 <span><?=$_sitetitle;?></span>
</div>
</body>
</html>