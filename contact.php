<?php 
if (isset($_POST['send'])){
	$_yourname = str_replace(';','',$_POST['yourname']);
	$_youremail = str_replace(';','',$_POST['youremail']);
	$_youraddress = str_replace(';','',$_POST['youraddress']);
	$_yourmessage = str_replace(';','',$_POST['yourmessage']);
	$_contact_info = $_yourname.';'.$_youremail.';'.$_youraddress.';'.$_yourmessage;
	$_sql = "INSERT INTO contact VALUES('','".$_contact_info."')";
	mysql_query($_sql);
	$_alert = '<label class="label">Message has been sent successfully!</label>';
	mysql_close($_c);
}
?>
<div class="contact">
	<h1 class="h1">Contact us</h1>
	<div class="info">
		<p>
		<strong><?=$_sitetitle;?></strong><br/>
		123 Hoan Kiem<br/>
		Hoan Kiem, Ha Noi, 100000<br/><br/>
		123-456-789<br/><br/>
		www.sampleweb.com<br/>
		</p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59587.97785449666!2d105.80194402537248!3d21.02273601627207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSGFub2ksIEhvw6BuIEtp4bq_bSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1530436140531" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="contactform">
		<form method="post">
			<label class="label">Your Name: </label>
			<input class="input100" type="text" name="yourname" value="" required>
			<label class="label">Your email: </label>
			<input class="input100" type="email" name="youremail" value="" required>
			<label class="label">Address: </label>
			<input class="input100" type="text" name="youraddress" value="" required>
			<label class="label">Message: </label>
			<textarea class="input100" name="yourmessage" required></textarea>
			<input type="submit" name="send" value="Send"/>
			<?=$_alert;?>
		</form>
	</div>
</div>