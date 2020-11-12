<?php
if(isset($_POST['mailform']))

$header="MIME-Version: 1.0\r\n";
$header.='From:"google.com"<exodelouis43@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="UFT-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body>
		<div align="center">
			<img src="http://www.louisleornard.com/mailing/banniere.png"/>
			<br />
			J\'ai envoyé ce mail avec PHP !
			<br />
			<img src="http://www.louisleornard.com/mailing/separation.png"/>
		</div>
	</body>
</html>
';

mail("exodelouis43@gmail.com", "Salut tout le monde !", $message, $header);

?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>