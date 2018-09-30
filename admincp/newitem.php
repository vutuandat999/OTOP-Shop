<?php 
@session_start();
if (isset($_SESSION['user'])){
?>
<div class="newitem wrapper100">
<h1 class="h1">New Item</h1>
	<form class="form" method="post" enctype="multipart/form-data">
		<label class="label">Item Name: </label>
		<input class="input100" type="text" name="item_name" value="" required>
		<label class="label">Item Thumb: </label>
		<input class="input100" type="file" name="item_thumb" id="item_thumb" accept="image/*" required>
		<label class="label">Item Details: </label>
		<input class="input100" type="text" name="item_details" value="" required>
		<label class="label">Item Size: </label>
		<input class="input100" type="text" name="item_size" value="" required>
		<label class="label">Items Price: </label>
		<input class="input100" type="text" name="item_price" value="" required>
		<label class="label">&nbsp;</label>
		<input class="btngreenwhite input" type="submit" name="addnew" value="Add New"/>
	</form>
</div>
<?php 
if (isset($_POST['addnew'])){
	$_item_name = $_POST['item_name'];
	$_item_details = $_POST['item_details'];
	$_item_size = $_POST['item_size'];
	$_item_price = $_POST['item_price'];
	$_target_dir = "../images/";
	$_target_file = $_target_dir . basename($_FILES["item_thumb"]["name"]);
	$_imageFileType = strtolower(pathinfo($_target_file,PATHINFO_EXTENSION));
	$_item_thumb = basename($_FILES["item_thumb"]["name"]);
	if (file_exists($_target_file)) {
		echo '<script>alert("Exist image.");</script>';
	}else{
		move_uploaded_file($_FILES["item_thumb"]["tmp_name"], $_target_file);
		$_sql = "INSERT INTO item VALUES('','".$_item_name."','".$_item_thumb."','".$_item_details."','".$_item_size."','".$_item_price."')";
		mysql_query($_sql);
		echo '<script>alert("Successfully added new item.\nRedirecting to List Item.");window.location= "?url=listitem";</script>';
	}
	mysql_close($_c);
}
?>
<?php 
}else{
	header("Location: ?url=login");
}
?>