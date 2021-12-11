<!DOCTYPE html>
<html>

<head>

	<title>Liste des Clients </title>
	<?php require 'menu.php'; ?>
	<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web-->

</head>

<body>

	<hr><br>

	<div>
		<!--Ici l'idée est de créer un formulaire dans lequel l'employé entrera ses informations du nouveau client. On récupére ces données sous forme de variables grâce à la méthode POST-->

		<div id="divajout">

			<form method="POST" action="ajouterclient.php"> <!--Le formulaire nous redirige vers la page ajouterclient.php-->

				<p>

					Identifiant : <input type="text" name="identifiant" class="textbox">
						<br><br>
					Nom : <input type="text" name="nom" class="textbox">
						<br><br>
					Téléphone : <input type="text" name="téléphone" class="textbox">
						<br><br>
					Sécurité Sociale : <input type="text" name="sécurité" class="textbox">
						<br><br>
					Adresse : <input type="text" name="adresse" class="textbox">
						<br><br>

					<input type="hidden" name="crédits" value='0'> <!--Ici, on utiliser le type hidden qui permet d'initialiser le crédit à 0 (grace à value) automatiquement sans afficher le crédit-->
				
				</p>

					<input type="submit" value="Ajouter"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont envoyées à la pages ajouterclient.php-->
					<input type="reset" value="Recommencer"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont réinitialisées-->

			</form>

		</div>

		<!--Ici l'idée est de créer un formulaire dans lequel l'employé entrera ses informations du nouvel achat. On récupére ces données sous forme de variables grâce à la méthode POST-->

		<div id="divachat">

			<form method="POST" action="achat.php"> <!--Le formulaire nous redirige vers la page achat.php-->
			
				<u><b>Achat</b></u>
				<br><br>
			
				<p>
				
					Identifiant : <input type="text" name="identifiant" class="textbox">
					<br><br>
					Médicament : <input type="text" name="nom" class="textbox">
					<br><br>
					Quantité : <input type="text" name="quantité" class="textbox">
					<br><br>
					Montant payé : <input type="text" name="payé" class="textbox">
					<br>

				</p>
					
					<input type="submit" value="Acheter">  <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont envoyées à la page achat.php-->
					<input type="reset" value="Recommencer"><!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont réinitialisées-->


			</form>

		</div>

	</div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr><br><br> <!--Nécessaire pour l'aspect physique de la page -->

	<div class="divafficher">

		<table>

			<thead>

        		<tr>

            		<th>Liste des Clients</th>

        		</tr>

        		<tr>

        			<td>Identifiant</td>
        			<td>Nom</td>
        			<td>Numéro de téléphone</td>
        			<td>Numéro de Sécurité Sociale</td>
        			<td>Adresse</td>
        			<td>Crédit </td>

        		</tr>
   			</thead>

    		<tbody>

    			<?php

					try //Cette fois-ci, on utilise une autre méthode pour connecter la base de données. Cette dernière vérifie directement la connexion à la base de donnée

						{
							$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', ''); //host, nom de base de donnée, type, username et mot de passe
						}

					catch(Exception $e)

						{
       						die('Erreur : '.$e->getMessage()); // Message d'erreur en cas de non connexion
						}

					$reponse = $bdd->query('SELECT * FROM clients'); // Requpete donnant accès aux données de la table clients
		
				?>

				<?php

					while($donnees = $reponse->fetch()) // Tant que les données sont existent, ecécuter la requete

				{?>

					<tr>

            			<td><?php echo $donnees['Identifiant'];?></td> <!-- Afficher les donnees de la colonne identifiant-->
            			<td><?php echo $donnees['Nom'];?></td> <!-- Afficher les donnees de la colonne nom-->
            			<td><?php echo $donnees['Téléphone'];?></td> <!-- Afficher les donnees de la colonne téléphone-->
            			<td><?php echo $donnees['Sécurité'];?></td> <!-- Afficher les donnees de la colonne sécurité-->
            			<td><?php echo $donnees['Adresse'];?></td> <!-- Afficher les donnees de la colonne adresse-->
                		<td><?php echo $donnees['Crédits'];?></td> <!-- Afficher les donnees de la colonne crédit-->

    				</tr>

				<?php   

				}?>  

			</tbody>

		</table>

	</div>

	<br><br>
 
	<form method="POST" action="rechercherclient.php"> <!--La barre de recherme permet d'afficher seulement les données que l'on cherche-->

		<input class="recherche" type="search" name="variable" placeholder="Rechercher un client...">

	</form>

	<br><br>

</body>

</html>