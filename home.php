<?php 
$_sql = "SELECT * FROM item ORDER BY RAND()";
$_rs = mysql_query($_sql);
while($_r = mysql_fetch_array($_rs, MYSQL_ASSOC)) {
	echo '<div class="item">';
	echo '<a href="?url=product&id='.$_r['item_id'].'"><div class="flipper">';
	echo '<div class="frontitem">';
	echo '<div class="item_name">'.$_r['item_name'].'</div>';
	echo '<div class="item_thumb"><img src="images/'.$_r['item_thumb'].'"/></div>';
	echo '<div class="item_details">'.$_r['item_details'].'</div>';
	echo '<div>Size: <span class="item_size">'.$_r['item_size'].'</span></div>';
	echo '</div>';
	echo '<div class="backitem">';
	echo '<div class="item_price">$ '.$_r['item_price'].'</div>';
	echo '</div>';
	echo '</div></a>';
	echo '</div>';
}
mysql_close($_c);
?>