<!DOCTYPE html>
<html>
<head>

	<title>Ajouter Client</title>
	<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web. Avoir un fichier CSS pour une page de traitement de données peut parraître non nécessaire. Cependant, nous avons trouvé ça plus intéressant d'avoir un design plaisant, en cas d'erreur-->

</head>

<body>
	<p class="retour">
		<a href='Clients.php'>Retour</a> <!--Ce lien permet de retourner à la page Clients en cas d'erreur-->
	</p>
</body>

</html>

<?php 

	$connexion = mysqli_connect('localhost' /*l'hoste*/,'root' /*le username*/,'' /*mot de passe*/,'pharmacie ynrb'/*nom de la bdd*/); // ici nous nous connectons connectons à la base de données sur mysql (phpmyadmin pour nous)

	if(!isset($_POST['identifiant']) OR empty($_POST['identifiant']) OR !isset($_POST['nom']) OR empty($_POST['nom']) OR !isset($_POST['sécurité']) OR empty($_POST['sécurité']) OR !isset($_POST['téléphone']) OR empty($_POST['téléphone']) OR !isset($_POST['adresse']) OR empty($_POST['adresse'])){

			//Ces conditions permettent de vérifier si les champs / variables sont vides ou nulles. Auquel cas, le message d'erreur qui suit s'affichera
		?>

		<p class="errortext">
			<?php echo "Remplissez tous les champs.";?>
		</p>
		
		<?php	

	}

		else{

		//Si les conditions précédentes ne sont pas vérifier, le programme approffondit la lecture des informations saisies

		$insertion = "INSERT INTO clients (Identifiant, Nom, Sécurité, Téléphone, Adresse, Crédits) VALUES ('".$_POST['identifiant']."','".$_POST['nom']."','".$_POST['sécurité']."','".$_POST['téléphone']."','".$_POST['adresse']."','".$_POST['crédits']."')";

			//Ici, la requête effectuée permet d'insérer les informations saisies dans la table clients de la bdd à laquelle nous sommes connectés

		$résultat=mysqli_query($connexion,$insertion);

			//Cette requête vérifie que la requête de connection et d'insertion fonctionne

		if($résultat){

			header('Location:Clients.php');

			//Si la requête fonctionne, on sera rediriger vers la page précédente

		}else{

			?>

			<p class="errortext">
				<?php echo "Data not inserted.";?>
			</p>

			<?php

			//Si la requête ne fonctionne pas, un message d'erreur s'affiche (celui qui précède)
		}
	}

?>
