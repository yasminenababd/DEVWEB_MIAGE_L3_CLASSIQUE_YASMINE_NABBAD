<!DOCTYPE html>
<html>

<head>
	<title>Liste des Médicaments</title>
	<?php require 'menu.php'; ?>
	<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web-->
</head>

<body>

	<hr><br><br>

	<div> <!--Bien que l'on ait fait appel à une feuille de style, nous avons choisit d'utiliser l'attribut style sur cette page de code-->

		<div style="width: 35%;border: 2px solid #92726B;box-shadow: 60px -16px #2CBD2B ;padding: 1em;;background-color:#C3A993;float: left;margin-left: 5%">
		
			<form method="POST" action="ajoutermédicament.php"> 
				<!--Ce formulaire permet d'ajout de nouveaux médicaments et d'approvionner ceux qui sont déjà présent dans la base de données. 
					Ce formulaire nous renvoie vers la page ajoutermédicament.php-->
			
			<u><b>Gérer le stock de médicaments</b></u>
			
				<p>Identifiant :<input type="text" name="identifiant" style="display: block; width: 300px; float: right;"><br><br>
					Nom :<input type="text" name="nom" style="display: block; width: 300px; float: right;"><br><br>
					Prix :<input type="text" name="prix" style="display: block; width: 300px; float: right"><br><br>
					Date d'expiration :<input type="Date" name="date" style="display: block; width: 300px; float: right"><br><br>Quantité:<input type="text" name="stock" style="display: block; width: 300px; float: right">
				</p>

					<input type="submit" value="Approvisionner"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont traitées-->
					<input type="reset" value="Recommencer"> <!--Quand l'employé appuie sur ce bouton, les informations saisies sont effacées-->

			</form>

		</div>

		<br><br>

		<div style="width: 35%;border: 2px solid #92726B;box-shadow: 60px -16px #2CBD2B;padding: 1em;;background-color:#C3A993; float: right; margin-right:10%;margin-top: 3%">

			<form method="POST" action="recherchermédicament.php">
				<!--Le formulaire nous redirige vers la page recherchermédicament.php-->
				<input style="width: 100%"type="search" name="variable" placeholder="Rechercher un médicament">
			</form>

			<form method="POST" action="médicamentsexpirés.php">
				<!--Ce bouton permet d'afficher les médicaments expirés présents dans la base de données-->
				<input style="width: 100%"type="submit" name="expirés" value="Médicaments expirés">
			</form>

			<form method="POST" action="stockvide.php">
				<!--Ce bouton permet d'afficher les médicaments dont le stock est vide présents dans la base de données-->
				<input style="width: 100%"type="submit" name="stockvide" value="Médicaments dont le stock est vide">
			</form>

			<form method="POST" action="stockbientôtvide.php">
				<!--Ce bouton permet d'afficher les médicaments dont le stock est inférieur à 10 unités présents dans la base de données-->
				<input style="width: 100%"type="submit" name="bientôtvide" value="Médicaments dont le stock est inférieur à 10">
			</form>

		</div>

	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr><br><br>
	
	<div class="divafficher">
	
		<table>
		
			<thead>
        		
        		<tr>
            		<th><u>Liste des Médicaments</u></th>
        		</tr>
        	
        		<tr>
        			<td>Identifiant</td>
        			<td>Nom</td>
        			<td>Date d'expiration</td>
        			<td>Prix</td>
        			<td>Stock </td>
        		</tr>

    		</thead>

    		<tbody>

    			<?php
		
					try{$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', '');}
					//Connexion à la base de données : Cette méthode vérifie directement la connexion à la base de donnée

                    //host, nom de base de donnée, type, username et mot de passe
					catch(Exception $e){die('Erreur : '.$e->getMessage());}
					// Message d'erreur en cas de non connexion


					$reponse = $bdd->query('SELECT * FROM médicaments');
					// Requpete donnant accès aux données de la table médicaments
		
				?>

				<?php

					while($donnees = $reponse->fetch()) {?>
						<!-- Tant que les données sont existent, ecécuter la requete -->
				
						<tr>
                   			<td><?php echo $donnees['Midentifiant'];?></td>
                   			<!-- Afficher les donnees de la colonne identifiant-->
                    		<td><?php echo $donnees['Nom'];?></td>
                    		<!-- Afficher les donnees de la colonne nom-->
                    		<td><?php echo $donnees['Expire'];?></td>
                    		<!-- Afficher les donnees de la colonne expire-->
                    		<td><?php echo $donnees['Prix'];?></td>
                    		<!-- Afficher les donnees de la colonne prix-->
                    		<td><?php echo $donnees['Stock'];?></td>
                    		<!-- Afficher les donnees de la colonne stock-->
    					</tr>

				<?php   }?>  
		
			</tbody>
	
		</table>
	
	</div>

	<br><br><hr><br><br><br><br>
	
</body>
</html>