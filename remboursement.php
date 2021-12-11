<!DOCTYPE html>
<html>

<head>

	<title>Liste des Crédits</title>
	<link rel="stylesheet" href="stylebis.css">

</head>

<body>

	<p class="retour">
		<a href='Crédits.php'>Retour</a> <!--Ce lien permet de retourner à la page Clients en cas d'erreur-->
	</p>

</body>
</html>

<?php 

	try{$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', '');} 
	//Connexion à la base de données : Cette méthode vérifie directement la connexion à la base de donnée

	//host, nom de base de donnée, type, username et mot de passe
	catch(Exception $e){die('Erreur : '.$e->getMessage());}
	// Message d'erreur en cas de non connexion

	$id = $_POST['id'];
	$remboursée =$_POST['remboursée'];

	$réponse = $bdd->query('SELECT * FROM clients');
	// Requpete donnant accès aux données de la table clients

   
    if(isset($id) AND !empty($id) AND isset($remboursée) AND !empty($remboursée)) { //vérification que les champs ne soient pas vides
   		
   		 $donnees = $réponse->fetch();
   		//Ecécuter la requete

   		if($donnees['Identifiant']==$id){ //si l'identifiant existe, alors on poursuit

   			$réponse = $bdd->query("UPDATE clients SET Crédits=Crédits-'".$remboursée."' WHERE Identifiant = '".$id."'");
   			//requete permetant de modifier le crédit


			if($réponse){ //si la requete a ete executee, on est redirige vers les crédits

				header('Location:Crédits.php');

			}else{ //autrement un message d'erreur s'affiche

				?>

					<p class="errortext">
						<?php echo "Data not updated.";}?>
					</p>

				<?php

		}else{ //si l'identifiant n'existe pas, un message d'erreur s'affiche

			?>

				<p class="errortext">
				<?php echo "Cet identifiant n'existe pas.";}?>

		<?php

	}else{ //si les champs ne sont pas tous remplis, un message d'erreur s'affiche

		?>
		<p class="errortext">
		<?php echo "Remplissez tous les champs.";?>
		
	<?php } ?>