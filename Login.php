<!Doctype html>
<html>

<head>
<title>Login </title>
<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web-->
<meta charset="UTF-8">
</head>

<body>

	<div id="divlog">

		<form action="traitementlogin.php" method="POST">

			<!--Ici l'idée est de créer un formulaire dans lequel l'employé entrera ses informations de login. On récupére ces données sous forme de variables grâce à la méthode POST-->

		<form action="traitementlogin.php" method="POST"> <!--Le formulaire nous redirige vers la page traitementlogin.php-->

			Nom d'utilisateur : <input class="textbox" type="text" name="login"> <!--L'employé peut saisir son username ici-->
			<br><br>
			Mot de passe : <input class="textbox" type="password" name="motdepasse"> <!--L'employé peut noter son mot de passe ici, il sera caché grâce au type password-->
			<br><br>

			<input type="submit" value="Se connecter"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont envoyées à la pages traitementlogin.php-->

			<input type="reset" value="Recommencer"> <!--Si l'employé appuie sur ce bouton, les champs au dessus sont réinitialisés-->

		</form>

		<!--Au final les données envoyées à la page de traitement du formulaire sont les variable login et motdepasse-->

		</form>
	</div>	
</body>

</html>

