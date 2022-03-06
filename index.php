<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<link id="main" rel="stylesheet" href="splash.css" type="text/css" media="screen"/>
<title>Eoonlight Estates Splash</title>

</head>

<body>

<div id='background1'>
<img border="0" src="bgimages/rotate.php" width="100%" height="100%">
</div>

<div id='main'><br>
<table border="0" width="100%" height="100%' cellspacing="0" cellpadding="0">
<tr>
<!--
		<td height="136" background="header_background.png">
		<img border="0" src="Grid_Trans_Image_small.png" width="400" height="137"> 
		</td>
-->
	</tr>
</table>
</div>

<div id='stats1'>
<fieldset class='stats'>
<?php include("gridstats.php"); ?>
</fieldset>
</div>


<div id='motd'><fieldset class='white2'> 
<?php

include ('motd.php');

?>

</fieldset>
</div>

<div id='links'><fieldset class='white2'> 
<?php

include ('links.php');

?>

</fieldset>
</div>


<div id='donate'><fieldset class='donate'> 
<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="DRGGUDPKKNKB8" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form>
</center>
</fieldset>
</div>

</div>


<div id='account'><fieldset class='account'> 
<center>
<br>
<a href="http://moonlight.designcreations.us:8000/jopensim/index.php/component/users/?view=registration&Itemid=101">Create an Account</a><br>
<br>
<a href="http://moonlight.designcreations.us:8000/jopensim/index.php/component/users/?view=remind&Itemid=101">Forgot Username</a><br>
<br>
<a href="http://moonlight.designcreations.us:8000/jopensim/index.php/component/users/?view=reset&Itemid=101">Reset Password</a><br>

<br>
</center>
</fieldset>
</div>



<div id='twitter1'>

<fieldset class='rss'>

 <!-- start feedwind code -->

<script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="1741/"></script>

 <!-- end feedwind code -->  

</fieldset>

</div>

</body>
</html>
