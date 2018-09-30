<?php 
$_host ="localhost";
$_dbname ="emhung";
$_user ="root";
$_pw ="12345678";
$_c = mysql_connect($_host,$_user,$_pw) or die("Error Connect: ".mysql_error());
mysql_select_db($_dbname) or die("Error Select Database: ".mysql_error());
mysql_query("SET NAMES 'utf8'", $_c);
$_sitetitle = "#Shop Title";
?>