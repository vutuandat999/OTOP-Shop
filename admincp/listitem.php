<?php 
@session_start();
if (isset($_SESSION['user'])){
?>
<div class="listitem wrapper100">
	<h1 class="h1">List Item</h1>
	<?php 
	$_sql = "SELECT * FROM item ORDER BY item_id DESC";
	$_rs = mysql_query($_sql);
	while($_r = mysql_fetch_array($_rs, MYSQL_ASSOC)) {
		echo '<div class="breakproduct">';
		echo '<div class="wrapper70">';
		echo '<div class="image200"><img src="../images/'.$_r['item_thumb'].'"/></div>';
		echo '<div class="productfullinfo">';
		echo '<span class="producttitle">'.$_r['item_name'].'</span>';
		echo $_r['item_details'].'<br/>';
		echo 'Size: <strong>'.$_r['item_size'].'</strong><br/>';
		echo '<span class="productprice">Price: $'.$_r['item_price'].'</span>';
		echo '</div>';
		echo '</div>';
		echo '<div class="sidebar30">
			<span class="btngreen"><a href="?url=edititem&action=edititem&id='.$_r['item_id'].'">Edit Item</a></span>
			<span class="btnwhitered"><a href="?url=edititem&action=deleteitem&id='.$_r['item_id'].'">Delete Item</a></span>
		</div>';
		echo '</div>';
	}
	mysql_close($_c);
	?>
</div>
<?php 
}else{
	header("Location: ?url=login");
}
?>