<?php 
@session_start();
if (isset($_SESSION['user'])){
?>
<div class="edititem wrapper100">
	<h1 class="h1">Edit Item</h1>
<?php 
$_id = trim(intval($_GET["id"]));
if($_id<0) $_id = -$_id;
if($_GET["action"] == 'edititem'){
	$_sql = "SELECT * FROM item WHERE item_id =".$_id;
	$_rs = mysql_query($_sql);
	$_rs = mysql_fetch_array(mysql_query($_sql));
?>
	<form method="post" enctype="multipart/form-data">
		<div class="wrapper70">
			<div class="productfullinfo">
				<label class="label">Item Name: </label>
				<input class="input100" type="text" name="item_name" value="<?=$_rs['item_name'];?>">
				<label class="label">Item Thumb: </label>
				<input class="input100" type="file" name="item_thumb" id="item_thumb" accept="image/*">
				<label class="label">Item Details: </label>
				<input class="input100" type="text" name="item_details" value="<?=$_rs['item_details'];?>">
				<label class="label">Item Size: </label>
				<input class="input100" type="text" name="item_size" value="<?=$_rs['item_size'];?>">
				<label class="label">Items Price: </label>
				<input class="input100" type="text" name="item_price" value="<?=$_rs['item_price'];?>">
			</div>
		</div>
		<div class="sidebar30">
			<input class="btngreen input" type="submit" name="edit" value="Edit Item">
			<img src="../images/<?=$_rs['item_thumb'];?>"/>
		</div>
	</form>
<?php 
	if (isset($_POST['edit'])){
		$_item_name = $_POST['item_name'];
		$_item_details = $_POST['item_details'];
		$_item_size = $_POST['item_size'];
		$_item_price = $_POST['item_price'];
		$_target_dir = "../images/";
		$_target_file = $_target_dir . basename($_FILES["item_thumb"]["name"]);
		$_imageFileType = strtolower(pathinfo($_target_file,PATHINFO_EXTENSION));
		$_item_thumb = basename($_FILES["item_thumb"]["name"]);
		if(empty(basename($_FILES["item_thumb"]["name"]))){
			$_sql = "UPDATE item SET item_name = '".$_item_name."', item_details = '".$_item_details."', item_size = '".$_item_size."', item_price = '".$_item_price."' WHERE item_id = '".$_id."' ";
			mysql_query($_sql);
			echo '<script>alert("Successfully edit item.");window.location= "?url=edititem&action=edititem&id='.$_id.'";</script>';
		}else{
			if (file_exists($_target_file)) {
				echo '<script>alert("Exist image.");</script>';
			}else{
				move_uploaded_file($_FILES["item_thumb"]["tmp_name"], $_target_file);
				$_sql = "UPDATE item SET item_name = '".$_item_name."', item_details = '".$_item_details."', item_size = '".$_item_size."', item_price = '".$_item_price."', item_thumb = '".$_item_thumb."' WHERE item_id = '".$_id."' ";
				mysql_query($_sql);
				echo '<script>alert("Successfully edit item.");window.location= "?url=edititem&action=edititem&id='.$_id.'";</script>';
			}
		}
	}
}
	if($_GET["action"] == 'deleteitem'){
		echo '
		<script>
			if (confirm("Do you want delete this item?")) {
				window.location= "?url=edititem&id='.$_id.'&status=del";
			}else{
				window.location= "?url=listitem";
			}
		</script>
		</div>';
	}
	if($_GET["status"] == 'del'){
		$_sql = "DELETE FROM item WHERE item_id =".$_id;
		mysql_query($_sql);
		echo '<script>alert("Successfully delete item.");window.location= "?url=listitem";</script>';
	}
mysql_close($_c);
?>
</div>
<?php 
}else{
	header("Location: ?url=login");
}
?>