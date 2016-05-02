<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<title>Sondages</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">

            <center><font color="#CECECE"> Projet PHP r&eacute;alis&eacute; par MONTGRANDI Romain || LEBRUN Rodolphe  </font></center>

				<?php $this->displaySearchForm(); ?>
				<?php

					if ($this->login===null) $this->displayLoginForm();
					else $this->displayLogoutForm();
				?>

			</div>
      <a class="btn disabled" style="position:absolute;top:2%;left:15%;" href="#" name="accueil">Acceuil</a>
		</div>
  </br>

<center>########################</center></br>
<?php

  if ($this->login===null) $this->null=null;
  else $this->displayTestForm();
?>
</div>
</br>
<?php
	$this->displayBody();
?>

</body>
</html>
