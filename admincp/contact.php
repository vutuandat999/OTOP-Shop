<?php 
@session_start();
if (isset($_SESSION['user'])){
?>
<div class="contact wrapper100">
	<div class="row bggreen">
		<div class="column50">Customer Info</div>
		<div class="column50">Message</div>
	</div>
<?php 
$_sql = "SELECT * FROM contact ORDER BY contact_id DESC";
$_rs = mysql_query($_sql);
while($_r = mysql_fetch_array($_rs, MYSQL_ASSOC)) {
	$_excontact_info = explode(';',$_r['contact_info']);
	if($_r['contact_id'] % 2 == 0){
		echo '<div class="row bggray">';
	}
	else{
		echo '<div class="row">';
	}
	echo '<div class="column50">
	<span><strong>'.$_excontact_info[0].'</strong></span>
	<span><i>'.$_excontact_info[1].'</i></span>
	<span>'.$_excontact_info[2].'</span>
	</div>';
	echo '<div class="column"><span>'.$_excontact_info[3].'</span></div>';
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