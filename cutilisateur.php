<?php 
	if (isset($_POST['submit'])) {
		extract($_POST);
		if (!empty($login) AND !empty($choix)) {
			$chaine = "ABDCEF";
			$pwd=sha1($chaine);
			$generepass = substr($pwd,0,8);
			$pass = "generepass.txt";
			$f = fopen($pass, "a+");
				$trouv = false;
				while ($ligne = fgets($f)) {
					$tab = explode(';', $ligne);
					if ($tab[0] == $login) {
						$message = " Le pseudo est déja dans le fichier!";
						$trouv = true;
						fseek($f, 0);
						break;

					}

				}
				if ($trouv == false) {
					fputs($f,$login.';'.$generepass.';'.$choix."\r\n");
					$message = "Utilisateur crée avec succée!";
				}
				

			fclose($f);
			
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Creation d'utilisateur</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron text-center">
		<h1>Gestion D'utilisateur</h1>
		<a href="index.php" class="btn btn-success">Connectez-vous</a>
	</div>
		<fieldset class="text-center">
		  <legend>S'inscrire dans le fichier d'utilisateur</legend>
		<form method="POST">
			<table align="center">
			<tr class="form-group">
				<td >Login</td>
				<td><input class="form-control" type="text" name="login"></td>
			</tr>
			<tr class="form-group">
				<td>Profil</td>
				<td>
					<select class="form-control" name="choix">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</td>
			</tr>
			<td>
				<td align="center">
					<button class="btn btn-success" name="submit">Creer</button>
				</td>
			</tr>
			<tr>
				
					<?php 
						if (isset($message)) {?>
						<td class="alert alert-danger text-center" role="alert"><small >
						<?php
							echo $message;
						}
					 ?>
				 	
				 </small></td>
			</tr>
		</table>
		</form>
	</fieldset>
</body>
</html>