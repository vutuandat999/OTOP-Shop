<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$_sitetitle;?></title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="gallery-slimbox-2.05/js/slimbox2.js"></script>
	<link rel="stylesheet" href="gallery-slimbox-2.05/css/slimbox2.css" type="text/css" media="screen" />
</head>
<body>
<div class="header">
	<div class="topcontent">
		<h1><?=$_sitetitle;?></h1>
		<h2>slogan, description shop</h2>
	</div>
</div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,th,vi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div class="menu">
	<ul>
		<li><a href="?url=">Home</a></li>
		<li><a href="?url=gallery">Gallery</a></li>
		<li><a href="?url=contact">Contact</a></li>
		<li><a href="?url=cart">Cart</a></li>
	</ul>
</div>
<div class="content">
<?php 
$_url = $_GET['url'];
if(empty($_url)){
	include_once('home.php');
}else{
	include_once($_url.'.php');
}
?>
</div>
<div class="footer">
	© 2018 <span><?=$_sitetitle;?></span> <div id="google_translate_element"></div>
</div>
</body>
</html>