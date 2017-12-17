<?php 
session_start();
    if (isset($_POST['submit'])) {
       extract($_POST);
      if (file_exists("generepass.txt")) {
       
       $f=fopen('generepass.txt', 'r');
      while ( $line= fgets($f)) {

        $info = explode(';', $line);
        if ($info[0] == $pseudo AND $info[1]==$pwd AND $info[2]==$choix) {
          $message =" CONNECTER!";
         break;
        }
        else
        {
          $message = " Login ou Password incorrect!";
        }

      }
       

      }
      else
      {
        $message = "Le fichier n'existe pas!";
      }

  }
      
     
      
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta charset="utf-8 sans BOM">
	<style type="text/css">
		body{
  background-color: #304FFE;
}	
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color:lightgray;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
 
	</style>
</head>
<body>
	<div class="jumbotron text-center">
			<div class="row">
				<div class="col-md-12">
					<h1>Bienvenue! Connectez-vous</h1>
          <a href="cutilisateur.php" class="btn btn-success">S'inscrire</a>
          <?php if (isset($connect)) {
              echo $connect;
          } ?>
				</div>
			</div>
	</div>
	<form method="POST">
	
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img text-center" src="images/image1.png">
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Votre pseudo" autofocus name="pseudo">
                <input type="password" class="form-control" placeholder="Votre Mot de passe" name="pwd">
                <div class="form-group text-center">
            <label >Profil</label>
                <select class="form-control" name="choix">
                      <option value="">choix</option>
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                </select>
          </div>
                <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                    Se connectez</button>
                </form>
                <div class="alert alert-danger text-center"  role="alert">
                    <?php if (isset($message)) {
                       echo $message;
                    } ?>
                </div>
            </div>
           
        </div>
    </div>
</div>
	</form>
</body>
</html>