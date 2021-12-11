<!DOCTYPE html>
<html>

<head>
	<title>Traitement Login</title>
<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web. Avoir un fichier CSS pour une page de traitement login peut parraître non nécessaire puisque l'idée est de ne pas afficher cette page et d'être rediriger vers l'acceuil. Cependant, nous avons trouvé ça plus intéressant d'avoir un design plaisant, en cas d'erreur-->
</head>

<body>

	<p class="retour">
		<a href='Login.php'>Retour</a> <!--Ce lien permet de retourner à la page login en cas d'erreur-->
	</p>

</body>

</html>


<?php

	if(!isset($_POST['login']) OR empty($_POST['login'])OR !isset($_POST['motdepasse']) OR empty($_POST['motdepasse'])){
		
		//Ces conditions permettent de vérifier si les champs / variables sont vides ou nulles. Auquel cas, le message d'erreur qui suit s'affichera

		?>

		<p class="errortext">
			<?php echo "Remplissez tous les champs."; ?>
		</p>

		<?php

	}else{

		//Si les conditions précédentes ne sont pas vérifier, le programme approffondit la lecture des variables

		$login = $_POST['login']; // On récupére la variable login grâce à la méthode POST 
		$mdp = $_POST['motdepasse']; // On récupére la variable motdepasse grâce à la méthode POST

		if($login == 'yasminenabbad' && $mdp == 'ny123'){
			
			//On entre dans une boucle conditionnel afin de vérifier les informations saisies. Si ces dernières correspondent à la condition saisie, alors le programme nous redirige vers la page d'acceuil. Ainsi seuls les employés peuvent y avoir accès

			header('Location:acceuil.php');

		}else{
			
			?>

			<!--Si les conditions ne sont pas vérifier, un message d'erreur s'affiche, toujours avec la possibilité de retourner à la page Login grace au lien-->

			<p class="errortext">
				<?php echo "Les informations inscrites sont fausses."; ?>
			</p>

			<?php

		}
	}

?>