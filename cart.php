<?php session_start(); ?>
<div class="product">
	<h1 class="h1">Cart</h1>
	<div class="wrapper70">
	<?php 
	if (isset($_SESSION['cart'])){
		#print_r($_SESSION['cart']);
		foreach( $_SESSION['cart'] as $_cart){
			$_sql = "SELECT * FROM item WHERE item_id =".$_cart['item_id'];
			$_rs = mysql_fetch_array(mysql_query($_sql));
			echo '<div class="breakproduct">';
			echo '<div class="image200"><img src="images/'.$_rs['item_thumb'].'"/></div>';
			echo '<div class="productfullinfo">';
			echo '<span class="producttitle">'.$_rs['item_name'].'</span>';
			echo $_rs['item_details'].'<br/>';
			echo 'Size: <strong>'.$_rs['item_size'].'</strong><br/>';
			echo '<span>Amount: '.$_cart['item_amount'].'</span>';
			echo '<span class="productprice">Price: $'.$_rs['item_price'].'</span>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="sidebar30">
			<form method="POST" action="">
				<input type="submit" class="input btngreen" name="checkout" value="Check out"/>
				<input type="submit" class="input btnwhitered" name="clearcart" value="Clear cart"/>
			</form>
		</div>';
	}
	else{
		echo 'You have no items';
	}
	?>
</div>
<?php 
if (isset($_POST['clearcart'])){
    session_destroy();
	header("Refresh:0");
}
if (isset($_POST['checkout'])){
	header("location: ?url=checkout");
}
?>