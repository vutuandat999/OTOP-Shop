<?php 
@session_start();
if (isset($_SESSION['user'])){
?>
<div class="history wrapper100">
	<div class="row bggreen">
		<div class="column">Time</div>
		<div class="column">Customer Info</div>
		<div class="column">Item / Amount</div>
		<div class="column">Total Price</div>
	</div>
<?php 
$_sql = "SELECT * FROM checkout ORDER BY checkout_id DESC";
$_rs = mysql_query($_sql);
while($_r = mysql_fetch_array($_rs, MYSQL_ASSOC)) {
	$_excustomerinfo = explode(',',$_r['checkout_customerinfo']);
	$_exiteminfo = explode(',',rtrim($_r['checkout_iteminfo'],",")); //remove last ,
	if($_r['checkout_id'] % 2 == 0){
		echo '<div class="row bggray">';
	}
	else{
		echo '<div class="row">';
	}
	echo '<div class="column">'.$_r['checkout_time'].'</div>';
	echo '<div class="column">
	<span><strong><i>'.$_excustomerinfo[0].'</strong></i></span>
	<span>'.$_excustomerinfo[1].'</span>
	<span><strong>'.$_excustomerinfo[2].'</strong></span>
	<span>'.$_excustomerinfo[3].'</span>
	</div>';
	echo '<div class="column">';
	foreach($_exiteminfo as $_iteminfo){
		$_ex = explode('*',$_iteminfo);
		$_sqlgetnameitem = "SELECT item_name FROM item WHERE item_id =".$_ex[0];
		$_rs2 = mysql_fetch_array(mysql_query($_sqlgetnameitem));
		echo '<span class="producttitle">'.$_rs2['item_name'].'</span>';
		echo 'Amount: '.$_ex[1].'<br/><br/>';
	}
	echo '</div>';
	echo '<div class="column">$'.$_r['checkout_totalprice'].'</div>';
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