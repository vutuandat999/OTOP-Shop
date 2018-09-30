<?php session_start(); ?>
<div class="product wrapper100">
	<h1 class="h1">Product</h1>
	<form method="POST" action="">
	<div class="wrapper70">
		<?php 
		$_id = $_GET["id"];
		$_sql = "SELECT * FROM item WHERE item_id =".$_id;
		$_rs = mysql_fetch_array(mysql_query($_sql));
		echo '<div class="image200"><img src="images/'.$_rs['item_thumb'].'"/></div>';
		echo '<div class="productfullinfo">';
		echo '<span class="producttitle">'.$_rs['item_name'].'</span>';
		echo $_rs['item_details'].'<br/>';
		echo 'Size: <strong>'.$_rs['item_size'].'</strong><br/>';
		echo '<span class="productprice">Price: $'.$_rs['item_price'].'</span>';
		echo '</div>';
		?>
	</div>
	<div class="sidebar30">
		<select name="item_amount">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<input class="addtocart" type="submit" name="addtocart" value="Add to cart"/>
	</div>
	</form>
</div>
<?php 
if (isset($_POST['addtocart'])){
    $_SESSION['cart'][$_id] = array('item_id' => $_id, 'item_amount' => $_POST["item_amount"]);
	echo '<script>alert("Item successfully added to your cart");</script>';
}
mysql_close($_c);
?>