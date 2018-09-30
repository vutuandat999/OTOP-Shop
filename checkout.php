<?php 
	session_start(); 
	date_default_timezone_set('asia/ho_chi_minh');
	if (isset($_SESSION['cart'])){
?>
<div class="checkout">
<h1 class="h1">Check out</h1>
	<form class="form" method="post">
		<label class="label">Your Name: </label>
		<input class="input100" type="text" name="yourname" value="" required>
		<label class="label">Your email: </label>
		<input class="input100" type="email" name="youremail" value="" required>
		<label class="label">Your phone: </label>
		<input class="input100" type="text" name="yourphone" value="" required>
		<label class="label">Address: </label>
		<input class="input100" type="text" name="youraddress" value="" required>
		<label class="label">Items: </label>
		<div class="checkoutinfo">
		<?php 
		$_total = 0;
		$_itemid = array();
		foreach( $_SESSION['cart'] as $_cart){
			$_sql = "SELECT * FROM item WHERE item_id =".$_cart['item_id'];
			$_rs = mysql_fetch_array(mysql_query($_sql));
			echo '<div class="breakproduct">';
			echo '<div class="image200"><img src="images/'.$_rs['item_thumb'].'"/></div>';
			echo '<div class="productfullinfo">';
			echo '<span>'.$_rs['item_name'].'</span>';
			echo $_rs['item_details'].'<br/>';
			echo 'Size: <strong>'.$_rs['item_size'].'</strong><br/>';
			echo '<span>Price: $'.$_rs['item_price'].'</span>';
			echo '<span>Amount: '.$_cart['item_amount'].'</span>';
			echo '</div>';
			echo '</div>';
			$_total = $_total + $_rs['item_price']*$_cart['item_amount'];
			$_itemid[] = $_cart['item_id'].'*'.$_cart['item_amount'].',';
		}
		?>
		</div>
		<label class="label">Total: $<?=$_total;?></label>
		<input class="btngreenwhite input" type="submit" name="finish" value="Finish"/>
	</form>
</div>
<?php }else{
	header("Location: ?url=");
}
if (isset($_POST['finish'])){
	$_checkout_customerinfo = $_POST['yourname'].', '.$_POST['youremail'].', '.$_POST['yourphone'].', '.$_POST['youraddress'];
	$_checkout_iteminfo = implode($_itemid);
	$_checkout_time = date('H:i:s d-M-Y');
	$_sql = "INSERT INTO checkout VALUES('','".$_checkout_customerinfo."','".$_checkout_iteminfo."','".$_total."','".$_checkout_time."')";
	mysql_query($_sql);
	session_destroy();
	echo '<script>alert("You made a successful purchase.\nPlease wait staff for confirmation.");window.location= "?url=";</script>';
}
mysql_close($_c);
?>